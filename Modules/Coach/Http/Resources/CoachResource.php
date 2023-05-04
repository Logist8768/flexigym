<?php

namespace Modules\Coach\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CoachResource extends JsonResource
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
            'name' => $this->name,
            'profession' => $this->profession,
            'description' => $this->description,
            'gender' => $this->gender,
            'email' => $this->email,
            'phone' => $this->phone,
        ];
    }
}
