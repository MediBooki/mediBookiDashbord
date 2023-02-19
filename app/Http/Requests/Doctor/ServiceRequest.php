<?php

namespace App\Http\Requests\Doctor;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
            'description' => 'required|max:255',
            'description_en' => 'required|max:100',
            'price' => 'required|numeric|min:0',
            'photo' => 'mimes:jpg,jpeg,png',
        ];
    }
}
