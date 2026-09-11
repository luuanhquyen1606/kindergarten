<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ProfileController extends BaseController
{
    public function show()
    {
        $user = $this->currentUser();
        $data['user'] = $user;

        $classes = DB::table('classes as c')
            ->leftJoin('programs as p', 'p.id', 'c.program_id')
            ->select(
                'c.*', 'p.name as program_name',
                DB::raw('(SELECT COUNT(*) FROM class_student WHERE class_student.class_id = c.id) as student_count')
            )
            ->whereIn('c.id', teacherClassIds($this->app['school']->id, $user->id))
            ->where('c.school_id', $this->app['school']->id)
            ->whereNull('c.deleted_at')
            ->orderBy('c.name')
            ->get();
        $data['classes'] = $classes;
        $data['total_students'] = $classes->sum('student_count');

        $rows = DB::table('users_permissions as up')
            ->join('permissions as p', 'p.id', '=', 'up.permission_id')
            ->leftJoin('permission_groups as g', 'g.id', '=', 'p.permission_group_id')
            ->select('g.id as group_id', 'g.name as group_name', 'g.description as group_description', 'p.name as permission_name')
            ->where('up.user_id', $user->id)
            ->where('up.school_id', $this->app['school']->id)
            ->orderBy('g.name')
            ->orderBy('p.name')
            ->get();
        $data['permission_groups'] = $rows->groupBy('group_id')->map(function ($items) {
            $group = $items->first();
            return [
                'group_name' => $group->group_name,
                'description' => $group->group_description,
                'permissions' => $items->pluck('permission_name'),
            ];
        })->values();

        return view('admin.profile.show', $data);
    }

    public function edit()
    {
        $data['user'] = $this->currentUser();
        return view('admin.profile.edit', $data);
    }

    public function update(Request $request)
    {
        $id = Auth::user()->id;

        $school_email = $request->get('school_email_alias')
            ? $request->get('school_email_alias') . '@' . $this->app['school']->domain
            : null;
        $request->merge(['school_email' => $school_email]);

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:5',
            'phone' => [
                'required',
                'digits_between:9,15',
                Rule::unique('users')->ignore($id),
            ],
            'address' => 'required',
            'birthday' => 'nullable|date',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($id),
            ],
            'school_email_alias' => [
                'nullable',
                'regex:/^[a-zA-Z0-9._-]+$/',
            ],
            'school_email' => [
                'nullable',
                Rule::unique('users', 'school_email')
                    ->where(fn ($q) => $q->where('school_id', $this->app['school']->id))
                    ->ignore($id),
            ],
            'password' => 'nullable|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->toArray();
            if (isset($errors['school_email'])) {
                $errors['school_email_alias'] = $errors['school_email'];
                unset($errors['school_email']);
            }
            return response()->json([
                'status' => 'error',
                'errors' => $errors,
            ], 422);
        }

        $data = [
            'name' => $request->get('name'),
            'phone' => $request->get('phone'),
            'address' => $request->get('address'),
            'birthday' => $request->get('birthday'),
            'about' => $request->get('about'),
            'email' => $request->get('email'),
            'school_email' => $school_email,
            'user_name' => Str::slug($request->get('name'), '_'),
            'slug' => Str::slug($request->get('name')),
            'updated_at' => now(),
        ];

        if ($request->get('photo_id')) {
            $data['photo_id'] = $request->get('photo_id');
        }

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->get('password'));
        }

        DB::table('users')->where('id', $id)->update($data);

        return redirect()->route('profile.show')
            ->with('success', 'Cập nhật hồ sơ thành công!');
    }

    private function currentUser()
    {
        $user = DB::table('users')
            ->select('users.*')
            ->where('users.id', Auth::user()->id)
            ->whereNull('users.deleted_at')
            ->first();
        if ($user) $user->thumbnail_path = getThumbnailUrl($user->photo_id);
        return $user;
    }
}
