<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicineRequest extends FormRequest
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
            'name' => 'required|max:100|unique:medicines,name->ar,'.$this->id,
            'name_en' => 'required|max:100|unique:medicines,name->en,'.$this->id,
            'description' => 'required|max:255',
            'description_en' => 'required|max:100',
            'price' => 'required|numeric|min:0',
            'manufactured_by' => 'required|string|max:100',
            'category_id' => 'required|exists:categories,id',
            'photo' => 'required_without:id|mimes:jpg,jpeg,png',
        ];
    }
}
