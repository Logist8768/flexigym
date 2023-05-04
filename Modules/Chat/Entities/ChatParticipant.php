<?php

namespace Modules\Chat\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatParticipant extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'chat_id',
    ];

    protected static function newFactory()
    {
        return \Modules\Chat\Database\factories\ChatParticipantFactory::new ();
    }

}
