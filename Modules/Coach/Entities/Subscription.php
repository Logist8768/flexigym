<?php

namespace Modules\Coach\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Entities\Client;
use Modules\User\Entities\Coach;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'coach_id',
        'client_id',
        'payment_method_id',
        'transaction_id',
        'status',
        'strat_date',
        'end_date',
    ];

    protected static function newFactory()
    {
        return \Modules\Coach\Database\factories\SubscriptionFactory::new();
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function coach()
    {
        return $this->belongsTo(Coach::class);
    }
}
