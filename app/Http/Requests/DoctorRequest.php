<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
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
            'name' => 'required_without:id|max:100|unique:doctors,name->ar,'.$this->id,
            'name_en' => 'required_without:id|max:100|unique:doctors,name->en,'.$this->id,
            'phone' => 'required_without:id|integer|min:5',
            'email' => 'required_without:id|email|max:255|unique:doctors,email,'.$this->id,
            'password' => 'required_without:id|string|min:8|max:100',
            'start' => 'required_without:id|date_format:H:i',
            'end' => 'required_without:id|date_format:H:i|after:start',
            'patient_time_minute' => 'required_without:id|numeric',
            'gender' => 'required_without:id|numeric|between:0,1',
            'title' => 'required_without:id|numeric|between:0,2',
            'specialization' => 'required_without:id|string|min:8|max:255',
            'appointments'                 => 'array|min:1',
            'appointments.*'               => 'numeric|exists:appointments,id',
            'photo' => 'required_without:id|mimes:jpg,jpeg,png',
        ];
    }
}
