<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class ClassesController extends BaseController
{
    public function index()    
    { 
         $classes = DB::table('classes')
        ->leftJoin('files','files.id','classes.photo_id')
        ->leftJoin('thumbnails','thumbnails.file_id','files.id')
        ->leftJoin('programs','programs.id','classes.program_id')
        ->leftJoin('campuses','campuses.id','classes.campus_id')
        ->select('classes.*', 'files.id as file_id', 'thumbnails.path as thumbnail_path', 'programs.name as program_name', 'campuses.name as campus_name')
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
        ->leftJoin('campuses', 'campuses.id', 'classes.campus_id')
        ->select('classes.*', 'files.id as file_id', 'thumbnails.path as thumbnail_path',
            'programs.name as program_name', 'users.name as teacher_name', 'campuses.name as campus_name')
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

        $posts = DB::table('post_class')
        ->join('posts', 'posts.id', 'post_class.post_id')
        ->leftJoin('users', 'users.id', 'posts.user_id')
        ->select('posts.*', 'users.name as author_name', 'users.photo_id as author_photo_id')
        ->where('post_class.class_id', $class->id)
        ->where('posts.school_id', $school_id)
        ->whereNull('posts.deleted_at')
        ->orderBy('posts.created_at', 'desc')
        ->get();

        $postPhotos = DB::table('post_files')
        ->join('files', 'files.id', 'post_files.file_id')
        ->whereIn('post_files.post_id', $posts->pluck('id'))
        ->select('post_files.post_id', 'files.id', 'files.path')
        ->get()
        ->groupBy('post_id');

        foreach ($posts as $post) {
            $post->photos = $postPhotos->get($post->id, collect());
        }

        $data['class'] = $class;
        $data['students'] = $students;
        $data['posts'] = $posts;
        $data['today'] = $today;
        $data['present_count'] = $students->filter(fn($s) => $s->attendance_status == 'present')->count();
        $data['absent_count'] = $students->filter(fn($s) => $s->attendance_status == 'absent')->count();
        $data['late_count'] = $students->filter(fn($s) => $s->attendance_status == 'late')->count();
        $data['excused_count'] = $students->filter(fn($s) => $s->attendance_status == 'excused')->count();
        $data['unmarked_count'] = $students->filter(fn($s) => in_array($s->attendance_status, ['unmarked', null]))->count();
        $data['unpaid_count'] = $students->filter(fn($s) => $s->has_unpaid_tuition)->count();
        $data['attendance_taken_today'] = $students->isNotEmpty() && $students->every(fn($s) => !is_null($s->attendance_status));

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

        $campuses = DB::table('campuses')
        ->where('school_id', $this->app['school']->id)
        ->whereNull('deleted_at')
        ->orderBy('name')
        ->get();
        $data['campuses']=$campuses;

        return view('admin.classes.edit',$data);
    }
    public function update($id,Request $request){

        DB::table('classes')
        ->where('id', $id)
        ->update([
        'name' => $request->get('name'),
        'program_id' => $request->get('program_id'),
        'campus_id' => $request->get('campus_id') ?: null,
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

        $campuses = DB::table('campuses')
        ->where('school_id', $this->app['school']->id)
        ->whereNull('deleted_at')
        ->orderBy('name')
        ->get();
        $data['campuses']=$campuses;

        return view('admin.classes.create',$data);
    }
    public function store(Request $request){

         $validator = Validator::make($request->all(), [
        'name' => 'required|min:5',
        'photo_id' => 'required', // example
        'program_id' => 'required',
        'campus_id' => 'nullable|exists:campuses,id',
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
        'campus_id' => $request->get('campus_id') ?: null,
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

    public function storePost(Request $request, $id)
    {
        $school_id = $this->app['school']->id;

        $class = DB::table('classes')
        ->where('id', $id)
        ->where('school_id', $school_id)
        ->whereNull('deleted_at')
        ->first();

        if (!$class) {
            abort(404);
        }

        $validator = Validator::make($request->all(), [
            'content' => 'required|string',
            'files' => 'nullable|array',
            'files.*' => 'nullable|exists:files,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }

        $title = Str::limit(trim(strip_tags($request->get('content'))), 60, '');

        $post_id = DB::table('posts')->insertGetId([
            'type' => 'class_update',
            'title' => $title !== '' ? $title : 'Cập nhật lớp học',
            'content' => $request->get('content'),
            'school_id' => $school_id,
            'user_id' => Auth::id(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('post_class')->insert([
            'class_id' => $class->id,
            'post_id' => $post_id,
        ]);

        if ($request->get('files')) {
            foreach ($request->get('files') as $fileId) {
                if ($fileId) {
                    DB::table('post_files')->insertOrIgnore([
                        'post_id' => $post_id,
                        'file_id' => $fileId,
                        'school_id' => $school_id,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }

        if ($request->ajax()) {
            return response()->json(['status' => 'ok']);
        }

        return redirect()->route('classes.show', $class->id)
                     ->with('success', 'Đã đăng bài viết!');
    }

    public function destroyPost(Request $request, $id, $postId)
    {
        $school_id = $this->app['school']->id;

        $belongsToClass = DB::table('post_class')
        ->where('class_id', $id)
        ->where('post_id', $postId)
        ->exists();

        if ($belongsToClass) {
            DB::table('posts')
            ->where('id', $postId)
            ->where('school_id', $school_id)
            ->update(['deleted_at' => now()]);
        }

        if ($request->ajax()) {
            return response()->json(['status' => 'ok']);
        }

        return redirect()->route('classes.show', $id)
                     ->with('success', 'Đã xóa bài viết.');
    }

    public function destroy($id){
        DB::table('classes')->where('id', $id)->delete();

            return redirect()->route('classes.index')
                            ->with('success', 'Level deleted successfully.');
    }
}


