<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PagesController extends BaseController
{
    public function index()    
    {  
        $pages = DB::table('pages')
        ->where('pages.school_id', $this->app['school']->id)
        ->join('routings','routings.id','pages.routing_id')
        ->select('pages.*', 'routings.slug as routing_slug')
        ->get();  
        $data['pages']=$pages; 
        return view('admin.pages.index',$data); 
    }  
    public function show($id)
    {
        $page = DB::table('pages') 
        ->where('school_id', $this->app['school']->id)
        ->where('id', $id) 
        ->first();
        $blocks = DB::table('page_blocks') 
        ->where('school_id', $this->app['school']->id)
        ->where('page_id', $id) 
        ->get(); 
        $data['page']=$page;  
        $data['page_blocks']=$blocks;  
  
        return view('admin.pages.show',$data);
    }
    public function edit($id){
        $page = DB::table('pages') 
        ->join('routings','routings.id','pages.routing_id')
        ->where('pages.school_id', $this->app['school']->id)
        ->where('pages.id', $id) 
        ->select('pages.*','routings.slug as routing_slug')
        ->first();

        
        
        
        
        $blocks = DB::table('page_blocks') 
        ->join('blocks','blocks.id','page_blocks.block_id')
        ->select('page_blocks.*', 'blocks.code as root_block_code')
        ->where('page_blocks.school_id', $this->app['school']->id)
        ->where('page_blocks.page_id', $id) 
        ->whereNull('page_blocks.deleted_at')
        ->orderBy('page_blocks.sort','asc')
       // ->where('page_blocks.id', 2)              
        ->get();    

        $data['page_blocks']=[];
        foreach ($blocks as $block)
        {
            $data['page_blocks'][$block->id]=$this->block_render($block->id);
            $data['page_blocks'][$block->id]['sort']=$block->sort;
        }


        $blocks = DB::table('blocks') 
        ->get(); 
        $data['blocks'] = $blocks;  

        $rows = DB::table('block_groups as g')
            ->leftJoin('blocks as b', function ($join) {
                $join->on('b.block_group_id', '=', 'g.id');
                 //   ->where('b.show', 1);
            })
            ->select(
                'g.id', 'g.name', 'g.description',
                'b.id as block_id', 'b.name as block_name','b.code as block_code','b.description as block_description'
            )
            ->orderBy('g.name')
            ->get();

        $block_groups = $rows->groupBy('id')->map(function ($items) {
            $group = $items->first();

            return [
                'id' => $group->id,
                'name' => $group->name,
                'description' => $group->description,
                'blocks' => $items->filter(fn($i) => $i->block_id)->values(),
            ];
        });

        $data['block_groups']=$block_groups;
        $data['page']=$page;
    


        
        return view('admin.pages.edit',$data);
    }
    public function block_render($id){
         $block = DB::table('page_blocks') 
        ->join('blocks','blocks.id','page_blocks.block_id')
        ->select('page_blocks.*', 'blocks.code as block_code', 'blocks.name as block_name') 
        ->where('page_blocks.school_id', $this->app['school']->id)
        ->where('page_blocks.id', $id) 
        ->first(); 
        $data['block']=$block;


        $programs = DB::table('programs')
        ->select('programs.*')
        ->where('programs.school_id', $this->app['school']->id)
        ->whereNull('programs.deleted_at')
        ->orderBy('programs.created_at', 'desc')
        ->get();
        $programs->each(fn($program) => $program->thumbnail_path = getThumbnailUrl($program->photo_id));
        $data['programs']=$programs;

        $testimonials = DB::table('testimonials')
          ->where('testimonials.school_id', $this->app['school']->id)
        ->orderBy('testimonials.created_at', 'desc')
        ->get();
        $data['testimonials']=$testimonials;

        $teachers = DB::table('users')
        ->select('users.*')
        ->where('users.school_id', $this->app['school']->id)
        ->whereNull('users.deleted_at')
        ->orderBy('users.created_at', 'desc')
        ->get();
        $teachers->each(fn($teacher) => $teacher->thumbnail_path = getThumbnailUrl($teacher->photo_id));
        $data['teachers']=$teachers;
        $posts = DB::table('posts')
        ->select('posts.*')
        ->where('posts.school_id', $this->app['school']->id)
        ->whereNull('posts.deleted_at')
        ->orderBy('posts.created_at', 'desc')
        ->get();
        $posts->each(fn($post) => $post->thumbnail_path = getThumbnailUrl($post->photo_id));
        $data['posts']=$posts;
        $parents = DB::table('navigations')
        ->whereNull('parent_id')
        ->whereNull('deleted_at')
        ->where('school_id', $this->app['school']->id)
        ->orderBy('sort')
        ->get();

        $data['parents']=$parents;

        $posts = DB::table('posts')
        ->whereNull('deleted_at')
        ->where('school_id', $this->app['school']->id)
        ->orderBy('created_at','desc')
        ->get();

        $data['posts']=$posts;

        $tags = DB::table('tags')
        ->whereNull('deleted_at')
        ->where('school_id', $this->app['school']->id)
        ->orderBy('created_at','desc')
        ->get();

        $data['tags']=$tags;
        $categories = DB::table('categories')
        ->whereNull('deleted_at')
        ->where('school_id', $this->app['school']->id)
        ->orderBy('created_at','desc')
        ->get();

        $data['categories']=$categories; 

        $events = DB::table('posts')
        ->whereNull('deleted_at')
        ->where('type', 'event')
        ->where('school_id', $this->app['school']->id)
        ->orderBy('created_at','desc')
        ->get();   

        $data['events']=$events;

        $pages = DB::table('pages')
        ->whereNull('deleted_at')
        ->where('school_id', $this->app['school']->id)
        ->orderBy('created_at','desc')
        ->get();

        $data['pages']=$pages;


        $routings = DB::table('routings')
        ->where('school_id', $this->app['school']->id)
        ->orderBy('created_at','desc')
        ->get();

        $data['routings']=$routings;


        $data['data']=json_decode($block->data_preview,true);       
        if($block->block_code=='gallery'){
            if(isset($data['data']['files']) && is_array($data['data']['files']) && count($data['data']['files'])>0){
             $files=$posts = DB::table('files')
            ->whereIn('id', $data['data']['files'])
            ->get();
            }else{ 
                $files=[];   
            }
            $data['files']=$files;
        }
        return view('admin.pages.block_render',$data); 
    }
    public function update($id,Request $request){
       
        DB::table('pages')
        ->where('id', $id)
        ->update([
                'name' => $request->get('name'),
                'updated_at' => now(),
        ]);

        $page = DB::table('pages')
        ->where('pages.id', $id)
        ->first();
        if(!$page->routing_id){
            $routing = getSlug($request->get('name'),'pages',$id,$this->app['school']->id);  
            DB::table('pages')
            ->where('id', $id)
            ->update(['routing_id' => $routing->id]);
            
             DB::table('pages')
            ->where('id', $id)
            ->update(['slug' => $routing->slug]);
        }
        updateSlug($page->routing_id,$request->get('name'),$this->app['school']->id);


        return redirect()->route('pages.show', $id)
                     ->with('success', 'Page updated successfully!');
    }
    public function create()
    {
        return view('admin.pages.create');
    } 
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
        'name' => 'required|min:5'
        ]);

       

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }

        $page_id=DB::table('pages')->insertGetId([
        'name' => $request->get('name'),
        'school_id' => $this->app['school']->id,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

       $routing = getSlug($request->get('name'),'pages',$page_id,$this->app['school']->id);  
        DB::table('pages')
        ->where('id', $page_id)
        ->update(['routing_id' => $routing->id]); 


        

     return redirect()->route('pages.show', $page_id)
                     ->with('success', 'Post created!');
    }

    public function destroy($id){
        DB::table('pages')->where('id', $id)->delete();

            return redirect()->route('pages.index')
                            ->with('success', 'Page deleted successfully.');
    }
}


