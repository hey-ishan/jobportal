<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{

    protected $table = 'seo';
    public $timestamps = true;
    protected $guarded = ['id'];
    //protected $dateFormat = 'U';
    protected $casts = ['created_at' => 'datetime', 'updated_at' => 'datetime'];

}
