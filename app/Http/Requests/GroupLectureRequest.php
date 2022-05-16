<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GroupLectureRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'group_id' => 'required | exists:groups,id',
            'lecture_id' => 'required | exists:lectures,id',
            'day' => 'required | integer | between:1,31',
            'hour' => 'required | integer | between:9,17',
        ];
    }
}
