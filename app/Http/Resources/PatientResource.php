<?php

namespace App\Http\Resources;

use App\Models\Insurance;
use Illuminate\Http\Resources\Json\JsonResource;

class PatientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id'=> $this->id,
            'name'=> $this->name,
            'email'=> $this->email,
            'phone'=> $this->phone,
            'gender'=> $this->gender,
            'blood_group'=> $this->blood_group,
            'address'=> $this->address,
            'date_of_birth' => $this->date_of_birth,
            // 'insurance'=> new InsuranceResource(Insurance::findOrFail($this->insurance_id)),
            'insurance_number'=> $this->insurance_number ? $this->insurance_number : '',
            'insurance_date'=> $this->insurance_date ? $this->insurance_date : '',
            'insurance_status'=> $this->insurance_status ? $this->insurance_status : '',
        ];
    }
}
