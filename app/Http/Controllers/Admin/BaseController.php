<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;  

use Illuminate\Routing\Controller as Controller;

class BaseController extends Controller
{
    protected $app;

    public function __construct(Request $request)
    {
        $domain = $request->getHost();   
        $school = DB::table('schools')
        ->where('domain', $domain)
        ->first();
        
        $this->app = [
            'school' => $school
        ];
    }
}
