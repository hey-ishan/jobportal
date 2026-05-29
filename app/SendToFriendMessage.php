<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SendToFriendMessage extends Model
{

    protected $table = 'send_to_friend_messages';
    public $timestamps = true;
    protected $guarded = ['id'];
    //protected $dateFormat = 'U';
    protected $casts = ['created_at' => 'datetime', 'updated_at' => 'datetime'];

}
