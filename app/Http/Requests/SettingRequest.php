<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            "phoneNumber" => 'nullable|regex:/(01)[0-9]{9}/',
            "phoneNumber2" => 'nullable|min:11|regex:/(01)[0-9]{9}/',
            "facebook" => 'string|nullable',
            "websiteName" => 'string|nullable',
            "address" => 'string|nullable',
            "email" => 'string|email|nullable',
            "about" => 'string|nullable',
            "logo" => 'nullable|mimes:jpg,jpeg,png,svg',
            "smallLogo" => 'nullable|mimes:jpg,jpeg,png,svg',
        ];
    }
}
