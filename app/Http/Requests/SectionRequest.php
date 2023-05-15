<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SectionRequest extends FormRequest
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
            'name' => 'required|max:100|unique:sections,name->ar,'.$this->id,
            'name_en' => 'required|max:100|unique:sections,name->en,'.$this->id,
            'description' => 'required|max:250',
            'description_en' => 'required|max:250',
            'photo' => 'required_without:id|mimes:jpg,jpeg,png',
        ];
    }
}
