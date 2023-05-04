<?php

namespace Modules\User\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'fcm_token' => $this->fcm_token,
            'phone' => $this->phone,
            'type' => $this->type,
            'is_online' => $this->is_online,
            'is_active' => $this->is_active,
        ];
    }
}
