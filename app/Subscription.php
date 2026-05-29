<?php

namespace App;

use App;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{


    protected $table = 'subscriptions';
    public $timestamps = true;
    protected $guarded = ['id'];
    //protected $dateFormat = 'U';
    protected $casts = ['created_at' => 'datetime', 'updated_at' => 'datetime'];

    
}
