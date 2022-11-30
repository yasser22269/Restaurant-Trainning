<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'name'          => 'required|string',
            'email'         => 'required|unique:employees,email'.$this->id,
            'phone'         => 'required|unique:employees,phone'.$this->id,
            'nid'           => 'required|unique:employees,nid'.$this->id,
            'password'      => 'required',
            'salary'        => 'required',
            'start_date'    => 'required|date',
            'position'      => 'required|string',
            'office'        => 'required|string',
            'status'        => 'required'
            //role_id
        ];
    }
}
