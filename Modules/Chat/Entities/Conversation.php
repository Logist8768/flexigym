<?php

namespace Modules\Chat\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'second_user_id',
    ];

    protected static function newFactory()
    {
        return \Modules\Chat\Database\factories\ConversationFactory::new ();
    }
}
