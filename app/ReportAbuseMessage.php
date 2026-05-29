<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportAbuseMessage extends Model
{

    protected $table = 'report_abuse_messages';
    public $timestamps = true;
    protected $guarded = ['id'];
    //protected $dateFormat = 'U';
    protected $casts = ['created_at' => 'datetime', 'updated_at' => 'datetime'];

}
