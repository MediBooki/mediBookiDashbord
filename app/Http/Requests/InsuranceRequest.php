<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InsuranceRequest extends FormRequest
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
            'name' => 'required|max:100|unique:insurances,name->ar,'.$this->id,
            'name_en' => 'required|max:100|unique:insurances,name->en,'.$this->id,
            'insurance_code' => 'required|string',
            'discount_percentage' => 'required|numeric',
            'company_rate' => 'required|numeric',
            'status' => 'between:0,1',
        ];
    }
}
