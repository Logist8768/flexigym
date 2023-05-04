<?php

namespace Modules\User\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'verification_code',
        'city',
        'club_name',
        'category',
        'address',
    ];

    protected static function newFactory()
    {
        return \Modules\User\Database\factories\ProviderFactory::new();
    }
}
