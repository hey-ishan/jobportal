<?php

namespace App;

use App;
use Illuminate\Database\Eloquent\Model;

class FavouriteApplicant extends Model
{

    protected $table = 'favourite_applicants';
    public $timestamps = true;
    protected $guarded = ['id'];
    //protected $dateFormat = 'U';
    protected $casts = ['created_at' => 'datetime', 'updated_at' => 'datetime'];

}
