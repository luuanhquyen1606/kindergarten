<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LoadTheme
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $domain = $request->getHost(); 
      
        $school = DB::table('schools')
        ->join('themes','schools.theme_id','themes.id')
        ->where('schools.domain', $domain)
        ->select('schools.*','themes.name as theme_name')
        ->first();
        $theme= strtolower($school->theme_name ?? null);
        
        if(session()->has('theme_preview')){
            $theme_preview = session()->get('theme_preview');
            $theme = $theme_preview['theme'];
            $time = $theme_preview['time'];
        }

        $user = Auth::user();

        // Fallback theme
        if (!$theme) {
            $theme = 'default';
        }
        // Set theme globally (for Blade)
        config(['theme.active' => $theme]);

        // Register Blade namespace
        View::addNamespace('theme', resource_path("views/themes/$theme"));

        return $next($request); 
    }
}
