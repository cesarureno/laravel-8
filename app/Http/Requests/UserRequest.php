<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
            'name' => 'required|max:45',
            'lastname' => 'required|max:45',
            'email' => ['required', 'email', 'max:45', Rule::unique('users')->ignore($this->user)],
            'password' => 'required|min:6|max:100',
            'username' => ['required', 'max:45', Rule::unique('users')->ignore($this->user)],
            'status' => 'required|boolean',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'role_id' => ['required', 'integer', Rule::in([1, 2, 3])],
        ];
    }
}
