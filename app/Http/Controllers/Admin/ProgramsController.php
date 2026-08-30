<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class programsController extends BaseController
{
    public function index()    
    { 
        $programs = DB::table('programs')
        ->select('*')
        ->where('programs.school_id', $this->app['school']->id)
        ->whereNull('programs.deleted_at')
        ->orderBy('programs.created_at', 'desc')
        ->get(); 
        foreach ($programs as $index=>$program)
            {
                 $files = DB::table('files')
                ->leftJoin('program_files','files.id','program_files.file_id')
                ->where('program_files.program_id',$program->id)
                ->select('*')
                ->get();
                $programs[$index]->files = $files; 
            }

       
        $data['programs']=$programs; 
        return view('admin.programs.index',$data); 
    }  
    public function show($id)
    {
         $level = DB::table('programs')
        ->where('school_id', $this->app['school']->id)
        ->where('id', $id)
        ->first();

         $files = DB::table('files')
                ->leftJoin('program_files','files.id','program_files.file_id')
                ->where('program_files.program_id',$level->id)
                ->select('*')
                ->get();
        $level->files = $files; 

        $data['level']=$level; 
   
        return view('admin.programs.show',$data);
    }
    public function edit($id){
        $level = DB::table('programs')
        ->where('programs.school_id', $this->app['school']->id)
        ->whereNull('programs.deleted_at')
        ->where('programs.id', $id)
        ->orderBy('programs.created_at', 'desc')
        ->first(); 

         $files = DB::table('files')
                ->leftJoin('program_files','files.id','program_files.file_id')
                ->where('program_files.program_id',$level->id)
                ->select('files.*')
                ->get();
        $level->files = $files; 
       
        $data['level']=$level; 

        $teachers = DB::table('users')
        ->where('school_id', $this->app['school']->id)
        ->get();
        $data['teachers']=$teachers; 
        
        return view('admin.programs.edit',$data);
    }
    public function update($id,Request $request){

         $validator = Validator::make($request->all(), [
        'name' => 'required|min:5',
        'tuition' => 'required',
        'photo_id' => 'required', // example
        'age_from' => 'required',
        'age_to' => 'required',
        'class_count' => ['required','integer'],
        'introduction' => 'required',
        'manager_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }

        DB::table('programs')
        ->where('id', $id)
        ->update([
            'name' => $request->get('name'),
            'age_from' => $request->get('age_from'),
            'age_to' => $request->get('age_to'),
            'class_count' => $request->get('class_count'),
            'tuition' => $request->get('tuition'),
            'photo_id' => $request->get('photo_id'),
            'introduction' => $request->get('introduction'),
            'manager_id' => $request->get('manager_id'),
            'updated_at' => now(),
        ]);
        if($request->get('files'))
        {
            foreach($request->get('files') as $file){
                if($file)
                {
                    DB::table('program_files')->insertOrIgnore([
                        'program_id' => $id,
                        'file_id' => $file,
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
                    DB::table('program_files')
                    ->where('file_id', $file)
                    ->where('program_id', $id)
                    ->delete();
                }
            };
        } 
        DB::table('programs')
        ->where('id', $id)
        ->update(['slug' => Str::slug($request->get('name'))]);


        return redirect()->route('programs.show', $id)
                     ->with('success', 'Post created!');
    }
    public function create()
    {
        $teachers = DB::table('users')
        ->where('school_id', $this->app['school']->id)
        ->get();
        $data['teachers']=$teachers; 
        return view('admin.programs.create', $data);
    } 
    public function store(Request $request){

       
        $validator = Validator::make($request->all(), [
        'name' => 'required|min:5',
        'tuition' => 'required',
        'photo_id' => 'required', // example
        'age_from' => 'required',
        'age_to' => 'required',
        'introduction'=>'required',
        'manager_id'=>'required',
        'class_count'=>['required','integer']
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }


        $level_id=DB::table('programs')->insertGetId([
        'name' => $request->get('name'),
        'age_from' =>$request->get('age_from'),
        'age_to' => $request->get('age_to'),
        'class_count' => $request->get('class_count'),
        'tuition' => $request->get('tuition'),
        'school_id' => $this->app['school']->id,
        'photo_id' => $request->get('photo_id'),
        'introduction' => $request->get('introduction'),
        'manager_id' => $request->get('manager_id'),
        'created_at' => now(),
        'updated_at' => now(),
    ]);
    if($request->get('files'))
        {
            foreach($request->get('files') as $file){
                if($file)
                {
                    DB::table('program_files')->insert([
                        'program_id' => $level_id,
                        'file_id' => $file,
                        'school_id'=>$this->app['school']->id,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                } 
            };
        }
    DB::table('programs')
        ->where('id', $level_id)
        ->update(['slug' => Str::slug($request->get('name'))]);

     return redirect()->route('programs.show', $level_id)
                     ->with('success', 'Post created!');
    }

    public function destroy($id){
        DB::table('programs')
        ->where('id', $id)
        ->where('school_id', $this->app['school']->id)
        ->update(['deleted_at' => now()]);
            return redirect()->route('programs.index')
                            ->with('success', 'Post deleted successfully.');
    }
}


