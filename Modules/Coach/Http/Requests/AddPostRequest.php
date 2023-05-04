<?php

namespace Modules\Coach\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddPostRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'coach_id' => 'required|exists:coaches,id',
            'title' => 'required',
            'description' => 'required',
            'video_link' => 'required',
            'cover_image' => 'required|image:jpeg,png,jpg,gif,svg',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
