<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientRequest extends FormRequest
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
            'name' => 'required|max:255|unique:patients,name,'.$this->id,
            'email' => 'required|email|max:255|unique:patients,email,'.$this->id,
            'password' => 'required|string|min:8|max:100',
            'date_of_birth' => 'required|date',
            'phone' => 'required|numeric|unique:patients,phone,'.$this->id,
            'gender' => 'required|in:male,female',
            'blood_group' => 'required',
            'address' => 'required|string|min:8|max:255',
        ];
    }
}
