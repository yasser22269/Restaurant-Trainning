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
            "phoneNumber" => 'required|regex:/(01)[0-9]{9}/',
            "phoneNumber2" => 'required|min:11|regex:/(01)[0-9]{9}/',
            "whatsapp" => 'required|min:11|regex:/(01)[0-9]{9}/',
            "facebook" => 'required|string',
            "websiteName" => 'required|string',
            "address" => 'required|string',
            "email" => 'required|string|email',
        ];
    }
}
