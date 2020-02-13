<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostsStoreRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'rassumma' => 'required|max:3',
           'rasnomi' => 'required|string',
           'rasmesto' => 'required|string',
           'time' => 'required',
        ];
    }
}
