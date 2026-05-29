<?php

namespace App;

use App\Traits\CountryStateCity;
use Illuminate\Database\Eloquent\Model;

class ProfileExperience extends Model
{

    use CountryStateCity;

    protected $table = 'profile_experiences';
    public $timestamps = true;
    protected $guarded = ['id'];
    //protected $dateFormat = 'U';
    protected $casts = ['created_at' => 'datetime', 'updated_at' => 'datetime', 'date_start' => 'datetime', 'date_end' => 'datetime'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function getUser($field = '')
    {
        if (null !== $user = $this->user()->first()) {
            if (empty($field))
                return $user;
            else
                return $user->$field;
        } else {
            return '';
        }
    }

}
