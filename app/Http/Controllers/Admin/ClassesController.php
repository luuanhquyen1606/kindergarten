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
        $school_id = $this->app['school']->id;

        $class = DB::table('classes')
        ->leftJoin('files', 'files.id', 'classes.photo_id')
        ->leftJoin('thumbnails', 'thumbnails.file_id', 'files.id')
        ->leftJoin('programs', 'programs.id', 'classes.program_id')
        ->leftJoin('users', 'users.id', 'classes.teacher_id')
        ->select('classes.*', 'files.id as file_id', 'thumbnails.path as thumbnail_path',
            'programs.name as program_name', 'users.name as teacher_name')
        ->where('classes.school_id', $school_id)
        ->where('classes.id', $id)
        ->whereNull('classes.deleted_at')
        ->first();

        if (!$class) {
            abort(404);
        }

        $today = now()->format('Y-m-d');

        $students = DB::table('class_student')
        ->join('students', 'students.id', 'class_student.student_id')
        ->leftJoin('files', 'files.id', 'students.photo_id')
        ->leftJoin('thumbnails', 'thumbnails.file_id', 'files.id')
        ->leftJoin('parents as father', 'father.id', 'students.father_id')
        ->leftJoin('parents as mother', 'mother.id', 'students.mother_id')
        ->leftJoin('student_attendances', function ($join) use ($class, $today) {
            $join->on('student_attendances.student_id', 'students.id')
                ->where('student_attendances.class_id', $class->id)
                ->where('student_attendances.date', $today);
        })
        ->select('students.id', 'students.name', 'students.gender', 'students.birthdate',
            'files.id as file_id', 'thumbnails.path as thumbnail_path',
            'father.name as father_name', 'father.phone as father_phone',
            'mother.name as mother_name', 'mother.phone as mother_phone',
            'student_attendances.status as attendance_status',
            DB::raw('EXISTS(SELECT 1 FROM student_tuitions
                        WHERE student_tuitions.student_id = students.id
                        AND student_tuitions.status = \'unpaid\') as has_unpaid_tuition'))
        ->where('class_student.class_id', $class->id)
        ->whereNull('students.deleted_at')
        ->orderBy('students.name')
        ->get();

        $data['class'] = $class;
        $data['students'] = $students;
        $data['today'] = $today;
        $data['present_count'] = $students->filter(fn($s) => $s->attendance_status == 'present')->count();
        $data['unpaid_count'] = $students->filter(fn($s) => $s->has_unpaid_tuition)->count();

        return view('admin.classes.show', $data);
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


