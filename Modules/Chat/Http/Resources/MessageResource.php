<?php

namespace Modules\Chat\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
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
            'user_id' => $this->user_id,
            'message' => $this->message,
            'read' => $this->read,
            'created_at' =>$this->created_at->diffForHumans(),
        ];
    }
}
