<?php

namespace Modules\Chat\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Entities\User;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    protected $with = ['participants'];

    protected static function newFactory()
    {
        return \Modules\Chat\Database\factories\ChatFactory::new ();
    }

    public function participants()
    {
        return $this->belongsToMany(User::class, ChatParticipant::class)
            ->withPivot('created_at');
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

}
