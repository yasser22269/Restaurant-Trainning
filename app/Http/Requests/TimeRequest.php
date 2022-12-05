<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TimeRequest extends FormRequest
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
            'emp_id' => ['required' , Rule::unique('time_emps', 'emp_id')->ignore($this->timeemp)],
            'start_at' => 'required',
            'end_at' => 'required',
        ];
    }
    public function messages()
{
    return [
        'emp_id.unique' => 'Employee is selected',
    ];
}
}
