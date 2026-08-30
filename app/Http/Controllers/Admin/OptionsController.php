<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class OptionsController extends BaseController
{
    public function index()    
    {  

        $options = DB::table('options')
        ->where('options.school_id',$this->app['school']->id)
        ->get();
        $data['options']= $options;

        return view('admin.options.index',$data); 
    }  
  

    public function create(Request $request)
    {
       

  
$data=[];
        return view('admin.options.create',$data);
    } 
    public function store(Request $request){
        $options = DB::table('options')->get();

        foreach ($options as $option) {
            if ($request->has($option->key)) {
                DB::table('options')
                    ->where('id', $option->id)
                    ->update([
                        'data' => $request->input($option->key),
                        'updated_at' => now(),
                    ]);
            }
        }

        return response()->json(['status' => 'success']);
    }
 
    
}


