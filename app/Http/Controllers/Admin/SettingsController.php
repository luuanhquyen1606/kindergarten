<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str; 
use Illuminate\Validation\Rule;

class SettingsController extends BaseController
{
    public function index()    
    {  
        $school = DB::table('schools') 
        ->join('themes','themes.id','schools.theme_id')
        ->where('schools.id', $this->app['school']->id)
        ->select("schools.*","themes.name as theme_name")
        ->first();     
        $data['school']=$school; 
        $themes = DB::table(table: 'themes')
        ->get();      
        $data['themes']=$themes; 
        $data['campuses'] = DB::table('campuses')
        ->where('school_id', $this->app['school']->id)
        ->whereNull('deleted_at')
        ->orderBy('name')
        ->get();
        return view('admin.settings.index',$data); 
    }  

    public function storeCampus(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:2|max:255',
            'address' => 'nullable|string|max:256',
            'phone' => 'nullable|string|max:100',
            'email' => 'nullable|email|max:100',
            'google_map' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
            ], 422);
        }

        DB::table('campuses')->insert([
            'school_id' => $this->app['school']->id,
            'name' => trim($request->input('name')),
            'address' => trim($request->input('address', '')),
            'phone' => trim($request->input('phone', '')),
            'email' => trim($request->input('email', '')),
            'google_map' => $request->input('google_map'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('settings.index')->with('success', 'Campus created successfully.');
    }

    public function updateCampus($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:2|max:255',
            'address' => 'nullable|string|max:256',
            'phone' => 'nullable|string|max:100',
            'email' => 'nullable|email|max:100',
            'google_map' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
            ], 422);
        }

        DB::table('campuses')
            ->where('id', $id)
            ->where('school_id', $this->app['school']->id)
            ->whereNull('deleted_at')
            ->update([
                'name' => trim($request->input('name')),
                'address' => trim($request->input('address', '')),
                'phone' => trim($request->input('phone', '')),
                'email' => trim($request->input('email', '')),
                'google_map' => $request->input('google_map'),
                'updated_at' => now(),
            ]);

        return redirect()->route('settings.index')->with('success', 'Campus updated successfully.');
    }
    public function show($id)
    {
         $teacher = DB::table('users')
        ->where('school_id', $this->app['school']->id)
        ->where('id', $id) 
        ->first();
        $data['teacher']=$teacher; 
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
                'p.id as permission_id', 'p.name as name','p.enable_by_default','p.resource','g.name as group_name','up.id as user_permission_id'
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
        return view('admin.teachers.edit',$data);
    }
    public function update($id,Request $request){

    // if update school information
        if($request->get('name')){
            $validator = Validator::make($request->all(), [
            'name' => 'required|min:5',
            'address' => 'required',
            'slogan' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'principal_name' => 'required',
            'principal_email' => 'required',
            'principal_phone' => 'required',
            ]); 
            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'errors' => $validator->errors()
                ], 422);
            }
        }


        $data = $request->only([
            'name',
            'address',
            'phone',
            'email',
            'slogan',
            'principal_name',
            'principal_email',
            'principal_phone',
            'map_embed',
        ]);

        $data['updated_at'] = now();

        DB::table('schools')
            ->where('id', $this->app['school']->id)
            ->update($data);
       

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
   
        return view('admin.teachers.create',$data);
    } 
    public function store(Request $request){

        $validator = Validator::make($request->all(), [
        'name' => 'required|min:5',
        'photo_id' => 'required', // example
        'phone' => 'required|digits_between:10,11|unique:users',
        'address'=> 'required',
        'email'=> 'required|email|unique:users',
        'password'=> 'required|min:8',
        'school_email' => [
                'required',
                Rule::unique('users', 'school_email')
                    ->where(fn ($q) =>
                        $q->where('school_id',$this->app['school']->id)
                    ),
            ]
        ]);

       

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }

        $user_id=DB::table('users')->insertGetId([
        'name' => $request->get('name'),
        'email' => $request->get('email'),
        'address' => $request->get('address'),
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


