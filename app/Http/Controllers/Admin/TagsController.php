<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
class TagsController extends BaseController
{
    public function index()    
    { 
         $classes = DB::table('classes')
        ->leftJoin('files','files.id','classes.photo_id')
        ->select('classes.*', 'files.id as file_id')
        ->where('classes.school_id', $this->app['school']->id)
        ->whereNull('classes.deleted_at')
        ->orderBy('classes.created_at', 'desc')
        ->get();
        $classes->each(fn($class) => $class->thumbnail_path = getThumbnailUrl($class->file_id));
        $data['classes']=$classes;
        return view('admin.classes.index',$data); 
    }  
    public function show($id)
    {
         $level = DB::table('classes')
        ->where('school_id', $this->app['school']->id)
        ->where('id', $id)
        ->first();
        $data['level']=$level; 
        return view('admin.classes.show',$data);
    }
    public function edit($id){
        $class = DB::table('classes')
        ->leftJoin('files','files.id','classes.photo_id')
        ->select('classes.*', 'files.id as file_id')
        ->where('classes.school_id', $this->app['school']->id)
        ->where('classes.id', $id)
        ->first();
        if ($class) $class->thumbnail_path = getThumbnailUrl($class->file_id);

        $data['class']=$class;

       $programs = DB::table('programs')
        ->leftJoin('files','files.id','programs.photo_id')
        ->select('programs.*', 'files.id as file_id')
        ->where('programs.school_id', $this->app['school']->id)
        ->whereNull('programs.deleted_at')
        ->get();
        $programs->each(fn($program) => $program->thumbnail_path = getThumbnailUrl($program->file_id));
        $data['programs']=$programs;
        $teachers = DB::table('users')
        ->where('school_id', $this->app['school']->id)
        ->get();
        $data['teachers']=$teachers; 
        return view('admin.classes.edit',$data);
    }
    public function update($id,Request $request){
        $validator = Validator::make($request->all(), [
        'name' => 'required|min:5',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }
        DB::table('tags')
        ->where('id', $id)
        ->where('school_id', $this->app['school']->id)
        ->update([
        'name' => $request->get('name'),
        'created_at' => now(),
        'updated_at' => now(),
        ]);


        return redirect()->route('posts.show', $id)
                     ->with('success', 'Post updated!');
    }
    public function create()
    {
         $programs = DB::table('programs')
        ->leftJoin('files','files.id','programs.photo_id')
        ->select('programs.*', 'files.id as file_id')
        ->where('programs.school_id', $this->app['school']->id)
        ->whereNull('programs.deleted_at')
        ->get();
        $programs->each(fn($program) => $program->thumbnail_path = getThumbnailUrl($program->file_id));
        $data['programs']=$programs;


        $teachers = DB::table('users')
        ->where('school_id', $this->app['school']->id)
        ->get();
        $data['teachers']=$teachers;  



        return view('admin.classes.create',$data);
    } 
    public function store(Request $request){
        
         $validator = Validator::make($request->all(), [
        'name' => 'required|min:5',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }

        $post_id=DB::table('tags')->insertGetId([
        'name' => $request->get('name'),
        'school_id' => $this->app['school']->id,
        'created_at' => now(),
        'updated_at' => now(),
    ]);
     return redirect()->route('classes.show', $post_id)
                     ->with('success', 'Post created!');
    }

    public function destroy($id){
        DB::table('tags')
        ->where('id', $id)
        ->where('school_id', $this->app['school']->id)
        ->update(['deleted_at' => now()]);
            return redirect()->route('posts.index')
                            ->with('success', 'Post deleted successfully.');
    }
}


