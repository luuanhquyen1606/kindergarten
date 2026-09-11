<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
class ClassesController extends BaseController
{
    public function index()    
    { 
         $classes = DB::table('classes')
        ->leftJoin('programs','programs.id','classes.program_id')
        ->leftJoin('campuses','campuses.id','classes.campus_id')
        ->select('classes.*', 'programs.name as program_name', 'campuses.name as campus_name')
        ->where('classes.school_id', $this->app['school']->id)
        ->whereNull('classes.deleted_at')
        ->orderBy('classes.created_at', 'desc')
        ->get();
        $classes->each(fn($class) => $class->thumbnail_path = getThumbnailUrl($class->photo_id));
        $data['classes']=$classes;
        return view('admin.classes.index',$data);
    }
    public function albums($id)
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

        $albums = DB::table('post_class')
        ->join('posts', 'posts.id', 'post_class.post_id')
        ->leftJoin('users', 'users.id', 'posts.user_id')
        ->select('posts.*', 'users.name as author_name', 'users.photo_id as author_photo_id')
        ->where('post_class.class_id', $class->id)
        ->where('posts.school_id', $school_id)
        ->whereNull('posts.deleted_at')
        ->whereExists(function ($query) {
            $query->select(DB::raw(1))
                ->from('post_files')
                ->whereColumn('post_files.post_id', 'posts.id');
        })
        ->orderBy('posts.created_at', 'desc')
        ->get();

        $photos = DB::table('post_files')
        ->join('files', 'files.id', 'post_files.file_id')
        ->whereIn('post_files.post_id', $albums->pluck('id'))
        ->select('post_files.post_id', 'files.id', 'files.path')
        ->get()
        ->groupBy('post_id');

        foreach ($albums as $album) {
            $album->photos = $photos->get($album->id, collect());
        }

        $data['class'] = $class;
        $data['albums'] = $albums;

