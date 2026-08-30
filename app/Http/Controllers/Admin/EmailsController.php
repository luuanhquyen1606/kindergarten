<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;  

class EmailsController extends BaseController
{ 
    public function index(Request $request)    
    { 
        $emails = DB::table('emails')
        ->where('school_id', $this->app['school']->id)
        ->where('user_id', $request->user()->id)
        ->get();
        $data['emails']=$emails; 
        return view('admin.emails.index',$data); 
    }  
    public function show(Request $request,$id)
    {
         $email = DB::table('emails')
        ->where('school_id', $this->app['school']->id)
        ->where('user_id', $request->user()->id)
        ->where('id', $id)
        ->first();
        $data['email']=$email; 
        return view('admin.emails.show',$data); 
    }
    public function edit($id){
        $level = DB::table('programs')
        ->where('school_id', $this->app['school']->id)
        ->where('id', $id)
        ->first();
        $data['level']=$level; 
        return view('admin.emails.edit',$data);
    }
    public function update($id,Request $request){
        $validated = $request->validate([
        'name' => 'required',
        'min_age' => 'required',
        'max_age' => 'required',
        'cost' => 'required'
        ]);
        DB::table('programs')
        ->where('id', $id)
        ->update([
            'name' => $validated['name'],
            'min_age' => $validated['min_age'],
            'max_age' => $validated['max_age'],
            'cost' => $validated['cost'],
            'age'=>$validated['min_age']." tháng -".$validated['max_age'].' tháng',
            'updated_at' => now(),
        ]);


        return redirect()->route('programs.show', $id)
                     ->with('success', 'Post created!');
    }
    public function create()
    {
        return view('admin.emails.create');
    } 
    public function store(Request $request){
        $validated = $request->validate([
        'name' => 'required',
        'min_age' => 'required',
        'max_age' => 'required',
        'cost' => 'required'
        ]);
        $post_id=DB::table('programs')->insertGetId([
        'name' => $validated['name'],
        'min_age' => $validated['min_age'],
        'max_age' => $validated['max_age'],
        'cost' => $validated['cost'],
        'school_id' => $this->app['school']->id,
        'age'=>$validated['min_age']." tháng -".$validated['max_age'].' tháng',
        'created_at' => now(),
        'updated_at' => now(),
    ]);
     return redirect()->route('programs.show', $post_id)
                     ->with('success', 'Post created!');
    }

    public function destroy($id){
        DB::table('programs')->where('id', $id)->delete();

            return redirect()->route('programs.index')
                            ->with('success', 'Level deleted successfully.');
    }
}


