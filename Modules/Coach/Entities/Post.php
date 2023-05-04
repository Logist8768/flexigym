<?php

namespace Modules\Coach\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Entities\Coach;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'coach_id',
        'title',
        'description',
        'video_link',
        'cover_image',
    ];

    protected static function newFactory()
    {
        return \Modules\Coach\Database\factories\PostFactory::new ();
    }

    public function coach()
    {
        return $this->belongsTo(Coach::class);
    }
}
