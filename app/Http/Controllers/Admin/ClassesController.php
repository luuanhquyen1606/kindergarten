<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
class ClassesController extends BaseController
{
    public function index()    
    { 
         $classes = DB::table('classes')
        ->leftJoin('files','files.id','classes.photo_id')
        ->leftJoin('thumbnails','thumbnails.file_id','files.id')
        ->leftJoin('programs','programs.id','classes.program_id')
        ->select('classes.*', 'files.id as file_id', 'thumbnails.path as thumbnail_path', 'programs.name as program_name')
        ->where('classes.school_id', $this->app['school']->id)
        ->whereNull('classes.deleted_at')
        ->orderBy('classes.created_at', 'desc')
        ->get(); 
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
        ->leftJoin('thumbnails','thumbnails.file_id','files.id')
        ->select('classes.*', 'files.id as file_id', 'thumbnails.path as thumbnail_path')
        ->where('classes.school_id', $this->app['school']->id)
        ->where('classes.id', $id)
        ->first(); 
       
        $data['class']=$class; 

       $programs = DB::table('programs')
        ->leftJoin('files','files.id','programs.photo_id')
        ->leftJoin('thumbnails','thumbnails.file_id','files.id')
        ->select('programs.*', 'files.id as file_id', 'thumbnails.path as thumbnail_path')
        ->where('programs.school_id', $this->app['school']->id)
        ->whereNull('programs.deleted_at')
        ->get();
        $data['programs']=$programs; 
        $teachers = DB::table('users')
        ->where('school_id', $this->app['school']->id)
        ->get();
        $data['teachers']=$teachers; 
        return view('admin.classes.edit',$data);
    }
    public function update($id,Request $request){
        
        DB::table('classes')
        ->where('id', $id)
        ->update([
        'name' => $request->get('name'),
        'program_id' => $request->get('program_id'),
        'photo_id' => $request->get('photo_id'),
        'teacher_id' => $request->get('teacher_id'),
        'year' => $request->get('year'),
        'tuition' => $request->get('tuition'),
        'created_at' => now(),
        'updated_at' => now(),
        ]);


        return redirect()->route('classes.show', $id)
                     ->with('success', 'Post updated!');
    }
    public function create()
    {
         $programs = DB::table('programs')
        ->leftJoin('files','files.id','programs.photo_id')
        ->leftJoin('thumbnails','thumbnails.file_id','files.id')
        ->select('programs.*', 'files.id as file_id', 'thumbnails.path as thumbnail_path')
        ->where('programs.school_id', $this->app['school']->id)
        ->whereNull('programs.deleted_at')
        ->get();
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
        'photo_id' => 'required', // example
        'program_id' => 'required',
        'year' => 'required','integer','min:' . (now()->year - 5),'max:' . (now()->year + 5),
        'tuition' => 'required|numeric|min:0',
        'teacher_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }

        $post_id=DB::table('classes')->insertGetId([
        'name' => $request->get('name'),
        'program_id' => $request->get('program_id'),
        'school_id' => $this->app['school']->id,
        'teacher_id' => $request->get('teacher_id'),
        'photo_id' => $request->get('photo_id'),
        'year' => $request->get('year'),
        'tuition' => $request->get('tuition'),
        'created_at' => now(),
        'updated_at' => now(),
    ]);
    
     return redirect()->route('classes.show', $post_id)
                     ->with('success', 'Post created!');
    }

    public function destroy($id){
        DB::table('classes')->where('id', $id)->delete();

            return redirect()->route('classes.index')
                            ->with('success', 'Level deleted successfully.');
    }
}


