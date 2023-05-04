<?php

namespace Modules\User\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Modules\Chat\Entities\Chat;
use Modules\Chat\Entities\ChatParticipant;
use Modules\Chat\Entities\Message;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'name',
        'email',
        'password',
        'fcm_token',
        'phone',
        'type',
        'is_online',
        'is_active',
        'is_verified',
        'profile_completed',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function newFactory()
    {
        return \Modules\User\Database\factories\UserFactory::new ();
    }

    public function client()
    {
        return $this->hasOne(Client::class);
    }

    public function chats()
    {
        return $this->belongsToMany(Chat::class, ChatParticipant::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
    public function coach()
    {
        return $this->hasOne(Coach::class);
    }
}
