<?php

namespace Modules\User\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Coach\Entities\Post;
use Modules\Coach\Entities\Subscription;

class Coach extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'profession',
        'description',
        'gender',
    ];

    protected $with = ['user'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function clients()
    {
        return $this->belongsToMany(Client::class, 'subscriptions', 'client_id', 'coach_id')
            ->withPivot('start_date', 'end_date')
            ->withTimestamps();
    }

    public function subscribers()
    {
        return $this->hasManyThrough(Client::class, Subscription::class, 'coach_id', 'id', 'id', 'client_id');
    }

    protected static function newFactory()
    {
        return \Modules\User\Database\factories\CoachFactory::new();
    }
}
