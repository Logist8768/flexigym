<?php

namespace Modules\Coach\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Entities\Client;
use Modules\User\Entities\Coach;

class CoachRating extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'coach_id',
        'rate',
        'comments',
    ];

    public function coach()
    {
        return $this->belongsTo(Coach::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    protected static function newFactory()
    {
        return \Modules\Coach\Database\factories\CoachRatingFactory::new ();
    }
}
