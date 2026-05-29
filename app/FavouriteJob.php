<?php

namespace App;

use App;
use Illuminate\Database\Eloquent\Model;

class FavouriteJob extends Model
{

    protected $table = 'favourites_job';
    public $timestamps = true;
    protected $guarded = ['id'];
    //protected $dateFormat = 'U';
    protected $casts = ['created_at' => 'datetime', 'updated_at' => 'datetime'];

}
