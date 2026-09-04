<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PostsController extends BaseController
{
    private const EVENT_META_KEYS = ['price', 'start_at', 'end_at', 'accept_donation', 'location'];

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

    public function index(Request $request)
    {
         $posts = DB::table('posts')
         ->leftJoin('routings','routings.id','posts.routing_id')
         ->leftJoin('files','files.id','posts.photo_id')
         ->leftJoin('categories','categories.id','posts.category_id')
         ->select('posts.*', 'files.id as file_id', 'categories.name as category_name','routings.slug as routing_slug')
        ->where('posts.school_id', $this->app['school']->id)
        ->whereIn('posts.type', ['news', 'event']);
        if($request->get('type'))
        {
            $posts->where('posts.type', $request->get('type'));
        }
        if($request->get('category_id'))
        {
            $posts->where('posts.category_id', $request->get('category_id'));
        }
        if($request->get('tag_id'))
        {
            $posts->whereIn('posts.id', function ($query) use ($request) {
                            $query->select('post_id')
                                ->from('posts_tags')->where('tag_id',$request->get('tag_id'));
                        });
        }

        $posts=$posts->whereNull('posts.deleted_at')
        ->orderBy('posts.created_at', 'desc')
        ->get();

        foreach ($posts as $index=>$post)
        {
            $posts[$index]->tags = DB::table('tags')
                    ->whereIn('id', function ($query) use ($post) {
                            $query->select('tag_id')
                                ->from('posts_tags')->where('post_id',$post->id);
                        })->get();

            if ($post->type === 'event') {
                $this->attachEventMeta($posts[$index]);
            }
        }

        $data['posts']=$posts;


        $tags = DB::table('tags')
        ->leftJoin('posts_tags', 'posts_tags.tag_id', '=', 'tags.id')
        ->leftJoin('posts', function ($join) {
            $join->on('posts.id', '=', 'posts_tags.post_id')
                ->whereNull('posts.deleted_at');
        })
        ->where('tags.school_id', $this->app['school']->id)
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
        ->where('categories.school_id', $this->app['school']->id)
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
         $post = DB::table('posts')
        ->where('school_id', $this->app['school']->id)
        ->where('id', $id) 
        ->first();
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
         ->select('posts.*', 'files.id as file_id')

        ->where('posts.school_id', $this->app['school']->id)
        ->where('posts.id', $id)
        ->orderBy('posts.created_at', 'desc')
        ->first();

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
        $existing = DB::table('posts')
        ->where('id', $id)
        ->where('school_id', $this->app['school']->id)
        ->first();
        $type = $existing->type === 'event' ? 'event' : 'news';

        $rules = [
        'title' => 'required',
        'content' => 'required',
        'photo_id' => 'required', // example
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
            $rules['category_id'] = 'required';
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }


        DB::table('posts')
        ->where('id', $id)
        ->where('school_id', $this->app['school']->id)
        ->update([
                'title' => $request->get('title'),
                'content' => $request->get('content'),
                'photo_id' => $request->get('photo_id'),
                'category_id'=> $type === 'news' ? $request->get('category_id') : null,
                'school_id' => $this->app['school']->id,
                'updated_at' => now(),
        ]);

        if ($type === 'event') {
            $this->saveEventMeta($id, $request, $this->app['school']->id);
        }

        if($request->get('files'))
        {
            foreach($request->get('files') as $file){
                if($file)
                {
                    DB::table('post_files')->insertOrIgnore([
                        'post_id' => $id,
                        'file_id' => $file,
                        'school_id'=>$this->app['school']->id,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            };
        }
        // delete old tags
        DB::table('posts_tags')->where('post_id', $id)->where('school_id', $this->app['school']->id)->delete();
        // add new tags
        if($request->get('tags'))
        {
            foreach($request->get('tags') as $tag){
                if($tag)
                {
                    DB::table('posts_tags')->insertOrIgnore([
                        'post_id' => $id,
                        'tag_id' => $tag,
                        'school_id'=>$this->app['school']->id,
                        'created_at' => now(), 
                        'updated_at' => now(),
                    ]);
                }
            };
        }
        if($request->get('deleted_files'))
        {
            foreach($request->get('deleted_files') as $file){
                if($file)
                {
                    DB::table('post_files')
                    ->where('file_id', $file)
                    ->where('post_id', $id)
                    ->delete();
                }
            };
        } 

        if ($type === 'news') {
            $post = DB::table('posts')
            ->where('posts.id', $id)
            ->first();
            if(!$post->routing_id){
                $routing = getSlug($request->get('title'),'posts',$id,$this->app['school']->id);
                DB::table('posts')
                ->where('id', $id)
                ->update(['routing_id' => $routing->id]);

                 DB::table('posts')
                ->where('id', $id)
                ->update(['slug' => $routing->slug]);
            }
            updateSlug($post->routing_id,$request->get('title'),$this->app['school']->id);
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

        $type = $request->get('type') === 'event' ? 'event' : 'news';

        $rules = [
        'title' => 'required',
        'content' => 'required',
        'photo_id' => 'required', // example
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
            $rules['category_id'] = 'required';
        }

        $validator = Validator::make($request->all(), $rules);

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
        'school_id' => $this->app['school']->id,
        'is_published' => $type === 'event' ? 1 : null,
        'created_at' => now(),
        'updated_at' => now(),
         ]);

        if ($type === 'event') {
            $this->saveEventMeta($post_id, $request, $this->app['school']->id);
            DB::table('posts')
            ->where('id', $post_id)
            ->update(['slug' => Str::slug($request->get('title'))]);
        } else {
            $routing = getSlug($request->get('title'),'posts',$post_id,$this->app['school']->id);
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
                        'school_id'=>$this->app['school']->id,
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
                        'school_id'=>$this->app['school']->id,
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
}


