<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PageBlocksController extends BaseController
{
    public function index()    
    {  
        $pages = DB::table('pages')
        ->where('school_id', $this->app['school']->id)
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
        ->where('school_id', $this->app['school']->id)
        ->where('id', $id) 
        ->first();

        
        
        
        
        $blocks = DB::table('page_blocks') 
        ->join('blocks','blocks.id','page_blocks.block_id')
        ->select('page_blocks.*', 'blocks.code as root_block_code')
        ->where('page_blocks.school_id', $this->app['school']->id)
        ->where('page_blocks.page_id', $id) 
        //->where('page_blocks.id', 11) 
        ->get(); 

        $data['page_blocks']=[];
        foreach ($blocks as $block)
        {
            $data['page_blocks'][]=$this->block_render($block->id);
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
                'b.id as block_id', 'b.name as block_name'
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
        ->select('page_blocks.*', 'blocks.code as root_block_code')
        ->where('page_blocks.school_id', $this->app['school']->id)
        ->where('page_blocks.id', $id) 
        ->first(); 
        $data['block']=$block;


        $programs = DB::table('programs')
        ->leftJoin('files','files.id','programs.photo_id')
        ->leftJoin('thumbnails','thumbnails.file_id','files.id')
        ->select('programs.*', 'files.id as file_id', 'thumbnails.path as thumbnail_path')
        ->where('programs.school_id', $this->app['school']->id)
        ->whereNull('programs.deleted_at')
        ->orderBy('programs.created_at', 'desc')
        ->get(); 
        $data['programs']=$programs;
        
        $testimonials = DB::table('testimonials')
          ->where('testimonials.school_id', $this->app['school']->id)
        ->orderBy('testimonials.created_at', 'desc')
        ->get(); 
        $data['testimonials']=$testimonials;

        $teachers = DB::table('users')
        ->leftJoin('files','files.id','users.photo_id')
        ->leftJoin('thumbnails','thumbnails.file_id','files.id')
        ->select('users.*', 'files.id as file_id', 'thumbnails.path as thumbnail_path')
        ->where('users.school_id', $this->app['school']->id)
        ->whereNull('users.deleted_at')
        ->orderBy('users.created_at', 'desc')
        ->get(); 
        $data['teachers']=$teachers; 
        $posts = DB::table('posts')
         ->leftJoin('files','files.id','posts.photo_id')
         ->leftJoin('thumbnails','thumbnails.file_id','files.id')
         ->select('posts.*', 'files.id as file_id', 'thumbnails.path as thumbnail_path')
        ->where('posts.school_id', $this->app['school']->id)
        ->whereNull('posts.deleted_at')
        ->orderBy('posts.created_at', 'desc')
        ->get();
     
        $data['posts']=$posts;
        return view('admin.pages.block_render',$data);
    }
    public function update($id,Request $request){
        $page_block = DB::table('page_blocks')
        ->join('blocks','blocks.id','page_blocks.block_id')
        ->select('page_blocks.*','blocks.code as block_code')
        ->where('page_blocks.id', $id)->first();
        $inputs=$request->get('data');
       
        // validation section
       if($page_block->block_code=='article_teaser')
       {
        $validator = Validator::make($request->all(), [
        'data.title' => 'required|min:10',
        'data.sub_title' => [
        'required',
        function ($attr, $value, $fail) {
            if (Str::wordCount(strip_tags($value)) > 256) {
                $fail("$attr tối đa 256 từ.");
            }
        },
    ],
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }
       }

        
 



       if($page_block->block_code=='hero_banner')
       {
      
            $rules = []; 
           


            $validator = Validator::make($request->all(), $rules);
            
            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'errors' => $validator->errors()
                ], 422);
            }
 

      
        
       }
       if($page_block->block_code=='features')
       {
        for($i=0;$i<=10;$i++)
        {
            if($inputs['features'][$i]['title']=='')
            {
                unset($inputs['features'][$i]);
            }
        }
        $inputs['features']=array_values($inputs['features']);
       }




       if($page_block->block_code=='gallery')
       {
            for($i=0;$i<=100;$i++)
            {
                if(in_array($inputs['files'][$i], $inputs['deleted_files']))
                {
                    unset($inputs['files'][$i]);
                }
                if(isset($inputs['files'][$i]))
                {
                    if($inputs['files'][$i]=='')
                    {
                        unset($inputs['files'][$i]);
                    }
                }
                
            }
            
            $inputs['files']=array_values($inputs['files']);
       }    
         
       

        DB::table('page_blocks')
        ->where('id', $id)
        ->update([
                'data_preview' => json_encode($inputs),
                'updated_at' => now(),
        ]);

         DB::table('page_blocks')
        ->where('id', $id)
        ->update([
                'data' => json_encode($inputs),
                'updated_at' => now(),
        ]);

        $page_block = DB::table('page_blocks')->where('id', $id)->first();
        
       
        // update hero_banner page_block_files
        if($page_block->block_id==1){

            for($i=0;$i<3;$i++)
            {
                if(isset($inputs['banners'][$i]['photo_id']))
                {
                    DB::table('page_block_files')->updateOrInsert(
                        [
                            'page_block_id' => $id,
                            'name'          => "data[banners][".$i."][photo_id]",
                        ],
                        [
                            'file_id'    => $inputs['banners'][$i]['photo_id'],
                            'updated_at' => now(),
                        ]
                    );

                }
            }

        }


        if ($request->ajax()) {
        // It's an AJAX request
        return response()->json(['message' => 'success']);
        } else {
            // Normal form submission
            return redirect()->route('pages.show', $id)
                     ->with('success', 'Post created!');
        }
    }
    public function create()
    {
    
        return view('admin.pages.create');
    } 
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
      //  'name' => 'required',
        'block_id' => 'required'
        ]);
       

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error', 
                'errors' => $validator->errors()
            ], 422);
        }

      
        $post_id=DB::table('page_blocks')->insertGetId([
        'name' => $request->get('name'),
        'block_id' => $request->get('block_id'),
        'page_id' => $request->get('page_id'), 
        'sort'=>$request->get('sort'),
        'show'=>1,
        'school_id' => $this->app['school']->id,
        'created_at' => now(),
        'updated_at' => now(),
        
    ]);
     $this->resort_page_block($request->get('page_id')); 
     return redirect()->route('pages.show', $request->get('page_id'))
                     ->with('success', 'Post created!');
    }
    public function resort_page_block($page_id){
        $blocks = DB::table('page_blocks')
        ->where('page_id', $page_id)
        ->orderBy('sort','asc')
        ->orderBy('created_at','desc')
        ->get();
        $sort=0;
        foreach ($blocks as $block)
            {
               $sort++;
                 DB::table('page_blocks')
            ->where('id', $block->id)
            ->where('school_id', $this->app['school']->id)
            ->update(['sort' =>$sort]);
             
            }
    }

    public function destroy($id,Request $request){
        DB::table('page_blocks')->where('id', $id)->update(['deleted_at' => now()]);
        
         if($request->input('redirect_url')){
            return redirect($request->input('redirect_url')); 
        }
        return redirect()->route('pages.index')->with('success', 'block deleted successfully.');
    }
    public function sort(Request $request){

       foreach ($request->get('sort') as $sort){
            DB::table('page_blocks')
            ->where('id', $sort['id'])
            ->where('school_id', $this->app['school']->id)
            ->update(['sort' => $sort['sort']]);
       }
      
    }
    public function toggle_show(Request $request){
        $block = DB::table('page_blocks')
        ->where('id', $request->get('id'))
        ->where('school_id', $this->app['school']->id)
        ->first();
        if ($block){
            DB::table('page_blocks')
            ->where('id', $request->get('id'))
            ->where('school_id', $this->app['school']->id)
            ->update(['show' => $request->get('show')]);
            return response()->json([
                'status' => 'success',
                'show' => $request->get('show')
            ]);
        }else{
            return response()->json([
                'status' => 'error',
                'message' => 'Block not found'
            ], 404);
        }
    }
}


