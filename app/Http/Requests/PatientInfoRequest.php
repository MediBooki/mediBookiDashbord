<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PatientInfoRequest extends FormRequest
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
        $id =Auth::guard('patient')->user()->id;
        return [
            'name' => 'required|max:255|unique:patients,name,'.$id.'|regex:/^[\pL\s]+$/u',
            'phone' => 'required|numeric|unique:patients,phone,'.$id,
            'address' => 'required|string',
        ];
    }
}
