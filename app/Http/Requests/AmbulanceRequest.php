<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AmbulanceRequest extends FormRequest
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
            'driver_name' => 'required|max:100|unique:ambulances,driver_name->ar,'.$this->id,
            'driver_name_en' => 'required|max:100|unique:ambulances,driver_name->en,'.$this->id,
            'car_number' => 'required|string',
            'car_model' => 'required|string',
            'car_year_made' => 'required|digits:4|integer|min:1900|max:'.(date('Y')+1),
            'driver_license_number' => 'required|numeric',
            'driver_phone' => 'required|numeric',
            'is_available' => 'between:0,1',
        ];
    }
}