        return view('admin.classes.albums', $data);
    }
    public function albumShow($id, $postId)
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

        $album = DB::table('post_class')
        ->join('posts', 'posts.id', 'post_class.post_id')
        ->leftJoin('users', 'users.id', 'posts.user_id')
        ->select('posts.*', 'users.name as author_name', 'users.photo_id as author_photo_id')
        ->where('post_class.class_id', $class->id)
        ->where('posts.id', $postId)
        ->where('posts.school_id', $school_id)
        ->whereNull('posts.deleted_at')
        ->first();

        if (!$album) {
            abort(404);
        }

        $album->photos = DB::table('post_files')
        ->join('files', 'files.id', 'post_files.file_id')
        ->where('post_files.post_id', $album->id)
        ->select('files.id', 'files.path', 'files.original_name')
        ->get();

        $data['class'] = $class;
        $data['album'] = $album;

        return view('admin.classes.album_show', $data);
    }
    public function downloadAlbum($id, $postId)
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

        $album = DB::table('post_class')
        ->join('posts', 'posts.id', 'post_class.post_id')
        ->where('post_class.class_id', $class->id)
        ->where('posts.id', $postId)
        ->where('posts.school_id', $school_id)
        ->whereNull('posts.deleted_at')
        ->select('posts.*')
        ->first();

        if (!$album) {
            abort(404);
        }

        $photos = DB::table('post_files')
        ->join('files', 'files.id', 'post_files.file_id')
        ->where('post_files.post_id', $album->id)
        ->select('files.path', 'files.original_name')
        ->get();

        if ($photos->isEmpty()) {
            abort(404);
        }

        $tmpDir = storage_path('app/tmp');
        if (!is_dir($tmpDir)) {
            mkdir($tmpDir, 0755, true);
        }

        $zipPath = $tmpDir . '/album_' . $album->id . '_' . time() . '.zip';

        $zip = new \ZipArchive();
        $zip->open($zipPath, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);

        $usedNames = [];
        foreach ($photos as $photo) {
            $filePath = public_path($photo->path);
            if (!file_exists($filePath)) {
                continue;
            }

            $name = $photo->original_name ?: basename($photo->path);
            $count = $usedNames[$name] ?? 0;
            $usedNames[$name] = $count + 1;
            if ($count > 0) {
                $extension = pathinfo($name, PATHINFO_EXTENSION);
                $baseName = pathinfo($name, PATHINFO_FILENAME);
                $name = $baseName . ' (' . $count . ')' . ($extension ? '.' . $extension : '');
            }

            $zip->addFile($filePath, $name);
        }

        $zip->close();

        $zipName = Str::slug($album->title ?: 'album') . '.zip';

        return response()->download($zipPath, $zipName)->deleteFileAfterSend(true);
    }
    public function downloadPhoto($id, $postId, $fileId)
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

        $belongsToAlbum = DB::table('post_class')
        ->join('posts', 'posts.id', 'post_class.post_id')
        ->where('post_class.class_id', $class->id)
        ->where('posts.id', $postId)
        ->where('posts.school_id', $school_id)
        ->whereNull('posts.deleted_at')
        ->exists();

        if (!$belongsToAlbum) {
            abort(404);
        }

        $photo = DB::table('post_files')
        ->join('files', 'files.id', 'post_files.file_id')
        ->where('post_files.post_id', $postId)
        ->where('files.id', $fileId)
        ->select('files.path', 'files.original_name')
        ->first();

        if (!$photo) {
            abort(404);
        }

        $filePath = public_path($photo->path);

        if (!file_exists($filePath)) {
            abort(404);
        }

        return response()->download($filePath, $photo->original_name ?: basename($photo->path));
    }
    public function show($id)
    {
        $school_id = $this->app['school']->id;

        $class = DB::table('classes')
        ->leftJoin('programs', 'programs.id', 'classes.program_id')
        ->leftJoin('users', 'users.id', 'classes.teacher_id')
        ->leftJoin('campuses', 'campuses.id', 'classes.campus_id')
        ->select('classes.*',
            'programs.name as program_name', 'users.name as teacher_name', 'users.photo_id as teacher_photo_id', 'campuses.name as campus_name')
        ->where('classes.school_id', $school_id)
        ->where('classes.id', $id)
        ->whereNull('classes.deleted_at')
        ->first();

        if (!$class) {
            abort(404);
        }
        $class->thumbnail_path = getThumbnailUrl($class->photo_id);

        $classTeachers = DB::table('class_teacher')
        ->join('users', 'users.id', 'class_teacher.teacher_id')
        ->where('class_teacher.class_id', $class->id)
        ->select('users.id', 'users.name', 'users.photo_id', 'class_teacher.role')
        ->get()
        ->sortBy(fn($teacher) => $teacher->role === 'lead' ? 0 : 1)
        ->values();
        $classTeachers->each(fn($teacher) => $teacher->thumbnail_path = getThumbnailUrl($teacher->photo_id));

        $today = now()->format('Y-m-d');

        $students = DB::table('class_student')
        ->join('students', 'students.id', 'class_student.student_id')
        ->leftJoin('parents as father', 'father.id', 'students.father_id')
        ->leftJoin('parents as mother', 'mother.id', 'students.mother_id')
        ->leftJoin('student_attendances', function ($join) use ($class, $today) {
            $join->on('student_attendances.student_id', 'students.id')
                ->where('student_attendances.class_id', $class->id)
                ->where('student_attendances.date', $today);
        })
        ->leftJoin('student_daily_logs', function ($join) use ($class, $today) {
            $join->on('student_daily_logs.student_id', 'students.id')
                ->where('student_daily_logs.class_id', $class->id)
                ->where('student_daily_logs.log_date', $today);
        })
        ->select('students.id', 'students.name', 'students.gender', 'students.birthdate', 'students.photo_id',
            'father.name as father_name', 'father.phone as father_phone',
            'mother.name as mother_name', 'mother.phone as mother_phone',
            'student_attendances.status as attendance_status',
            'student_attendances.note as attendance_note',
            'student_daily_logs.nap_quality as daily_log_nap_quality',
            'student_daily_logs.mood as daily_log_mood',
            'student_daily_logs.meal_amount as daily_log_meal_amount',
            'student_daily_logs.potty_count as daily_log_potty_count',
            'student_daily_logs.notes as daily_log_notes',
            DB::raw('EXISTS(SELECT 1 FROM student_tuitions
                        WHERE student_tuitions.student_id = students.id
                        AND student_tuitions.status = \'unpaid\') as has_unpaid_tuition'))
        ->where('class_student.class_id', $class->id)
        ->whereNull('students.deleted_at')
        ->orderBy('students.name')
        ->get();
        $students->each(fn($student) => $student->thumbnail_path = getThumbnailUrl($student->photo_id));

        $feedDatesPerPage = 1;
        $feedDates = $this->getClassFeedDates($class->id, $school_id);
        $hasMorePosts = $feedDates->count() > $feedDatesPerPage;
        $pageDates = $feedDates->take($feedDatesPerPage)->values();

        $postsHtml = $this->renderFeedForDates($class->id, $school_id, $pageDates);

        $recent_photos = DB::table('post_class')
        ->join('posts', 'posts.id', 'post_class.post_id')
        ->join('post_files', 'post_files.post_id', 'posts.id')
        ->join('files', 'files.id', 'post_files.file_id')
        ->where('post_class.class_id', $class->id)
        ->where('posts.school_id', $school_id)
        ->whereNull('posts.deleted_at')
        ->select('files.id', 'files.path')
        ->orderBy('post_files.created_at', 'desc')
        ->orderBy('post_files.id', 'desc')
        ->limit(6)
        ->get();

        $mealTypes = DB::table('meal_types')->orderBy('sort')->get();

        $todayMeals = DB::table('class_meals')
        ->where('class_meals.class_id', $class->id)
        ->where('class_meals.meal_date', $today)
        ->whereNull('class_meals.deleted_at')
        ->get()
        ->map(function ($meal) {
            $meal->thumbnail_path = getThumbnailUrl($meal->photo_id);
            return $meal;
        })
        ->keyBy('meal_type_id');

        $data['class'] = $class;
        $data['classTeachers'] = $classTeachers;
        $data['mealTypes'] = $mealTypes;
        $data['todayMeals'] = $todayMeals;
        $data['students'] = $students;
        $data['feed_dates'] = $pageDates;
        $data['posts_html'] = $postsHtml;
        $data['has_more_posts'] = $hasMorePosts;
        $data['recent_photos'] = $recent_photos;
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
    private function getClassPostsForDate($classId, $school_id, $date)
    {
        $posts = DB::table('post_class')
        ->join('posts', 'posts.id', 'post_class.post_id')
        ->leftJoin('users', 'users.id', 'posts.user_id')
        ->select('posts.*', 'users.name as author_name', 'users.photo_id as author_photo_id')
        ->where('post_class.class_id', $classId)
        ->where('posts.school_id', $school_id)
        ->whereNull('posts.deleted_at')
        ->whereDate('posts.created_at', $date)
        ->orderBy('posts.created_at', 'desc')
        ->orderBy('posts.id', 'desc')
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

        return $posts;
    }

    /**
     * Every distinct date (across posts, attendance, daily logs and meals) that has
     * activity for the class, newest first — this drives the class feed so a day's
     * attendance_marker shows up even when no post was made that day.
     */
    private function getClassFeedDates($classId, $school_id)
    {
        $postDates = DB::table('post_class')
        ->join('posts', 'posts.id', 'post_class.post_id')
        ->where('post_class.class_id', $classId)
        ->where('posts.school_id', $school_id)
        ->whereNull('posts.deleted_at')
        ->pluck('posts.created_at');

        $attendanceDates = DB::table('student_attendances')
        ->where('class_id', $classId)
        ->where('school_id', $school_id)
        ->pluck('date');

        $dailyLogDates = DB::table('student_daily_logs')
        ->where('class_id', $classId)
        ->where('school_id', $school_id)
        ->whereNull('deleted_at')
        ->pluck('log_date');

        $mealDates = DB::table('class_meals')
        ->where('class_id', $classId)
        ->where('school_id', $school_id)
        ->whereNull('deleted_at')
        ->pluck('meal_date');

        return $postDates->concat($attendanceDates)->concat($dailyLogDates)->concat($mealDates)
        ->map(fn($date) => \Carbon\Carbon::parse($date)->format('Y-m-d'))
        ->unique()
        ->sortDesc()
        ->values();
    }

    private function getAttendanceCounts($classId, $date)
    {
        $rows = DB::table('class_student')
        ->join('students', 'students.id', 'class_student.student_id')
        ->leftJoin('student_attendances', function ($join) use ($classId, $date) {
            $join->on('student_attendances.student_id', 'students.id')
                ->where('student_attendances.class_id', $classId)
                ->where('student_attendances.date', $date);
        })
        ->where('class_student.class_id', $classId)
        ->whereNull('students.deleted_at')
        ->select('student_attendances.status as attendance_status')
        ->get();

        return [
            'present' => $rows->filter(fn($r) => $r->attendance_status == 'present')->count(),
            'absent' => $rows->filter(fn($r) => $r->attendance_status == 'absent')->count(),
            'late' => $rows->filter(fn($r) => $r->attendance_status == 'late')->count(),
            'excused' => $rows->filter(fn($r) => $r->attendance_status == 'excused')->count(),
            'unmarked' => $rows->filter(fn($r) => in_array($r->attendance_status, ['unmarked', null]))->count(),
        ];
    }

    private function renderFeedForDates($classId, $school_id, $dates)
    {
        $html = '';
        foreach ($dates as $date) {
            $html .= view('admin.classes._attendance_marker', [
                'class_id' => $classId,
                'date' => $date,
                'counts' => $this->getAttendanceCounts($classId, $date),
                'meals' => $this->getClassMeals($classId, $date),
                'attention' => $this->getDailyLogAttention($classId, $date),
            ])->render();

            foreach ($this->getClassPostsForDate($classId, $school_id, $date) as $post) {
                $html .= view('admin.classes._post_card', ['post' => $post])->render();
            }
        }
        return $html;
    }

    private function getClassMeals($classId, $date)
    {
        return DB::table('class_meals')
        ->join('meal_types', 'meal_types.id', 'class_meals.meal_type_id')
        ->where('class_meals.class_id', $classId)
        ->where('class_meals.meal_date', $date)
        ->whereNull('class_meals.deleted_at')
        ->select('class_meals.*', 'meal_types.name as meal_type_name')
        ->orderBy('meal_types.sort')
        ->get()
        ->map(function ($meal) {
            $meal->thumbnail_path = getThumbnailUrl($meal->photo_id);
            $meal->photo_path = $meal->photo_id ? getPhotoUrl($meal->photo_id) : null;
            return $meal;
        });
    }

    private function getDailyLogAttention($classId, $date)
    {
        $moodLabels = [
            'quay_khoc' => 'Quấy khóc',
            'met_moi' => 'Mệt mỏi',
            'om' => 'Ốm',
        ];

        return DB::table('student_daily_logs')
        ->join('students', 'students.id', 'student_daily_logs.student_id')
        ->where('student_daily_logs.class_id', $classId)
        ->where('student_daily_logs.log_date', $date)
        ->whereNull('students.deleted_at')
        ->select('students.id', 'students.name', 'students.photo_id',
            'student_daily_logs.nap_quality', 'student_daily_logs.mood',
            'student_daily_logs.meal_amount', 'student_daily_logs.notes')
        ->orderBy('students.name')
        ->get()
        ->map(function ($row) use ($moodLabels) {
            $row->thumbnail_path = getThumbnailUrl($row->photo_id);
            $reasons = [];

            if ($row->nap_quality == 'insufficient') {
                $reasons[] = 'Ngủ không đủ giấc';
            } elseif ($row->nap_quality == 'skipped') {
                $reasons[] = 'Không ngủ trưa';
            }

            if (isset($moodLabels[$row->mood])) {
                $reasons[] = $moodLabels[$row->mood];
            }

            if ($row->meal_amount == 'none') {
                $reasons[] = 'Không ăn';
            } elseif ($row->meal_amount == 'some') {
                $reasons[] = 'Ăn ít';
            }

            if (!empty(trim((string) $row->notes))) {
                $reasons[] = trim($row->notes);
            }

            $row->attention_reasons = $reasons;
            return $row;
        })
        ->filter(fn($row) => !empty($row->attention_reasons))
        ->values();
    }

    public function loadPosts(Request $request, $id)
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

        $limit = 10;
        $offset = max(0, (int) $request->get('offset', 0));

        $feedDates = $this->getClassFeedDates($class->id, $school_id);
        $pageDates = $feedDates->slice($offset, $limit)->values();
        $hasMore = $feedDates->count() > $offset + $pageDates->count();

        $html = $this->renderFeedForDates($class->id, $school_id, $pageDates);

        return response()->json([
            'html' => $html,
            'has_more' => $hasMore,
            'next_offset' => $offset + $pageDates->count(),
        ]);
    }

    public function edit($id){
        $class = DB::table('classes')
        ->select('classes.*')
        ->where('classes.school_id', $this->app['school']->id)
        ->where('classes.id', $id)
        ->first();
        if ($class) $class->thumbnail_path = getThumbnailUrl($class->photo_id);

        $data['class']=$class;

       $programs = DB::table('programs')
        ->select('programs.*')
        ->where('programs.school_id', $this->app['school']->id)
        ->whereNull('programs.deleted_at')
        ->get();
        $programs->each(fn($program) => $program->thumbnail_path = getThumbnailUrl($program->photo_id));
        $data['programs']=$programs;
        $teachers = DB::table('users')
        ->where('school_id', $this->app['school']->id)
        ->whereNull('deleted_at')
        ->get();
        $data['teachers']=$teachers;

        $data['assistantTeacherIds'] = DB::table('class_teacher')
        ->where('class_id', $id)
        ->where('role', 'assistant')
        ->pluck('teacher_id');

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

        $this->syncClassTeachers($id, $request->get('teacher_id'), $request->get('assistant_teacher_ids', []));

        return redirect()->route('classes.show', $id)
                     ->with('success', 'Post updated!');
    }
    public function create()
    {
         $programs = DB::table('programs')
        ->select('programs.*')
        ->where('programs.school_id', $this->app['school']->id)
        ->whereNull('programs.deleted_at')
        ->get();
        $programs->each(fn($program) => $program->thumbnail_path = getThumbnailUrl($program->photo_id));
        $data['programs']=$programs;


        $teachers = DB::table('users')
        ->where('school_id', $this->app['school']->id)
        ->whereNull('deleted_at')
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
        'teacher_id' => ['required', Rule::exists('users', 'id')->whereNull('deleted_at')],
        'assistant_teacher_ids' => 'nullable|array',
        'assistant_teacher_ids.*' => ['integer', Rule::exists('users', 'id')->whereNull('deleted_at')],
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

    $this->syncClassTeachers($post_id, $request->get('teacher_id'), $request->get('assistant_teacher_ids', []));

     return redirect()->route('classes.show', $post_id)
                     ->with('success', 'Post created!');
    }

    private function syncClassTeachers($classId, $leadTeacherId, array $assistantTeacherIds)
    {
        DB::table('class_teacher')->where('class_id', $classId)->delete();

        $rows = [];
        if ($leadTeacherId) {
            $rows[] = ['class_id' => $classId, 'teacher_id' => $leadTeacherId, 'role' => 'lead'];
        }

        foreach (array_unique($assistantTeacherIds) as $teacherId) {
            if ($teacherId == $leadTeacherId) {
                continue;
            }
            $rows[] = ['class_id' => $classId, 'teacher_id' => $teacherId, 'role' => 'assistant'];
        }

        if (!empty($rows)) {
            DB::table('class_teacher')->insert($rows);
        }
    }

    public function updatePhoto(Request $request, $id)
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
            'photo_id' => 'required|exists:files,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }

        DB::table('classes')
        ->where('id', $class->id)
        ->update([
            'photo_id' => $request->get('photo_id'),
            'updated_at' => now(),
        ]);

        return response()->json(['status' => 'ok']);
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

    public function editPost(Request $request, $id, $postId)
    {
        $school_id = $this->app['school']->id;

        $post = DB::table('post_class')
        ->join('posts', 'posts.id', 'post_class.post_id')
        ->where('post_class.class_id', $id)
        ->where('posts.id', $postId)
        ->where('posts.school_id', $school_id)
        ->whereNull('posts.deleted_at')
        ->select('posts.*')
        ->first();

        if (!$post) {
            abort(404);
        }

        $files = DB::table('post_files')
        ->join('files', 'files.id', 'post_files.file_id')
        ->where('post_files.post_id', $post->id)
        ->select('files.id', 'files.path')
        ->get();

        return response()->json([
            'content' => $post->content,
            'files' => $files,
        ]);
    }

    public function updatePost(Request $request, $id, $postId)
    {
        $school_id = $this->app['school']->id;

        $belongsToClass = DB::table('post_class')
        ->where('class_id', $id)
        ->where('post_id', $postId)
        ->exists();

        if (!$belongsToClass) {
            abort(404);
        }

        $post = DB::table('posts')
        ->where('id', $postId)
        ->where('school_id', $school_id)
        ->whereNull('deleted_at')
        ->first();

        if (!$post) {
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

        DB::table('posts')
        ->where('id', $post->id)
        ->update([
            'title' => $title !== '' ? $title : 'Cập nhật lớp học',
            'content' => $request->get('content'),
            'updated_at' => now(),
        ]);

        $fileIds = array_filter($request->get('files', []));

        DB::table('post_files')
        ->where('post_id', $post->id)
        ->whereNotIn('file_id', $fileIds)
        ->delete();

        foreach ($fileIds as $fileId) {
            DB::table('post_files')->insertOrIgnore([
                'post_id' => $post->id,
                'file_id' => $fileId,
                'school_id' => $school_id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $updatedPost = DB::table('post_class')
        ->join('posts', 'posts.id', 'post_class.post_id')
        ->leftJoin('users', 'users.id', 'posts.user_id')
        ->select('posts.*', 'users.name as author_name', 'users.photo_id as author_photo_id')
        ->where('post_class.class_id', $id)
        ->where('posts.id', $post->id)
        ->first();

        $updatedPost->photos = DB::table('post_files')
        ->join('files', 'files.id', 'post_files.file_id')
        ->where('post_files.post_id', $updatedPost->id)
        ->select('files.id', 'files.path')
        ->get();

        if ($request->ajax()) {
            return response()->json([
                'status' => 'ok',
                'html' => view('admin.classes._post_card', ['post' => $updatedPost])->render(),
            ]);
        }

        return redirect()->route('classes.show', $id)
                     ->with('success', 'Đã cập nhật bài viết!');
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

    public function updateMeals(Request $request, $id)
    {
        $school_id = $this->app['school']->id;

        $class = DB::table('classes')
        ->where('id', $id)
        ->where('school_id', $school_id)
        ->whereNull('deleted_at')
        ->first();

        if (!$class) {
            return response()->json(['message' => 'Không có quyền truy cập.'], 403);
        }

        $validator = Validator::make($request->all(), [
            'meal_type_id' => ['required', 'integer', Rule::exists('meal_types', 'id')],
            'description' => 'nullable|string',
            'photo_id' => 'nullable|exists:files,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Dữ liệu không hợp lệ.',
                'errors' => $validator->errors(),
            ], 422);
        }

        // Teachers can only ever record today's meals — the date is never taken from the request.
        $date = now()->format('Y-m-d');
        $mealTypeId = (int) $request->get('meal_type_id');

        $existing = DB::table('class_meals')
        ->where('class_id', $class->id)
        ->where('meal_date', $date)
        ->where('meal_type_id', $mealTypeId)
        ->first();

        $payload = [
            'description' => $request->get('description'),
            'photo_id' => $request->get('photo_id') ?: null,
            'created_by' => Auth::id(),
            'updated_at' => now(),
        ];

        if ($existing) {
            DB::table('class_meals')->where('id', $existing->id)->update($payload);
        } else {
            DB::table('class_meals')->insert(array_merge($payload, [
                'school_id' => $school_id,
                'class_id' => $class->id,
                'meal_date' => $date,
                'meal_type_id' => $mealTypeId,
                'created_at' => now(),
            ]));
        }

        return response()->json(['status' => 'ok']);
    }

    public function dailyLogs(Request $request, $id)
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

        $date = $request->get('date', now()->format('Y-m-d'));

        $students = DB::table('class_student')
        ->join('students', 'students.id', 'class_student.student_id')
        ->leftJoin('student_daily_logs', function ($join) use ($class, $date) {
            $join->on('student_daily_logs.student_id', 'students.id')
                ->where('student_daily_logs.class_id', $class->id)
                ->where('student_daily_logs.log_date', $date);
        })
        ->select('students.id', 'students.name', 'students.photo_id',
            'student_daily_logs.nap_quality', 'student_daily_logs.mood',
            'student_daily_logs.meal_amount', 'student_daily_logs.potty_count', 'student_daily_logs.notes')
        ->where('class_student.class_id', $class->id)
        ->whereNull('students.deleted_at')
        ->orderBy('students.name')
        ->get();
        $students->each(fn($student) => $student->thumbnail_path = getThumbnailUrl($student->photo_id));

        $data['class'] = $class;
        $data['date'] = $date;
        $data['students'] = $students;

        return view('admin.classes.daily_logs', $data);
    }

    public function updateDailyLogs(Request $request, $id)
    {
        $school_id = $this->app['school']->id;

        $class = DB::table('classes')
        ->where('id', $id)
        ->where('school_id', $school_id)
        ->whereNull('deleted_at')
        ->first();

        if (!$class) {
            return response()->json(['message' => 'Không có quyền truy cập.'], 403);
        }

        $validator = Validator::make($request->all(), [
            'date' => ['required', 'date', Rule::in([now()->format('Y-m-d')])],
            'updates' => 'required|array|min:1',
            'updates.*.student_id' => 'required|integer',
            'updates.*.nap_quality' => ['nullable', Rule::in(['good', 'insufficient', 'skipped'])],
            'updates.*.mood' => 'nullable|string|max:30',
            'updates.*.meal_amount' => ['nullable', Rule::in(['none', 'some', 'most', 'all'])],
            'updates.*.potty_count' => 'nullable|integer|min:0',
            'updates.*.notes' => 'nullable|string|max:256',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Chỉ có thể cập nhật sức khỏe hàng ngày cho ngày hôm nay.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $date = $request->get('date');

        $studentIds = DB::table('class_student')
        ->where('class_id', $class->id)
        ->pluck('student_id');

        $saved = [];
        foreach ($request->get('updates') as $update) {
            $studentId = (int) $update['student_id'];
            if (!$studentIds->contains($studentId)) {
                continue;
            }

            $this->saveDailyLog($class, $school_id, $date, $studentId, $update);
            $saved[] = $studentId;
        }

        return response()->json(['status' => 'ok', 'saved' => $saved]);
    }

    private function saveDailyLog($class, $school_id, $date, $studentId, $update)
    {
        $payload = [
            'nap_quality' => $update['nap_quality'] ?? null,
            'mood' => $update['mood'] ?? null,
            'meal_amount' => $update['meal_amount'] ?? null,
            'potty_count' => $update['potty_count'] ?? null,
            'notes' => $update['notes'] ?? null,
            'created_by' => Auth::id(),
            'updated_at' => now(),
        ];

        $existing = DB::table('student_daily_logs')
        ->where('class_id', $class->id)
        ->where('student_id', $studentId)
        ->where('log_date', $date)
        ->first();

        if ($existing) {
            DB::table('student_daily_logs')->where('id', $existing->id)->update($payload);
        } else {
            DB::table('student_daily_logs')->insert(array_merge($payload, [
                'school_id' => $school_id,
                'class_id' => $class->id,
                'student_id' => $studentId,
                'log_date' => $date,
                'created_at' => now(),
            ]));
        }
    }

    public function destroy($id){
        DB::table('classes')->where('id', $id)->delete();

            return redirect()->route('classes.index')
                            ->with('success', 'Level deleted successfully.');
    }
}