<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InsuranceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=> $this->id,
            'insurance_code'=> $this->insurance_code,
            'discount_percentage'=> $this->discount_percentage,
            'company_rate'=> $this->company_rate,
            'name'=> $this->getTranslation('name',app()->getLocale($request->lang)),        
        ];
    }
}
