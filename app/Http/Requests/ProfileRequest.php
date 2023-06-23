<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
{
    $profileId = $this->route('profile');

    return [
        'name' => 'required',
        'email' => [
            'required',
            Rule::unique('profiles')->ignore($profileId),
        ],
        'bio' => 'required',
        'password' => 'required|min:6',
        'password_confirmation' => 'required|same:password',
        'image' => 'required'
    ];
}

}
