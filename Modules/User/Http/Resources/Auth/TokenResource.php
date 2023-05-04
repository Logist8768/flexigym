<?php

namespace Modules\User\Http\Resources\Auth;

use Illuminate\Http\Resources\Json\JsonResource;

class TokenResource extends JsonResource
{
    protected $token;

    public function token($value)
    {
        $this->token = $value;

        return $this;
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @param mixed $request
     */
    public function toArray($request): array
    {
        return [
            'token' => $this->token,
            'type'  => 'Bearer',
        ];
    }
}
