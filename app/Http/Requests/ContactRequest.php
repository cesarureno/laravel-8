<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'position' => 'required|max:45',
            'comments' => 'required|max:255',
            'phone_number' => 'required|max:12',
            'mobile_phone_number' => 'required|max:12',
            'email' => 'required|email|max:45',
            'corporation_id' => 'required|integer|exists:corporations,id',
        ];
    }
}
