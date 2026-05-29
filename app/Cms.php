<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cms extends Model
{

    protected $table = 'cms';
    public $timestamps = true;
    protected $guarded = ['id'];
    //protected $dateFormat = 'U';
    protected $casts = ['created_at' => 'datetime', 'updated_at' => 'datetime'];

    public function cmsPages()
    {
        return $this->hasMany('App\CmsPages', 'page_id', 'id')
                        ->orderBy('lang', 'ASC');
    }

}
