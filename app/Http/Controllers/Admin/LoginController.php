<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;  
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class LoginController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        if(Auth::user()){
            return redirect()->intended('/admin/teachers');
        }
        return view('admin.login.login');    
    }

    // Handle login
    public function login(Request $request)
    {
        
        $user  = DB::table('users')
        ->where('phone',$request->phone)
        ->first();
        if (!$user) {
            die("a");
        return back()->withErrors(['phone' => 'Số điện thoại không tồn tại']);
        }
 
        if (!Hash::check($request->password, $user->password)) {
            die("b");
        return back()->withErrors(['password' => 'Incorrect password.']);
        }
        $user = User::where('phone', $request->phone)->first();
        
        Auth::login($user);
        $request->session()->regenerate();     

       
            // 5. Regenerate session for safety
        
            // 6. Redirect after login
        return redirect()->intended('/admin'); 
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }
    public function permission_denied(){
        die("You have no permission to access this page");
    }
}
