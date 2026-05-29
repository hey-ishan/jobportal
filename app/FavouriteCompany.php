<?php

namespace App;

use App;
use Illuminate\Database\Eloquent\Model;

class FavouriteCompany extends Model
{

    protected $table = 'favourites_company';
    public $timestamps = true;
    protected $guarded = ['id'];
    //protected $dateFormat = 'U';
    protected $casts = ['created_at' => 'datetime', 'updated_at' => 'datetime'];

}
