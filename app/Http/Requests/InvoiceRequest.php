<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceRequest extends FormRequest
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
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'type' => 'required|between:1,2',
            'service_id' => 'required|exists:services,id',
            'price' => 'required|numeric',
            'discount_value' => 'required|numeric',
            'tax_rate' => 'required|numeric',
            'tax_value' => 'required|numeric',
            'total_with_tax' => 'required|numeric',
        ];
    }
}
