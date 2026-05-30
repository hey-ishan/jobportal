<?php

namespace App;

use App;
use App\cms;
use App\Traits\Lang;
use App\Traits\Active;
use Illuminate\Database\Eloquent\Model;

class CmsContent extends Model
{

    use Lang;
    use Active;

    protected $table = 'cms_content';
    public $timestamps = true;
    protected $guarded = ['id'];
    //protected $dateFormat = 'U';
    protected $casts = ['created_at' => 'datetime', 'updated_at' => 'datetime'];

    public function page()
    {
        return $this->belongsTo('App\Cms', 'page_id', 'id');
    }

    public static function getContentByPageId($id)
    {
        $cmsContent = self::where('page_id', '=', $id)->where('lang', 'like', \App::getLocale())->first();
        if (null === $cmsContent) {
            $cmsContent = self::where('page_id', '=', $id)->first();
        }

        return $cmsContent;
    }

    public static function getContentBySlug($slug)
    {
        return \Cache::remember('cms_content_'.$slug.'_'.\App::getLocale(), 3600, function () use ($slug) {
            $cms = Cms::where('page_slug', 'like', $slug)->first();
            if (!$cms) return null;
            $cmsContent = self::where('page_id', '=', $cms->id)->where('lang', 'like', \App::getLocale())->first();
            if (null === $cmsContent) {
                $cmsContent = self::where('page_id', '=', $cms->id)->first();
            }
            return $cmsContent;
        });
    }

}
