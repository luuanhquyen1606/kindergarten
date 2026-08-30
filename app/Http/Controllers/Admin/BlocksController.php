<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class BlocksController extends BaseController
{
    public function index()    
    {  
        $pages = DB::table('pages')
        ->where('school_id', $this->app['school']->id)
        ->get();  
        $data['pages']=$pages; 
        return view('admin.pages.index',$data); 
    }  
    public function show($id)
    {
        $page = DB::table('pages') 
        ->where('school_id', $this->app['school']->id)
        ->where('id', $id) 
        ->first();
        $blocks = DB::table('blocks') 
        ->where('school_id', $this->app['school']->id)
        ->where('page_id', $id) 
        ->get(); 
        $data['page']=$page;  
        $data['blocks']=$blocks;  
        return view('admin.pages.show',$data);
    }
    public function edit($id){
        $page = DB::table('pages') 
        ->where('school_id', $this->app['school']->id)
        ->where('id', $id) 
        ->first();
        DB::table('blocks')
        ->where('school_id', $this->app['school']->id)
        ->where('page_id', $id) 
        ->update([
            'data_preview' => DB::raw('data')
        ]);
        $blocks = DB::table('blocks') 
        ->join('root_blocks','root_blocks.id','blocks.block_id')
        ->select('blocks.*', 'root_blocks.code as root_block_code')
        ->where('blocks.school_id', $this->app['school']->id)
        ->where('blocks.page_id', $id) 
        ->get(); 
        $data['page']=$page;  
        $data['blocks']=$blocks;  
        return view('admin.pages.edit',$data);
    }
    public function update($id,Request $request){
       
        
        DB::table('blocks')
        ->where('id', $id)
        ->update([
                'data_preview' => json_encode($request->get('data')),
                'updated_at' => now(),
        ]);

        if ($request->ajax()) {
        // It's an AJAX request
        return response()->json(['message' => 'success']);
        } else {
            // Normal form submission
            return redirect()->route('teachers.show', $id)
                     ->with('success', 'Post created!');
        }
        
    }
    public function create()
    {
        return view('admin.pages.create');
    } 
    public function store(Request $request){
        $validated = $request->validate([
        'name' => 'required',
        'email' => 'required',
        'phone' => 'required'
        ]);
        $post_id=DB::table('users')->insertGetId([
        'name' => $request->get('name'),
        'email' => $request->get('email'),
        'phone' => $validated['phone'],
        'school_id' => $this->app['school']->id,
        'password' => Hash::make($request->get('password')),
        'created_at' => now(),
        'updated_at' => now(),
    ]);
     return redirect()->route('teachers.show', $post_id)
                     ->with('success', 'Post created!');
    }

    public function destroy($id){
        DB::table('users')->where('id', $id)->delete();

            return redirect()->route('teachers.index')
                            ->with('success', 'Level deleted successfully.');
    }
}


