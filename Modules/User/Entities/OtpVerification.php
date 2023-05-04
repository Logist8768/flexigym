<?php

namespace Modules\User\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtpVerification extends Model
{
    use HasFactory;

    protected $table    = 'otp_verifications';
    protected $fillable = [
        'code',
        'status',
        'expires_at',
        'phone',
    ];

    public function store($request)
    {
        $this->fill($request->all());
        $sms = $this->save();

        return response()->json($sms, 200);
    }

    public function updateModel($request)
    {
        $this->update($request->all());

        return $this;
    }

    protected static function newFactory()
    {
        return \Modules\User\Database\factories\OtpVerificationFactory::new();
    }
}
