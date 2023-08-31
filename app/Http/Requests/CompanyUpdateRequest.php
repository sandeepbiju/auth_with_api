<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'email' => 'nullable|email|unique:companies,email,' . $this->company->id,
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming logo is an image file
            'website' => 'nullable|url',
        ];
    }
}
