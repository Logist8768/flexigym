<?php

namespace Modules\User\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'label',
        'details',
        'contact_name',
        'contact_mobile',
        'latitude',
        'longitude',
        'is_default',
    ];

    
    protected static function newFactory()
    {
        return \Modules\User\Database\factories\AddressFactory::new ();
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
