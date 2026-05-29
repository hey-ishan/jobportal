<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserMessage extends Model
{

    protected $table = 'user_messages';
    public $timestamps = true;
    protected $guarded = ['id'];
    //protected $dateFormat = 'U';
    protected $casts = ['created_at' => 'datetime', 'updated_at' => 'datetime'];

}
