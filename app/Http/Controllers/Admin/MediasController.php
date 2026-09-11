<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Kris\LaravelFormBuilder\FormBuilder;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;
class MediasController extends BaseController
{
    public function index(Request $request)    
    {  

        $per_page=48;
         $posts = DB::table('files')
        ->where('files.school_id', $this->app['school']->id)
        ->whereNull('files.deleted_at')
        ->orderBy('id', 'desc')->paginate($per_page)->through(function ($item) {
            $item->srcset = getImageSet($item->thumbnail);
            $item->thumbnailUrl = getThumbnailUrl($item->id,350);
            return $item; 
        });     
          
        
        if ($request->expectsJson()) {
        return response()->json([
            'files' => $posts
        ]);
        }
        $data['files']=$posts; 
        $data['per_page']=$per_page; 
        return view('admin.medias.index',$data); 
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
         ->select('posts.*')
        ->where('posts.school_id', $this->app['school']->id)
        ->where('posts.id', $id)
        ->orderBy('posts.created_at', 'desc')
        ->first();
        $post->thumbnail_path = getThumbnailUrl($post->photo_id);

        $post->tags = DB::table('tags')
                    ->whereIn('id', function ($query) use ($post) {
                            $query->select('tag_id')
                                ->from('posts_tags')->where('post_id',$post->id);
                        })->get();
       
        $files = DB::table('files')
        ->join('post_files', 'files.id', '=', 'post_files.file_id')
        ->where('post_files.post_id', $id)
        ->select('files.*')
        ->get();
        $files->each(fn($file) => $file->thumbnail_path = getThumbnailUrl($file->id));

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
       $validator = Validator::make($request->all(), [
        'title' => 'required',
        'content' => 'required',
        'category_id' => 'required',
        'photo_id' => 'required', // example
        ]);

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
                'category_id'=> $request->get('category_id'),
                'school_id' => $this->app['school']->id,
                'updated_at' => now(),
        ]);

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
        
        return redirect()->route('posts.show', $id)
                     ->with('success', 'Post created!');
    }
    public function create(FormBuilder $formBuilder)
    {
        $tags = DB::table('tags')
        ->where('school_id', $this->app['school']->id)
        ->get();
        $data['tags']=$tags; 
        $categories = DB::table('categories')
        ->where('school_id', $this->app['school']->id)
        ->get();
        $data['categories']=$categories;   

        $form = $formBuilder->create(\App\Forms\SongForm::class, [
            'method' => 'POST',
            'url' => 'new-song'
        ]);

       $data['form']=$form;   
        return view('admin.posts.create',$data);
    } 
    public function store(Request $request){
      
        $validator = Validator::make($request->all(), [
        'title' => 'required',
        'content' => 'required',
        'category_id' => 'required',
        'photo_id' => 'required', // example
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }



        $post_id=DB::table('posts')->insertGetId([
        'title' => $request->get('title'),
        'content' => $request->get('content'),
        'school_id' => $this->app['school']->id,
        'created_at' => now(),
        'updated_at' => now(),
         ]);

         DB::table('posts')
        ->where('id', $post_id)
        ->update(['slug' => Str::slug($request->get('title'))]);

        
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
        DB::table('files')
        ->where('id', $id)
        ->where('school_id', $this->app['school']->id)
        ->update(['deleted_at' => now()]);

        if ($request->ajax()) {
            return response()->json(['status' => 'ok']);
        }

        return redirect()->route('medias.index')
                        ->with('success', 'File deleted successfully.');
    }
}


