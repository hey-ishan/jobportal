<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicantMessage extends Model
{

    protected $table = 'applicant_messages';
    public $timestamps = true;
    protected $guarded = ['id'];
    //protected $dateFormat = 'U';
    protected $casts = ['created_at' => 'datetime', 'updated_at' => 'datetime'];

}
