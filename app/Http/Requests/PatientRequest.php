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
            'email' => 'required_without:id|email|max:255|unique:patients,email,'.$this->id,
            'password' => 'required_without:id|string|min:8|max:100',
            'date_of_birth' => 'required|date',
            'phone' => 'required|integer|min:5',
            'gender' => 'required_without:id|in:male,female',
            'blood_group' => 'required|min:2|max:3',
            'address' => 'required|string|min:8|max:255',
        ];
    }
}
