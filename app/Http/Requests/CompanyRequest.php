<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CompanyRequest extends FormRequest
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
            'rfc' => ['required', 'max:13', Rule::unique('companies')->ignore($this->company)],
            'business_name' => 'required|string|max:150',
            'country' => 'required|string|max:75',
            'state' => 'required|string|max:75',
            'city' => 'required|string|max:75',
            'neighborhood' => 'required|string|max:75',
            'address' => 'required|string|max:100',
            'postal_code' => 'required|string|max:5',
            'cfdi' => 'required|string|max:45',
            'rfc_url' => 'required|string|max:255',
            'acta_url' => 'required|string|max:255',
            'status' => 'required|boolean',
            'comments' => 'nullable|string|max:comments',

            'corporation_id' => 'required|integer|exists:corporations,id',
        ];
    }
}
