<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class NavigationsController extends BaseController
{
    public function index()    
    {  
        $parents = DB::table('navigations')
        ->whereNull('parent_id')
        ->whereNull('deleted_at')
        ->where('school_id', $this->app['school']->id)
        ->orderBy('sort')
        ->orderBy('created_at','desc')
        ->get();

        $children = DB::table('navigations')
        ->whereNotNull('parent_id')
        ->whereNull('deleted_at')
        ->where('school_id', $this->app['school']->id)
        ->orderBy('parent_id')
        ->orderBy('sort')
        ->get()
        ->groupBy('parent_id');

         $navigations = $parents->map(function ($parent) use ($children) {
            return [
                'id' => $parent->id,
                'name' => $parent->name,
                'routing_id' => $parent->routing_id,
                'children' => $children->get($parent->id, collect())->values(),
            ];
        });
      //  echo "<pre>";
       // print_r($navigations);
       // die();

        $data['navigations']=$navigations; 
        return view('admin.navigations.index',$data); 
    }  
    public function show($id)
    {
         $teacher = DB::table('users')
        ->where('school_id', $this->app['school']->id)
        ->where('id', $id) 
        ->first();
        $data['teacher']=$teacher; 
        return view('admin.navigations.show',$data);
    }
    public function edit($id){

         $navigation = DB::table('navigations')
        ->where('school_id', $this->app['school']->id)
        ->where('id', $id)
        ->first();
        $data['navigation']=$navigation;

        $parents = DB::table('navigations')
        ->whereNull('parent_id')
        ->whereNull('deleted_at')
        ->where('school_id', $this->app['school']->id)
        ->orderBy('sort')
        ->get();

        $data['parents']=$parents;

        $events = DB::table('events')
        ->whereNull('deleted_at')
        ->where('school_id', $this->app['school']->id)
        ->orderBy('created_at','desc')
        ->get();

        $data['events']=$events;

        $data['routings'] = DB::table('routings')
        ->where('school_id', $this->app['school']->id)
        ->whereIn('entity', ['pages','posts'])
        ->orderBy('entity')
        ->orderBy('title')
        ->get();

        $data['selected_routing_id'] = $navigation->routing_id;

        return view('admin.navigations.edit',$data);
    }
   
    public function update($id,Request $request){
         $validator = Validator::make($request->all(), [
        'name' => 'required|min:5',
        'routing_id' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }

     
        DB::table('navigations')
        ->where('id', $id)
        ->update([
                'name' => $request->get('name'),
                'routing_id'=> $request->get('routing_id'),
                'updated_at' => now(), 
        ]);




        return redirect()->route('navigations.show', $id)
                     ->with('success', 'Post created!');
    }
    public function create()
    {
        $parents = DB::table('navigations')
        ->whereNull('parent_id')
        ->whereNull('deleted_at')
        ->where('school_id', $this->app['school']->id)
        ->orderBy('sort')
        ->get();

        $data['parents']=$parents;

        $events = DB::table('events')
        ->whereNull('deleted_at')
        ->where('school_id', $this->app['school']->id)
        ->orderBy('created_at','desc')
        ->get();

        $data['events']=$events;

        $data['routings'] = DB::table('routings')
        ->where('school_id', $this->app['school']->id)
        ->whereIn('entity', ['pages','posts'])
        ->orderBy('entity')
        ->orderBy('title')
        ->get();


        return view('admin.navigations.create',$data);
    }
    public function store(Request $request){

        $validator = Validator::make($request->all(), [
        'name' => 'required|min:5',
        'routing_id' => 'required',
        ]);



        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }
  
     
        $navigation_id=DB::table('navigations')->insertGetId([
        'name' => $request->get('name'),
        'parent_id' => $request->get('parent_id'),
        'routing_id' => $request->get('routing_id'),
        'school_id'=>$this->app['school']->id,
        'created_at' => now(),
        'updated_at' => now(),
        ]);

         
       

     return redirect()->route('navigations.index')
                     ->with('success', 'Post created!');
    }
 
    public function destroy($id){ 
        DB::table('navigations')
        ->where('id', $id)
        ->where('school_id', $this->app['school']->id)
        ->update(['deleted_at' => now()]); 

            return redirect()->route('navigations.index')
                            ->with('success', 'Level deleted successfully.');
    }
    public function sort(Request $request){

       foreach ($request->get('sort') as $sort){
            DB::table('navigations')
            ->where('id', $sort['id'])
            ->where('school_id', $this->app['school']->id)
            ->update(['sort' => $sort['sort']]);
       }
    }
}


