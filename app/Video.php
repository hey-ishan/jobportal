<?php

namespace App;

use App;
use App\Video;
use App\Traits\Lang;
use App\Traits\IsDefault;
use App\Traits\Active;
use App\Traits\Sorted;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{

    use Lang;
    use IsDefault;
    use Active;
    use Sorted;

    protected $table = 'videos';
    public $timestamps = true;
    protected $guarded = ['id'];
    //protected $dateFormat = 'U';
    protected $casts = ['created_at' => 'datetime', 'updated_at' => 'datetime'];

    public static function getVideo($field = '')
    {
        $video = Video::active()->lang()->first();
        if (null === $video) {
            $video = Video::active()->first();
        }
        if (null !== $video) {
            if (!empty($field))
                return $video->$field;
            else
                return $video;
        }
    }

}
