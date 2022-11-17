<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            "name" => 'required|string|max:100',
            "description" => 'required|string',
            'category_id' => 'numeric|exists:categories,id',
            'price' => 'required|min:0|numeric',
            "picture" =>  'mimes:jpg,jpeg,png',
            'option' => 'array', //[]
            'option.*.attribute_id' => 'numeric|exists:attributes,id',
            'option.*.name' => 'required|string|max:100',
            'option.*.price' => 'required|min:0|numeric',
        ];
    }
}
