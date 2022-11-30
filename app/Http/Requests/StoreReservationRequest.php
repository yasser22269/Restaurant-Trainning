<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReservationRequest extends FormRequest
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
            "customer_phone" => 'required|regex:/(01)[0-9]{9}/',
            "customer_name" => 'required',
            "scheduleDate" => 'required|date',
            "startTime" => 'required|date_format:H:i',
            "endTime" => 'nullable|date_format:H:i|after:startTime',
            'table_id' => 'numeric|exists:tables,id',
        ];
    }
}
