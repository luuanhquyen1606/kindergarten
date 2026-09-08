<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class PostsController extends BaseController
{
    private const EVENT_META_KEYS = ['price', 'start_at', 'end_at', 'accept_donation', 'location'];
    private const PER_PAGE = 12;

    private function attachEventMeta($post)
    {
        $meta = DB::table('post_meta')
            ->where('post_id', $post->id)
            ->whereIn('meta_key', self::EVENT_META_KEYS)
            ->pluck('meta_value', 'meta_key');

        foreach (self::EVENT_META_KEYS as $key) {
            $post->{$key} = $meta[$key] ?? null;
        }

        return $post;
    }

    private function saveEventMeta($postId, Request $request, $schoolId)
    {
        foreach (self::EVENT_META_KEYS as $key) {
            if ($request->get($key) === null) {
                continue;
            }

            DB::table('post_meta')->updateOrInsert(
                ['post_id' => $postId, 'meta_key' => $key],
                [
                    'school_id' => $schoolId,
                    'meta_value' => $request->get($key),
                    'updated_at' => now(),
                    'created_at' => now(),
                ]
            );
        }
    }

    /**
     * The file-picker UI (media_browser.blade.php) submits a fixed 100+ slot
     * "files[]" array where unused slots are empty strings; the tag checkbox
     * group can behave similarly. Strip those out before validating so the
     * exists() rules below only ever see real ids.
     */
    private function stripEmptySelections(Request $request): void
    {
        $request->merge([
            'files' => array_values(array_filter((array) $request->input('files', []))),
            'tags' => array_values(array_filter((array) $request->input('tags', []))),
        ]);
    }

    private function validationRules(string $type, int $schoolId): array
    {
        $rules = [
            'title' => 'required|string|max:256',
            'content' => 'required',
            'photo_id' => ['required', Rule::exists('files', 'id')->where('school_id', $schoolId)],
            'is_published' => 'nullable|boolean',
            'tags' => 'nullable|array',
            'tags.*' => [Rule::exists('tags', 'id')->where('school_id', $schoolId)->whereNull('deleted_at')],
            'files' => 'nullable|array',
            'files.*' => [Rule::exists('files', 'id')->where('school_id', $schoolId)],
        ];

        if ($type === 'event') {
            $rules += [
                'price' => 'required',
                'accept_donation' => 'required',
                'start_at' => 'required',
                'end_at' => 'required',
                'location' => 'required',
            ];
        } else {
            $rules['category_id'] = ['required', Rule::exists('categories', 'id')->where('school_id', $schoolId)->whereNull('deleted_at')];
        }

        return $rules;
    }

    public function index(Request $request)
    {
        $schoolId = $this->app['school']->id;

        $query = DB::table('posts')
            ->leftJoin('routings', 'routings.id', 'posts.routing_id')
            ->leftJoin('files', 'files.id', 'posts.photo_id')
            ->leftJoin('categories', 'categories.id', 'posts.category_id')
            ->select('posts.*', 'files.id as file_id', 'categories.name as category_name', 'routings.slug as routing_slug')
            ->where('posts.school_id', $schoolId)
            ->whereIn('posts.type', ['news', 'event'])
            ->whereNull('posts.deleted_at');

        if ($request->filled('type')) {
            $query->where('posts.type', $request->get('type'));
        }
        if ($request->filled('category_id')) {
            $query->where('posts.category_id', $request->get('category_id'));
        }
        if ($request->filled('tag_id')) {
            $query->whereIn('posts.id', function ($q) use ($request) {
                $q->select('post_id')->from('posts_tags')->where('tag_id', $request->get('tag_id'));
            });
        }
        if ($request->filled('q')) {
            $query->where('posts.title', 'like', '%'.$request->get('q').'%');
        }

        $posts = $query->orderBy('posts.created_at', 'desc')
            ->paginate(self::PER_PAGE)
            ->withQueryString();

        $postIds = collect($posts->items())->pluck('id');

        $tagsByPost = DB::table('posts_tags')
            ->join('tags', 'tags.id', 'posts_tags.tag_id')
            ->whereIn('posts_tags.post_id', $postIds)
            ->select('posts_tags.post_id', 'tags.id', 'tags.name')
            ->get()
            ->groupBy('post_id');

        $eventIds = collect($posts->items())->where('type', 'event')->pluck('id');
        $metaByPost = DB::table('post_meta')
            ->whereIn('post_id', $eventIds)
            ->whereIn('meta_key', self::EVENT_META_KEYS)
            ->get()
            ->groupBy('post_id');

        foreach ($posts as $post) {
            $post->tags = $tagsByPost->get($post->id, collect());

            if ($post->type === 'event') {
                $meta = $metaByPost->get($post->id, collect())->pluck('meta_value', 'meta_key');
                foreach (self::EVENT_META_KEYS as $key) {
                    $post->{$key} = $meta[$key] ?? null;
                }
            }
        }

        $data['posts'] = $posts;

        $tags = DB::table('tags')
        ->leftJoin('posts_tags', 'posts_tags.tag_id', '=', 'tags.id')
        ->leftJoin('posts', function ($join) {
            $join->on('posts.id', '=', 'posts_tags.post_id')
                ->whereNull('posts.deleted_at');
        })
        ->where('tags.school_id', $schoolId)
        ->whereNull('tags.deleted_at')
        ->select(
            'tags.*',
            DB::raw('COUNT(posts.id) as posts_count')
        )
        ->groupBy('tags.id')
        ->get();
        $data['tags']=$tags;

        $categories = DB::table('categories')
        ->leftJoin('posts', 'posts.category_id', '=', 'categories.id')
        ->where('categories.school_id', $schoolId)
        ->whereNull('categories.deleted_at')
        ->whereNull('posts.deleted_at')
        ->select(
            'categories.*',
            DB::raw('COUNT(posts.id) as posts_count')
        )
        ->groupBy('categories.id')
        ->get();

        $data['categories']=$categories;

        if ($request->ajax()) {
            return view('admin.posts.partials.list', $data);
        }

        return view('admin.posts.index',$data);
    }

    public function show($id,Request $request)
    {
        $schoolId = $this->app['school']->id;

        $post = DB::table('posts')
        ->leftJoin('categories','categories.id','posts.category_id')
        ->leftJoin('routings','routings.id','posts.routing_id')
        ->select('posts.*', 'categories.name as category_name', 'routings.slug as routing_slug')
        ->where('posts.school_id', $schoolId)
        ->where('posts.id', $id)
        ->whereNull('posts.deleted_at')
        ->first();

        abort_if(!$post, 404);

        $post->tags = DB::table('tags')
        ->whereIn('id', function ($query) use ($post) {
                $query->select('tag_id')
                    ->from('posts_tags')->where('post_id',$post->id);
            })->get();

        $post->files = DB::table('files')
        ->join('post_files', 'files.id', '=', 'post_files.file_id')
        ->where('post_files.post_id', $post->id)
        ->select('files.*')
        ->get();

        if ($post->type === 'event') {
            $this->attachEventMeta($post);
        }

        $data['post']=$post;

        if ($request->ajax()) {
        return response()->json([
            'status' => 'ok',
            'data' => $data
        ]);
    }
        return view('admin.posts.show',$data);
    }
    public function edit($id){
        $post = DB::table('posts')
         ->leftJoin('files','files.id','posts.photo_id')
         ->leftJoin('routings','routings.id','posts.routing_id')
         ->select('posts.*', 'files.id as file_id', 'routings.slug as routing_slug')

        ->where('posts.school_id', $this->app['school']->id)
        ->where('posts.id', $id)
        ->orderBy('posts.created_at', 'desc')
        ->first();

        abort_if(!$post, 404);

        $post->tags = DB::table('tags')
                    ->whereIn('id', function ($query) use ($post) {
                            $query->select('tag_id')
                                ->from('posts_tags')->where('post_id',$post->id);
                        })->get();

        if ($post->type === 'event') {
            $this->attachEventMeta($post);
        }

        $files = DB::table('files')
       ->join('post_files', 'files.id', '=', 'post_files.file_id')
        ->where('post_files.post_id', $id)
        ->select('files.*')
        ->get();

        $data['files']=$files;

        $data['post']=$post;

        $tags = DB::table('tags')
        ->where('school_id', $this->app['school']->id)
        ->get();
        $data['tags']=$tags;
         $categories = DB::table('categories')
        ->where('school_id', $this->app['school']->id)
        ->get();
        $data['categories']=$categories;

        return view('admin.posts.edit',$data);
    }
    public function update($id,Request $request){
        $schoolId = $this->app['school']->id;

        $existing = DB::table('posts')
        ->where('id', $id)
        ->where('school_id', $schoolId)
        ->first();

        abort_if(!$existing, 404);

        $type = $existing->type === 'event' ? 'event' : 'news';

        $this->stripEmptySelections($request);

        $validator = Validator::make($request->all(), $this->validationRules($type, $schoolId));

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }


        DB::table('posts')
        ->where('id', $id)
        ->where('school_id', $schoolId)
        ->update([
                'title' => $request->get('title'),
                'content' => $request->get('content'),
                'photo_id' => $request->get('photo_id'),
                'category_id'=> $type === 'news' ? $request->get('category_id') : null,
                'is_published' => $request->boolean('is_published') ? 1 : 0,
                'school_id' => $schoolId,
                'updated_at' => now(),
        ]);

        if ($type === 'event') {
            $this->saveEventMeta($id, $request, $schoolId);
        }

        $fileIds = array_filter($request->get('files', []));

        DB::table('post_files')
            ->where('post_id', $id)
            ->whereNotIn('file_id', $fileIds)
            ->delete();

        foreach ($fileIds as $file) {
            DB::table('post_files')->insertOrIgnore([
                'post_id' => $id,
                'file_id' => $file,
                'school_id'=>$schoolId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        // delete old tags
        DB::table('posts_tags')->where('post_id', $id)->where('school_id', $schoolId)->delete();
        // add new tags
        if($request->get('tags'))
        {
            foreach($request->get('tags') as $tag){
                if($tag)
                {
                    DB::table('posts_tags')->insertOrIgnore([
                        'post_id' => $id,
                        'tag_id' => $tag,
                        'school_id'=>$schoolId,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            };
        }
        if ($type === 'news') {
            $post = DB::table('posts')
            ->where('posts.id', $id)
            ->first();
            if(!$post->routing_id){
                $routing = getSlug($request->get('title'),'posts',$id,$schoolId);
                DB::table('posts')
                ->where('id', $id)
                ->update(['routing_id' => $routing->id]);

                 DB::table('posts')
                ->where('id', $id)
                ->update(['slug' => $routing->slug]);
            }
            updateSlug($post->routing_id,$request->get('title'),$schoolId);
        }

        return redirect()->route('posts.show', $id)
                     ->with('success', 'Post created!');
    }
    public function create(Request $request)
    {
        $tags = DB::table('tags')
        ->where('school_id', $this->app['school']->id)
        ->get();
        $data['tags']=$tags;
        $categories = DB::table('categories')
        ->where('school_id', $this->app['school']->id)
        ->get();
        $data['categories']=$categories;
        $data['type'] = $request->get('type') === 'event' ? 'event' : 'news';

        return view('admin.posts.create',$data);
    }
    public function store(Request $request){
        $schoolId = $this->app['school']->id;

        $type = $request->get('type') === 'event' ? 'event' : 'news';

        $this->stripEmptySelections($request);

        $validator = Validator::make($request->all(), $this->validationRules($type, $schoolId));

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }

        $post_id=DB::table('posts')->insertGetId([
        'title' => $request->get('title'),
        'content' => $request->get('content'),
        'type' => $type,
        'category_id' => $type === 'news' ? $request->get('category_id') : null,
        'school_id' => $schoolId,
        'is_published' => $request->boolean('is_published') ? 1 : 0,
        'created_at' => now(),
        'updated_at' => now(),
         ]);

        if ($type === 'event') {
            $this->saveEventMeta($post_id, $request, $schoolId);
            DB::table('posts')
            ->where('id', $post_id)
            ->update(['slug' => Str::slug($request->get('title'))]);
        } else {
            $routing = getSlug($request->get('title'),'posts',$post_id,$schoolId);
            DB::table('posts')
            ->where('id', $post_id)
            ->update(['routing_id' => $routing->id]);

             DB::table('posts')
            ->where('id', $post_id)
            ->update(['slug' => $routing->slug]);
        }


        if($request->get('photo_id'))
        {
        DB::table('posts')
        ->where('id', $post_id)
        ->update([
                'photo_id' => $request->get('photo_id'),
                'updated_at' => now(),
        ]);
        }

        if($request->get('files'))
        {
            foreach($request->get('files') as $file){
                if($file)
                {
                    DB::table('post_files')->insert([
                        'post_id' => $post_id,
                        'file_id' => $file,
                        'school_id'=>$schoolId,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            };
        }
        if($request->get('tags'))
        {
            foreach($request->get('tags') as $tag){
                if($tag)
                {
                    DB::table('posts_tags')->insertOrIgnore([
                        'post_id' => $post_id,
                        'tag_id' => $tag,
                        'school_id'=>$schoolId,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            };
        }



     return redirect()->route('posts.show', $post_id)
                     ->with('success', 'Post created!');
    }

    public function destroy($id, Request $request){
        DB::table('posts')
        ->where('id', $id)
        ->where('school_id', $this->app['school']->id)
        ->update(['deleted_at' => now()]);

        if ($request->ajax()) {
            return response()->json(['status' => 'ok']);
        }

        return redirect()->route('posts.index')
                        ->with('success', 'Post deleted successfully.');
    }

    public function togglePublish($id, Request $request)
    {
        $post = DB::table('posts')
            ->where('id', $id)
            ->where('school_id', $this->app['school']->id)
            ->whereNull('deleted_at')
            ->first();

        abort_if(!$post, 404);

        $newStatus = $post->is_published ? 0 : 1;

        DB::table('posts')
            ->where('id', $id)
            ->update(['is_published' => $newStatus, 'updated_at' => now()]);

        return response()->json(['status' => 'ok', 'is_published' => $newStatus]);
    }

    public function bulkDestroy(Request $request)
    {
        $ids = collect($request->get('ids', []))->filter()->values();

        DB::table('posts')
            ->where('school_id', $this->app['school']->id)
            ->whereIn('id', $ids)
            ->update(['deleted_at' => now()]);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json(['status' => 'ok', 'count' => $ids->count()]);
        }

        return redirect()->route('posts.index')
            ->with('success', 'Đã xóa các bài viết đã chọn.');
    }
}
