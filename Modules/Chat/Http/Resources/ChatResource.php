<?php

namespace Modules\Chat\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ChatResource extends JsonResource
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
            'created_at' => $this->created_at->diffForHumans(),
            'participants' => $this->participants,
            'latest_message' => $this->whenLoaded('messages', function () {
                return $this->messages->first()->message;
            }),
        ];
    }
}
