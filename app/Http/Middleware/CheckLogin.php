<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckLogin
{
    public function handle($request, Closure $next)
    {
        $domain = $request->getHost();   
        $school = DB::table('schools')
        ->where('domain', $domain)
        ->first();
        $this->app = [
            'school' => $school
        ];
       
        // If not logged in
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        else{
            


            $user = Auth::user();
            $routeName = $request->route()->getName(); 
           
            if($request->route()->uri()!='admin')
            {
                $className = explode(".",$routeName)[0];
                $method = explode(".",$routeName)[1];

                // Every logged-in user manages their own profile regardless of assigned permissions.
                if($className === 'profile'){
                    return $next($request);
                }

                $has_permission = DB::table('users_permissions')
                ->join("permissions","permissions.id","users_permissions.permission_id")
                ->where('school_id', $school->id)
                ->where('user_id', $user->id)
                ->where('user_id', $user->id)
                ->where('permissions.resource', $className)
                ->first();
                if(!$has_permission){
                   // return redirect('/admin/login/permission_denied'); 
              //      return view('admin.errors.permission_denied');  
                    $response = response()->view('admin.errors.permission_denied');
                    return $response->withCookie(cookie('permission_denied', ''));
                }
            }

            
        }

        // Continue the request
        return $next($request);
    }
}
