<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class StudentsController extends BaseController
{
    public function index()
    {
         $students = DB::table('students')
        ->leftJoin('parents as father','father.id','students.father_id')
        ->leftJoin('parents as mother','mother.id','students.mother_id')
        ->select('students.*',
            'father.name as father_name', 'father.phone as father_phone',
            'mother.name as mother_name', 'mother.phone as mother_phone',
            DB::raw('(SELECT classes.name FROM class_student
                        INNER JOIN classes ON classes.id = class_student.class_id
                        WHERE class_student.student_id = students.id
                        ORDER BY class_student.class_id LIMIT 1) as class_name'),
            DB::raw('(SELECT class_student.class_id FROM class_student
                        WHERE class_student.student_id = students.id
                        ORDER BY class_student.class_id LIMIT 1) as class_id'),
            DB::raw('EXISTS(SELECT 1 FROM student_tuitions
                        WHERE student_tuitions.student_id = students.id
                        AND student_tuitions.status = \'unpaid\') as has_unpaid_tuition'),
            DB::raw('(SELECT student_tuitions.month FROM student_tuitions
                        WHERE student_tuitions.student_id = students.id
                        ORDER BY student_tuitions.year DESC, student_tuitions.month DESC LIMIT 1) as last_tuition_month'),
            DB::raw('(SELECT student_tuitions.year FROM student_tuitions
                        WHERE student_tuitions.student_id = students.id
                        ORDER BY student_tuitions.year DESC, student_tuitions.month DESC LIMIT 1) as last_tuition_year'))
        ->where('students.school_id', $this->app['school']->id)
        ->whereNull('students.deleted_at')
        ->orderBy('students.created_at', 'desc')
        ->get();
        $students->each(fn($student) => $student->thumbnail_path = getThumbnailUrl($student->photo_id));
        $data['students']=$students;

        $data['classes'] = DB::table('classes')
        ->where('school_id', $this->app['school']->id)
        ->whereNull('classes.deleted_at')
        ->orderBy('classes.name')
        ->get();

        return view('admin.students.index',$data);
    }
    public function show($id)
    {
        $student = $this->findStudentWithRelations($id);

        if (!$student) {
            abort(404);
        }

        $school_id = $this->app['school']->id;

        $months = DB::table('student_tuitions as t')
        ->leftJoin('student_tuitions_fees as f', 'f.tuition_id', 't.id')
        ->where('t.student_id', $id)
        ->where('t.school_id', $school_id)
        ->groupBy('t.id', 't.year', 't.month', 't.status')
        ->orderBy('t.year', 'desc')
        ->orderBy('t.month', 'desc')
        ->selectRaw('t.id, t.year, t.month, t.status, COALESCE(SUM(f.amount), 0) as total')
        ->limit(6)
        ->get();

        $has_unpaid_tuition = DB::table('student_tuitions')
        ->where('student_id', $id)
        ->where('school_id', $school_id)
        ->where('status', 'unpaid')
        ->exists();

        $photos = DB::table('student_photos')
        ->join('files', 'files.id', 'student_photos.file_id')
        ->where('student_photos.student_id', $id)
        ->where('student_photos.school_id', $school_id)
        ->orderBy('student_photos.created_at', 'desc')
        ->select('student_photos.id', 'student_photos.caption', 'student_photos.created_at',
            'files.id as file_id', 'files.path')
        ->get();

        $data['student'] = $student;
        $data['months'] = $months;
        $data['has_unpaid_tuition'] = $has_unpaid_tuition;
        $data['photos'] = $photos;
        $data['timeline'] = $this->buildTimeline($id, $school_id, $student);
        return view('admin.students.show',$data);
    }

    public function photosStore($id, Request $request)
    {
        $school_id = $this->app['school']->id;

        $student = DB::table('students')
        ->where('id', $id)
        ->where('school_id', $school_id)
        ->first();

        if (!$student) {
            abort(404);
        }

        $validator = Validator::make($request->all(), [
            'file_id' => 'required|integer',
            'caption' => 'nullable|string|max:256',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $file = DB::table('files')
        ->where('id', $request->get('file_id'))
        ->where('school_id', $school_id)
        ->first();

        if (!$file) {
            return response()->json(['status' => 'error', 'message' => 'File không hợp lệ.'], 422);
        }

        $photo_id = DB::table('student_photos')->insertGetId([
            'school_id' => $school_id,
            'student_id' => $id,
            'file_id' => $file->id,
            'caption' => $request->get('caption'),
            'created_by' => Auth::id(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json(['status' => 'ok', 'id' => $photo_id, 'path' => $file->path]);
    }

    public function photosDestroy($id, $photo_id)
    {
        DB::table('student_photos')
        ->where('id', $photo_id)
        ->where('student_id', $id)
        ->where('school_id', $this->app['school']->id)
        ->delete();

        return redirect("/admin/students/{$id}")
            ->with('success', 'Đã xoá ảnh.');
    }

    /**
     * Merge the student's payment/attendance/photo history into a single
     * reverse-chronological feed for the profile timeline.
     */
    private function buildTimeline($student_id, $school_id, $student)
    {
        $events = collect();

        if ($student->created_at) {
            $events->push([
                'date' => $student->created_at,
                'icon' => 'fa-user-plus',
                'color' => 'primary',
                'title' => 'Được thêm vào hệ thống',
                'description' => null,
            ]);
        }

        $paidTuitions = DB::table('student_tuitions as t')
        ->leftJoin('users as u', 'u.id', 't.paid_by')
        ->where('t.student_id', $student_id)
        ->where('t.school_id', $school_id)
        ->where('t.status', 'paid')
        ->whereNotNull('t.paid_at')
        ->orderBy('t.paid_at', 'desc')
        ->limit(12)
        ->select('t.paid_at', 't.month', 't.year', 'u.name as paid_by_name')
        ->get();

        foreach ($paidTuitions as $tuition) {
            $events->push([
                'date' => $tuition->paid_at,
                'icon' => 'fa-money-bill-wave',
                'color' => 'success',
                'title' => sprintf('Đã đóng học phí tháng %02d/%d', $tuition->month, $tuition->year),
                'description' => $tuition->paid_by_name ? 'Xác nhận bởi ' . $tuition->paid_by_name : null,
            ]);
        }

        $attendanceLabels = [
            'absent' => ['Vắng mặt', 'danger', 'fa-calendar-xmark'],
            'late' => ['Đi muộn', 'warning', 'fa-clock'],
            'excused' => ['Vắng có phép', 'info', 'fa-calendar-check'],
        ];

        $attendances = DB::table('student_attendances')
        ->where('student_id', $student_id)
        ->where('school_id', $school_id)
        ->whereIn('status', array_keys($attendanceLabels))
        ->orderBy('date', 'desc')
        ->limit(20)
        ->get();

        foreach ($attendances as $attendance) {
            [$label, $color, $icon] = $attendanceLabels[$attendance->status];
            $events->push([
                'date' => $attendance->date,
                'icon' => $icon,
                'color' => $color,
                'title' => $label,
                'description' => $attendance->note,
            ]);
        }

        $photos = DB::table('student_photos')
        ->where('student_id', $student_id)
        ->where('school_id', $school_id)
        ->orderBy('created_at', 'desc')
        ->limit(12)
        ->get();

        foreach ($photos as $photo) {
            $events->push([
                'date' => $photo->created_at,
                'icon' => 'fa-image',
                'color' => 'info',
                'title' => 'Thêm ảnh mới',
                'description' => $photo->caption,
            ]);
        }

        return $events
            ->sortByDesc(fn ($event) => Carbon::parse($event['date']))
            ->take(30)
            ->values();
    }
    public function edit($id){
         $student = $this->findStudentWithRelations($id);
        $data['student']=$student;
        $classes = DB::table('classes')
        ->where('school_id', $this->app['school']->id)
        ->whereNull('classes.deleted_at')
        ->get();
        $data['classes']=$classes;
        return view('admin.students.edit',$data);
    }
    public function update($id,Request $request){

        $validator = Validator::make($request->all(), [
        'name' => 'required|min:5',
        'photo_id' => 'required', // example
        'address'=> 'required',
        'birthdate'=> 'required',
        'gender'=> 'nullable|in:male,female',
        'father_name'=> 'required',
        'father_phone'=> 'required',
        'father_email'=> 'nullable|email',
        'mother_name'=> 'required',
        'mother_phone'=> 'required',
        'mother_email'=> 'nullable|email',
        'tuition_discount'=> 'nullable|integer|min:0|max:100',
        'tuition_discount_reason'=> 'nullable|string|max:256',
        ]);



        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }

        $school_id = $this->app['school']->id;

        $student = DB::table('students')
        ->where('id', $id)
        ->where('school_id', $school_id)
        ->first();

        if (!$student) {
            abort(404);
        }

        $father_id = $this->saveParent($school_id, $request->get('father_name'), $request->get('father_phone'), $request->get('father_email'), 'male', $student->father_id);
        $mother_id = $this->saveParent($school_id, $request->get('mother_name'), $request->get('mother_phone'), $request->get('mother_email'), 'female', $student->mother_id);

        DB::table('students')
        ->where('id', $id)
        ->where('school_id', $school_id)
        ->update([
                'name' => $request->get('name'),
                'address' => $request->get('address'),
                'birthdate' => $request->get('birthdate'),
                'gender' => $request->get('gender') ?: null,
                'father_id' => $father_id,
                'mother_id' => $mother_id,
                'school_id' => $school_id,
                'photo_id' => $request->get('photo_id'),
                'tuition_discount' => $request->get('tuition_discount') ?: null,
                'tuition_discount_reason' => $request->get('tuition_discount_reason') ?: null,
                'updated_at' => now(),
        ]);

        $this->syncStudentClass($id, $request->get('class_id'));

        return redirect('/admin/students');

    }
    public function create()
    {
        $classes = DB::table('classes') 
        ->where('school_id', $this->app['school']->id)
        ->whereNull('classes.deleted_at')
        ->get();
        $data['classes']=$classes; 
        return view('admin.students.create',$data);
    } 
    public function store(Request $request){

        $validator = Validator::make($request->all(), [
        'name' => 'required|min:5',
        'photo_id' => 'required', // example
        'address'=> 'required',
        'birthdate'=> 'required',
        'gender'=> 'nullable|in:male,female',
        'father_name'=> 'required',
        'father_phone'=> 'required',
        'father_email'=> 'nullable|email',
        'mother_name'=> 'required',
        'mother_phone'=> 'required',
        'mother_email'=> 'nullable|email',
        'tuition_discount'=> 'nullable|integer|min:0|max:100',
        'tuition_discount_reason'=> 'nullable|string|max:256',
        ]);



        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }

        $school_id = $this->app['school']->id;

        $father_id = $this->saveParent($school_id, $request->get('father_name'), $request->get('father_phone'), $request->get('father_email'), 'male');
        $mother_id = $this->saveParent($school_id, $request->get('mother_name'), $request->get('mother_phone'), $request->get('mother_email'), 'female');

        $post_id=DB::table('students')->insertGetId([
        'name' => $request->get('name'),
        'address' => $request->get('address'),
        'birthdate' => $request->get('birthdate'),
        'gender' => $request->get('gender') ?: null,
        'father_id' => $father_id,
        'mother_id' => $mother_id,
        'school_id' => $school_id,
        'photo_id' => $request->get('photo_id'),
        'tuition_discount' => $request->get('tuition_discount') ?: null,
        'tuition_discount_reason' => $request->get('tuition_discount_reason') ?: null,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

        $this->syncStudentClass($post_id, $request->get('class_id'));

     return redirect()->route('students.index')
                     ->with('success', 'Post created!');
    }

    public function importForm()
    {
        return view('admin.students.import');
    }

    public function importSample()
    {
        $header = ['name','gender','birthdate','class_name','address','father_name','father_phone','father_email','mother_name','mother_phone','mother_email'];
        $sample = ['Nguyễn Văn A','male','2015-05-20','Lớp 1A','123 Đường ABC, Hà Nội','Nguyễn Văn B','0900000001','fatherb@example.com','Trần Thị C','0900000002','motherc@example.com'];

        $callback = function() use ($header, $sample) {
            $handle = fopen('php://output', 'w');
            fputs($handle, "\xEF\xBB\xBF");
            fputcsv($handle, $header);
            fputcsv($handle, $sample);
            fclose($handle);
        };

        return response()->streamDownload($callback, 'students_import_sample.csv', [
            'Content-Type' => 'text/csv',
        ]);
    }

    public function importPreview(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'csv_file' => 'required|file|mimes:csv,txt|max:5120',
        ]);

        if ($validator->fails()) {
            return redirect()->route('students.import_form')
                ->withErrors($validator);
        }

        $rows = $this->parseImportCsv($request->file('csv_file'), $this->app['school']->id);

        if (empty($rows)) {
            return redirect()->route('students.import_form')
                ->with('error', 'File CSV không có dữ liệu.');
        }

        session(['students_import_rows' => $rows]);

        return redirect()->route('students.import_review');
    }

    public function importReview()
    {
        $rows = session('students_import_rows');
        if (!$rows) {
            return redirect()->route('students.import_form')
                ->with('error', 'Vui lòng tải lên file CSV trước.');
        }
        $data['rows'] = $rows;
        $data['valid_count'] = count(array_filter($rows, fn($r) => $r['valid']));
        $data['invalid_count'] = count($rows) - $data['valid_count'];
        return view('admin.students.import_review', $data);
    }

    public function importStore(Request $request)
    {
        $rows = session('students_import_rows');
        if (!$rows) {
            return redirect()->route('students.import_form')
                ->with('error', 'Phiên làm việc đã hết hạn, vui lòng tải lên file lại.');
        }

        $school_id = $this->app['school']->id;
        $now = now();
        $imported = 0;

        foreach ($rows as $row) {
            if (!$row['valid']) continue;

            $father_id = $this->saveParent($school_id, $row['father_name'], $row['father_phone'], $row['father_email'], 'male');
            $mother_id = $this->saveParent($school_id, $row['mother_name'], $row['mother_phone'], $row['mother_email'], 'female');

            $student_id = DB::table('students')->insertGetId([
                'name' => $row['name'],
                'gender' => $row['gender'] !== '' ? $row['gender'] : null,
                'address' => $row['address'],
                'birthdate' => $row['birthdate'],
                'father_id' => $father_id,
                'mother_id' => $mother_id,
                'school_id' => $school_id,
                'created_at' => $now,
                'updated_at' => $now,
            ]);

            if ($row['class_id']) {
                DB::table('class_student')->insert([
                    'class_id' => $row['class_id'],
                    'student_id' => $student_id,
                ]);
            }

            $imported++;
        }

        $skipped = count($rows) - $imported;

        session()->forget('students_import_rows');

        $message = "Đã import thành công {$imported} học sinh.";
        if ($skipped > 0) {
            $message .= " Bỏ qua {$skipped} dòng do lỗi.";
        }

        return redirect()->route('students.index')
                     ->with('success', $message);
    }

    private function parseImportCsv($file, $school_id)
    {
        $classes = DB::table('classes')
            ->where('school_id', $school_id)
            ->whereNull('deleted_at')
            ->get()
            ->keyBy(function ($c) {
                return mb_strtolower(trim($c->name));
            });

        $handle = fopen($file->getRealPath(), 'r');
        $header = fgetcsv($handle);
        if (!$header) {
            fclose($handle);
            return [];
        }
        if (substr($header[0], 0, 3) === "\xEF\xBB\xBF") {
            $header[0] = substr($header[0], 3);
        }
        $header = array_map(function ($h) {
            return strtolower(trim($h));
        }, $header);

        $rows = [];
        $line = 1;
        while (($data = fgetcsv($handle)) !== false) {
            $line++;
            if (count($data) === 1 && trim((string) $data[0]) === '') {
                continue;
            }
            $data = array_pad($data, count($header), '');
            $record = array_combine($header, array_slice($data, 0, count($header)));
            $name = trim($record['name'] ?? '');
            $address = trim($record['address'] ?? '');
            $birthdate_raw = trim($record['birthdate'] ?? '');
            $father_name = trim($record['father_name'] ?? '');
            $father_phone = trim($record['father_phone'] ?? '');
            $mother_name = trim($record['mother_name'] ?? '');
            $mother_phone = trim($record['mother_phone'] ?? '');
            $class_name = trim($record['class_name'] ?? '');
            $gender = trim($record['gender'] ?? '');
            $father_email = trim($record['father_email'] ?? '');
            $mother_email = trim($record['mother_email'] ?? '');

            $errors = [];
            if ($name === '' || mb_strlen($name) < 5) {
               
                $errors[] = 'Tên học sinh phải có ít nhất 5 ký tự';    
            }
            if ($address === '') {
                $errors[] = 'Địa chỉ là bắt buộc';
            }
            $birthdate = null;
            if ($birthdate_raw === '') {
                $errors[] = 'Ngày sinh là bắt buộc';
            } else {
                $ts = strtotime($birthdate_raw);
                if ($ts === false) {
                    $errors[] = 'Ngày sinh không đúng định dạng (yyyy-mm-dd)';
                } else {
                    $birthdate = date('Y-m-d', $ts);
                }
            }
            if ($father_name === '') {
                $errors[] = 'Tên bố là bắt buộc';
            }
            if ($father_phone === '') {
                $errors[] = 'SĐT bố là bắt buộc';
            }
            if ($mother_name === '') {
                $errors[] = 'Tên mẹ là bắt buộc';
            }
            if ($mother_phone === '') {
                $errors[] = 'SĐT mẹ là bắt buộc';
            }

            $class_id = null;
            if ($class_name !== '') {
                $matched = $classes->get(mb_strtolower($class_name));
                if ($matched) {
                    $class_id = $matched->id;
                } else {
                    $errors[] = "Không tìm thấy lớp học \"{$class_name}\"";
                }
            }

            $rows[] = [
                'line' => $line,
                'name' => $name,
                'gender' => $gender,
                'birthdate' => $birthdate ?? $birthdate_raw,
                'class_name' => $class_name,
                'class_id' => $class_id,
                'address' => $address,
                'father_name' => $father_name,
                'father_phone' => $father_phone,
                'father_email' => $father_email,
                'mother_name' => $mother_name,
                'mother_phone' => $mother_phone,
                'mother_email' => $mother_email,
                'errors' => $errors,
                'valid' => count($errors) === 0,
            ];
        }
        fclose($handle);
        return $rows;
    }

    private function findStudentWithRelations($id)
    {
        $student = DB::table('students')
        ->leftJoin('parents as father','father.id','students.father_id')
        ->leftJoin('parents as mother','mother.id','students.mother_id')
        ->select(
            'students.*',
            'father.name as father_name','father.phone as father_phone','father.email as father_email',
            'mother.name as mother_name','mother.phone as mother_phone','mother.email as mother_email',
            DB::raw('(SELECT class_student.class_id FROM class_student
                        WHERE class_student.student_id = students.id
                        ORDER BY class_student.class_id LIMIT 1) as class_id'),
            DB::raw('(SELECT classes.name FROM class_student
                        INNER JOIN classes ON classes.id = class_student.class_id
                        WHERE class_student.student_id = students.id
                        ORDER BY class_student.class_id LIMIT 1) as class_name')
        )
        ->where('students.school_id', $this->app['school']->id)
        ->where('students.id', $id)
        ->first();
        if ($student) $student->thumbnail_path = getThumbnailUrl($student->photo_id);
        return $student;
    }

    /**
     * Create or update a parents row for a student's father/mother and return its id.
     * Reuses an existing parent by id (when editing) or by email (to avoid violating
     * the unique constraint on parents.email when siblings share a parent).
     */
    private function saveParent($school_id, $name, $phone, $email, $gender, $existing_id = null)
    {
        $email = ($email !== null && $email !== '') ? $email : null;
        $now = now();

        if ($existing_id) {
            DB::table('parents')
                ->where('id', $existing_id)
                ->where('school_id', $school_id)
                ->update([
                    'name' => $name,
                    'phone' => $phone,
                    'email' => $email,
                    'gender' => $gender,
                    'updated_at' => $now,
                ]);
            return $existing_id;
        }

        if ($email) {
            $existing = DB::table('parents')
                ->where('school_id', $school_id)
                ->where('email', $email)
                ->first();
            if ($existing) {
                DB::table('parents')
                    ->where('id', $existing->id)
                    ->update([
                        'name' => $name,
                        'phone' => $phone,
                        'gender' => $gender,
                        'updated_at' => $now,
                    ]);
                return $existing->id;
            }
        }

        return DB::table('parents')->insertGetId([
            'school_id' => $school_id,
            'name' => $name,
            'phone' => $phone,
            'email' => $email,
            'gender' => $gender,
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }

    private function syncStudentClass($student_id, $class_id)
    {
        DB::table('class_student')->where('student_id', $student_id)->delete();

        if ($class_id) {
            DB::table('class_student')->insert([
                'class_id' => $class_id,
                'student_id' => $student_id,
            ]);
        }
    }

    public function destroy($id){
        DB::table('students')
        ->where('id', $id)
        ->where('school_id', $this->app['school']->id)
        ->update(['deleted_at' => now()]);

            return redirect()->route('students.index')
                            ->with('success', 'Đã xóa học sinh.');   
    }
}


