<?php

namespace App\Http\Middleware;

use Closure,
    Session;

class Locale
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Session::has('locale')) {
            app()->setLocale(Session::get('locale'));
        }
		else
		{
            try {
                if (null !== $lang = \App\Language::where('is_default', '=', 1)->first()) {
                    if ($lang !== null) {
                        app()->setLocale($lang->iso_code);
                        if((bool) $lang->is_rtl){					
                            session(['localeDir' => 'rtl']);
                        }else{
                            session(['localeDir' => 'ltr']);
                        }		
                    }
                }
            } catch (\Exception $e) {
                // Ignore missing table errors during database installation
            }			
		}
        return $next($request);
    }

}
