<?php

namespace Modules\Chat\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'chat_id',
        'message',
        'read',
    ];

    protected $touches = ['chat'];

    protected static function newFactory()
    {
        return \Modules\Chat\Database\factories\MessageFactory::new ();
    }

    // public function getCreatedAtAttribute()
    // {
    //     return Carbon::parse($this->attributes['created_at'])->diffForHumans();
    // }

    public function chat()
    {
        return $this->belongsTo(Chat::class);
    }
}
