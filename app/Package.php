<?php

namespace App;

use App;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{

    protected $table = 'packages';
    public $timestamps = true;
    protected $guarded = ['id'];
    //protected $dateFormat = 'U';
    protected $casts = ['created_at' => 'datetime', 'updated_at' => 'datetime'];

}
