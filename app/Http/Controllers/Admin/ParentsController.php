<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ParentsController extends BaseController
{
    public function index()
    {
        $parents = DB::table('parents')
        ->where('school_id', $this->app['school']->id)
        ->whereNull('deleted_at')
        ->orderBy('created_at', 'desc')
        ->get();
        $data['parents']=$parents;
        return view('admin.parents.index',$data);
    }
    public function show($id)
    {
        $parent = DB::table('parents')
        ->where('school_id', $this->app['school']->id)
        ->where('id', $id)
        ->first();
        $data['parent']=$parent;
        return view('admin.parents.show',$data);
    }
    public function create()
    {
        return view('admin.parents.create');
    }
    public function store(Request $request){

        $validator = Validator::make($request->all(), [
        'name' => 'required|min:2',
        'phone' => 'nullable|digits_between:9,15',
        'email' => 'nullable|email|unique:parents',
        'gender' => 'required|in:male,female',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }

        $post_id=DB::table('parents')->insertGetId([
        'name' => $request->get('name'),
        'phone' => $request->get('phone'),
        'email' => $request->get('email') ?: null,
        'gender' => $request->get('gender'),
        'school_id' => $this->app['school']->id,
        'created_at' => now(),
        'updated_at' => now(),
        ]);

        return redirect()->route('parents.index')
                     ->with('success', 'Đã thêm phụ huynh!');
    }
    public function edit($id){
        $parent = DB::table('parents')
        ->where('school_id', $this->app['school']->id)
        ->where('id', $id)
        ->first();
        if (!$parent) {
            abort(404);
        }
        $data['parent']=$parent;
        return view('admin.parents.edit',$data);
    }
    public function update($id,Request $request){

        $validator = Validator::make($request->all(), [
        'name' => 'required|min:2',
        'phone' => 'nullable|digits_between:9,15',
        'email' => [
            'nullable',
            'email',
            Rule::unique('parents')->ignore($id),
        ],
        'gender' => 'required|in:male,female',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }

        DB::table('parents')
        ->where('id', $id)
        ->where('school_id', $this->app['school']->id)
        ->update([
                'name' => $request->get('name'),
                'phone' => $request->get('phone'),
                'email' => $request->get('email') ?: null,
                'gender' => $request->get('gender'),
                'updated_at' => now(),
        ]);

        return redirect()->route('parents.index')
                     ->with('success', 'Đã cập nhật phụ huynh!');
    }

    public function destroy($id){
        DB::table('parents')
        ->where('id', $id)
        ->where('school_id', $this->app['school']->id)
        ->update(['deleted_at' => now()]);

        return redirect()->route('parents.index')
                        ->with('success', 'Đã xóa phụ huynh.');
    }
}
