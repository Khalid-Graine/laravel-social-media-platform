<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    //  rules for inputes
    public function rules(): array
    {
        return [
            'title' => 'nullable',
            'content' => 'required',
            'image' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'title.min' => 'The title must be at least :min characters.',
            'content.required' => 'The content field is required.',
            'content.min' => 'The content must be at least :min characters.',
        ];
    }
}
