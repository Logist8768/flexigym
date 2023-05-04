<?php

namespace Modules\Coach\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'video_link' => $this->video_link,
            'cover_image' => asset($this->cover_image),
            'coach_name' => $this->name,
            'coach_profession' => $this->profession,
            'coach_gender' => $this->gender,
        ];
    }
}
