<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CorporationRequest extends FormRequest
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
            'business_name' => 'required|max:75',
            'db_name' => 'required|max:45',
            'db_user' => 'required|max:45',
            'db_password' => 'required|max:150',
            'system_url' => 'required|max:255',
            'status' => 'required|boolean',
            'registered_at' => 'required|date',
            'user_id' => 'required|integer|exists:users,id',
        ];
    }
}
