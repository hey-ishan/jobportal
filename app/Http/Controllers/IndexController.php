<?php

namespace App\Http\Controllers;

use App;
use App\Seo;
use App\Job;
use App\Company;
use App\FunctionalArea;
use App\Country;
use App\Video;
use App\Testimonial;
use App\Slider;
use App\Blog;
use Illuminate\Http\Request;
use Redirect;
use App\Traits\CompanyTrait;
use App\Traits\FunctionalAreaTrait;
use App\Traits\CityTrait;
use App\Traits\JobTrait;
use App\Traits\Active;
use App\Helpers\DataArrayHelper;

class IndexController extends Controller
{

    use CompanyTrait;
    use FunctionalAreaTrait;
    use CityTrait;
    use JobTrait;
    use Active;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $topCompanyIds = \Cache::remember('home_topCompanyIds', 3600, function () { return $this->getCompanyIdsAndNumJobs(16); });
        $topFunctionalAreaIds = \Cache::remember('home_topFunctionalAreaIds', 3600, function () { return $this->getFunctionalAreaIdsAndNumJobs(32); });
        $topIndustryIds = \Cache::remember('home_topIndustryIds', 3600, function () { return $this->getIndustryIdsFromCompanies(32); });
        $topCityIds = \Cache::remember('home_topCityIds', 3600, function () { return $this->getCityIdsAndNumJobs(32); });
        
        $featuredJobs = \Cache::remember('home_featuredJobs', 3600, function () { 
            return Job::active()->featured()->notExpire()->limit(12)->orderBy('id', 'desc')->get(); 
        });
        
        $latestJobs = \Cache::remember('home_latestJobs', 3600, function () { 
            return Job::active()->notExpire()->orderBy('id', 'desc')->limit(18)->get(); 
        });
        
        $locale = \App::getLocale();
        $blogs = \Cache::remember('home_blogs_'.$locale, 3600, function () use ($locale) { 
            return Blog::orderBy('id', 'desc')->where('lang', 'like', $locale)->limit(3)->get(); 
        });
        
        $video = \Cache::remember('home_video', 3600, function () { return Video::getVideo(); });
        $testimonials = \Cache::remember('home_testimonials', 3600, function () { return Testimonial::langTestimonials(); });

        $functionalAreas = \Cache::remember('home_functionalAreas', 3600, function () { return DataArrayHelper::langFunctionalAreasArray(); });
        $countries = \Cache::remember('home_countries', 3600, function () { return DataArrayHelper::langCountriesArray(); });
        $sliders = \Cache::remember('home_sliders', 3600, function () { return Slider::langSliders(); });

        $seo = \Cache::remember('home_seo', 3600, function () { 
            return SEO::where('seo.page_title', 'like', 'front_index_page')->first(); 
        });

        return view('welcome')
                        ->with('topCompanyIds', $topCompanyIds)
                        ->with('topFunctionalAreaIds', $topFunctionalAreaIds)
                        ->with('topCityIds', $topCityIds)
                        ->with('topIndustryIds', $topIndustryIds)
                        ->with('featuredJobs', $featuredJobs)
                        ->with('latestJobs', $latestJobs)
                        ->with('blogs', $blogs)
                        ->with('functionalAreas', $functionalAreas)
                        ->with('countries', $countries)
						->with('sliders', $sliders)
                        ->with('video', $video)
                        ->with('testimonials', $testimonials)
                        ->with('seo', $seo);
    }

    public function setLocale(Request $request)
    {
        $locale = $request->input('locale');
        $return_url = $request->input('return_url');
        $is_rtl = $request->input('is_rtl');
        $localeDir = ((bool) $is_rtl) ? 'rtl' : 'ltr';

        session(['locale' => $locale]);
        session(['localeDir' => $localeDir]);

        return Redirect::to($return_url);
    }

}
