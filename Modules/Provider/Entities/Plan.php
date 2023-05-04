<?php

namespace Modules\Provider\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'logo',
        'price',
    ];

    protected static function newFactory()
    {
        return \Modules\Provider\Database\factories\PlanFactory::new ();
    }
}
