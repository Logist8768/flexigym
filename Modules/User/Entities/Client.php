<?php

namespace Modules\User\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'city',
        'gender',
        'age',
    ];

    protected static function newFactory()
    {
        return \Modules\User\Database\factories\ClientFactory::new ();
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function coaches()
    {
        return $this->belongsToMany(Coach::class, 'subscriptions', 'coach_id', 'client_id')
            ->withPivot('start_date', 'end_date')
            ->withTimestamps();
    }
}
