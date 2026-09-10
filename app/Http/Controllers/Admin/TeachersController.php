<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class TeachersController extends BaseController
{
    public function index()    
    {  
         $teachers = DB::table('users')
        ->select('users.*')
        ->where('users.school_id', $this->app['school']->id)
        ->whereNull('users.deleted_at')
        ->orderBy('users.created_at', 'desc')
        ->get();
        $teachers->each(fn($teacher) => $teacher->thumbnail_path = getThumbnailUrl($teacher->photo_id));
        $data['teachers']=$teachers;
        return view('admin.teachers.index',$data); 
    }  
    public function show($id)
    {
         $teacher = DB::table('users')
        ->leftJoin('campuses','campuses.id','users.campus_id')
        ->select('users.*', 'campuses.name as campus_name')
        ->where('users.school_id', $this->app['school']->id)
        ->whereNull('users.deleted_at')
        ->where('users.id', $id)
        ->first();
        if ($teacher) $teacher->thumbnail_path = getThumbnailUrl($teacher->photo_id);
        $data['teacher']=$teacher;

        $rows = DB::table('users_permissions as up')
            ->join('permissions as p', 'p.id', '=', 'up.permission_id')
            ->leftJoin('permission_groups as g', 'g.id', '=', 'p.permission_group_id')
            ->select('g.id as group_id', 'g.name as group_name', 'g.description as group_description', 'p.name as permission_name')
            ->where('up.user_id', $id)
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

        $classes = DB::table('classes')
        ->leftJoin('programs', 'programs.id', 'classes.program_id')
        ->select('classes.*', 'programs.name as program_name')
        ->where('classes.teacher_id', $id)
        ->where('classes.school_id', $this->app['school']->id)
        ->whereNull('classes.deleted_at')
        ->orderBy('classes.name')
        ->get();
        $data['classes'] = $classes;

        return view('admin.teachers.show',$data);
    }
    public function edit($id){
        
        $rows = DB::table('permission_groups as g')
            ->leftJoin('permissions as p', function ($join) {
                $join->on('p.permission_group_id', '=', 'g.id')
                    ->where('p.show', 1);
            })
            ->leftJoin('users_permissions as up', function ($join) use ($id) {
                $join->on('up.permission_id', '=', 'p.id')
                ->where('up.user_id', $id);
            })
            ->select(
                'g.id', 'g.name', 'g.description',
                'p.id as permission_id', 'p.name as permission_name','p.enable_by_default','p.resource','g.name as group_name','up.id as user_permission_id'
            )
            ->orderBy('g.name')
            ->get();

        $permission_groups = $rows->groupBy('id')->map(function ($items) {
            $group = $items->first();

            return [
                'id' => $group->id,
                'group_name' => $group->group_name,
                'description' => $group->description,
                'permissions' => $items->filter(fn($i) => $i->permission_id)->values(),
            ];
        });
       
        $data['permission_groups']=$permission_groups;


        $teacher = DB::table('users')
        ->select('users.*')
        ->where('users.school_id', $this->app['school']->id)
        ->whereNull('users.deleted_at')
        ->orderBy('users.created_at', 'desc')
        ->where('users.id', $id)
        ->first();
        if ($teacher) $teacher->thumbnail_path = getThumbnailUrl($teacher->photo_id);
        $data['teacher']=$teacher;

        $campuses = DB::table('campuses')
        ->where('school_id', $this->app['school']->id)
        ->whereNull('deleted_at')
        ->orderBy('name')
        ->get();
        $data['campuses']=$campuses;

        return view('admin.teachers.edit',$data);
    }
    public function update($id,Request $request){
        $school_email = $request->get('school_email_alias')
            ? $request->get('school_email_alias') . '@' . $this->app['school']->domain
            : null;
        $request->merge(['school_email' => $school_email]);

         $validator = Validator::make($request->all(), [
        'name' => 'required|min:5',
        'photo_id' => 'required', // example
        'phone' => [
            'required',
            'digits_between:9,15',
            Rule::unique('users')->ignore($id),
        ],
        'address'=> 'required',
        'birthday' => 'nullable|date',
        'campus_id' => 'nullable|exists:campuses,id',
        'email' => [
            'required',
            'email',
            Rule::unique('users')->ignore($id),
        ],
       // 'password'=> 'required|min:8',
        'school_email_alias' => [
            'nullable',
            'regex:/^[a-zA-Z0-9._-]+$/',
        ],
        'school_email' => [
            'nullable',
            Rule::unique('users', 'school_email')
                ->where(fn ($q) =>
                    $q->where('school_id',$this->app['school']->id)
                )
                ->ignore($id),
        ],
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors()->toArray();
            if (isset($errors['school_email'])) {
                $errors['school_email_alias'] = $errors['school_email'];
                unset($errors['school_email']);
            }
            return response()->json([
                'status' => 'error',
                'errors' => $errors
            ], 422);
        }

        DB::table('users')
        ->where('id', $id)
        ->update([
                'name' => $request->get('name'),
                'photo_id' => $request->get('photo_id'),
                'phone' => $request->get('phone'),
                'address'=> $request->get('address'),
                'birthday'=> $request->get('birthday'),
                'campus_id' => $request->get('campus_id') ?: null,
                'about'=> $request->get('about'),
                'email'=> $request->get('email'),
                'school_email'=> $school_email,
                'updated_at' => now(),
        ]);

        DB::table('users')
        ->where('id', $id)
        ->update([
                'slug' => Str::slug($request->get('name'), '_'),
                'updated_at' => now(),
        ]);
        DB::table('users')
        ->where('id', $id)
        ->update([
                'user_name' => Str::slug($request->get('name'), '_'),
                'updated_at' => now(),
        ]);

        if($request->get('permissions'))
        {
            foreach($request->get('permissions') as $permission){
                if($permission)
                {
                    DB::table('users_permissions')->insertOrIgnore([
                        'user_id' => $id,
                        'permission_id' => $permission,
                        'school_id'=>$this->app['school']->id,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            };
            $permissionIds = collect($request->get('permissions', []))
            ->filter()        // remove null / false
            ->unique()
            ->values();
            DB::table('users_permissions')
            ->where('user_id', $id)
            ->where('school_id', $this->app['school']->id)
            ->whereNotIn('permission_id', $permissionIds)
            ->delete();
        }
       

        return redirect()->route('teachers.show', $id)
                     ->with('success', 'Post created!');
    }
    public function create()
    {
        $rows = DB::table('permission_groups as g')
            ->leftJoin('permissions as p', function ($join) {
                $join->on('p.permission_group_id', '=', 'g.id')
                    ->where('p.show', 1);
            })
            ->select(
                'g.id', 'g.name', 'g.description',
                'p.id as permission_id', 'p.name as permission_name','p.enable_by_default','p.resource'
            )
            ->orderBy('g.name')
            ->get();

        $permission_groups = $rows->groupBy('id')->map(function ($items) {
            $group = $items->first();

            return [
                'id' => $group->id,
                'name' => $group->name,
                'description' => $group->description,
                'permissions' => $items->filter(fn($i) => $i->permission_id)->values(),
            ];
        });

        $data['permission_groups']=$permission_groups;
        $data['password']=Str::random(8);;

        $campuses = DB::table('campuses')
        ->where('school_id', $this->app['school']->id)
        ->whereNull('deleted_at')
        ->orderBy('name')
        ->get();
        $data['campuses']=$campuses;

        return view('admin.teachers.create',$data);
    } 
    public function store(Request $request){
        $school_email = $request->get('school_email_alias')
            ? $request->get('school_email_alias') . '@' . $this->app['school']->domain
            : null;
        $request->merge(['school_email' => $school_email]);

        $validator = Validator::make($request->all(), [
        'name' => 'required|min:5',
        'photo_id' => 'required', // example
        'phone' => 'required|digits_between:10,11|unique:users',
        'address'=> 'required',
        'birthday' => 'nullable|date',
        'campus_id' => 'nullable|exists:campuses,id',
        'email'=> 'required|email|unique:users',
        'password'=> 'required|min:8',
        'school_email_alias' => [
            'nullable',
            'regex:/^[a-zA-Z0-9._-]+$/',
        ],
        'school_email' => [
                'nullable',
                Rule::unique('users', 'school_email')
                    ->where(fn ($q) =>
                        $q->where('school_id',$this->app['school']->id)
                    ),
            ],
        ]);



        if ($validator->fails()) {
            $errors = $validator->errors()->toArray();
            if (isset($errors['school_email'])) {
                $errors['school_email_alias'] = $errors['school_email'];
                unset($errors['school_email']);
            }
            return response()->json([
                'status' => 'error',
                'errors' => $errors
            ], 422);
        }

        $user_id=DB::table('users')->insertGetId([
        'name' => $request->get('name'),
        'email' => $request->get('email'),
        'address' => $request->get('address'),
        'birthday' => $request->get('birthday'),
        'campus_id' => $request->get('campus_id') ?: null,
        'phone' => $request->get('phone'),
        'photo_id' => $request->get('photo_id'),
        'school_email' => $request->get('school_email'),
        'school_id' => $this->app['school']->id,
        'password' => Hash::make($request->get('password')),
        'created_at' => now(),
        'updated_at' => now(), 
        ]);

         DB::table('users')
        ->where('id', $user_id)
        ->update(['slug' => Str::slug($request->get('name'))]);

         DB::table('users')
        ->where('id', $user_id)
        ->update([
                'user_name' => Str::slug($request->get('name'), '_'),
                'updated_at' => now(),
        ]);
        if($request->get('permissions'))
        {
            foreach($request->get('permissions') as $permission){
                if($permission)
                {
                    DB::table('users_permissions')->insertOrIgnore([
                        'user_id' => $user_id,
                        'permission_id' => $permission,
                        'school_id'=>$this->app['school']->id,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            };
        }
       

     return redirect()->route('teachers.index')
                     ->with('success', 'Post created!');
    }
 
    public function destroy($id){
        DB::table('users')
        ->where('id', $id)
        ->where('school_id', $this->app['school']->id)
        ->update(['deleted_at' => now()]);

            return redirect()->route('teachers.index')
                            ->with('success', 'Level deleted successfully.');
    }
}


