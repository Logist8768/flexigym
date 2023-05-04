<?php

namespace Modules\Coach\Actions;

use Illuminate\Http\File;
use Modules\Coach\Http\Requests\AddPostRequest;
use Modules\Coach\Traits\CoachTrait;

class AddPostAction
{
    use CoachTrait;

    public function __invoke(AddPostRequest $request)
    {
        $coach = $this->getAuthenticatedCoach();

        if ($request->file('cover_image')) {
            $fileName = time() . '_' . $request->file('cover_image')->getClientOriginalName();
            $filePath = $request->file('cover_image')->storeAs('covers', $fileName, 'public');
        }

        $coach->posts()->create([
            'cover_image' => $filePath,
            'title' => $request['title'],
            'description' => $request['description'],
            'video_link' => $request['video_link'],
        ]);

    }
}
