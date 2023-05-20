<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
        $regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';
        return [
            'email'             => 'required|email|unique:settings,email,'.$this->id,
            'linkedin'          => 'nullable|string|regex:'.$regex,
            'gmail'             => 'nullable|string',
            'twitter'           => 'nullable|string|regex:'.$regex,
            'instagram'         => 'nullable|string|regex:'.$regex,
            'youtube'           => 'nullable|string|regex:'.$regex,
            'whatsapp'          => 'nullable|string|regex:'.$regex,
            'snapchat'          => 'nullable|string|regex:'.$regex,
            'facebook'          => 'nullable|string|regex:'.$regex,
            'phone'             => 'required|numeric',
            'whatsapp_phone'    => 'required|numeric',
        ];
    }
}
