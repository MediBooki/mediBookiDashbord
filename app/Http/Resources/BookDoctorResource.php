<?php

namespace App\Http\Resources;

use App\Models\Doctor;
use App\Models\Service;
use Illuminate\Http\Resources\Json\JsonResource;

class BookDoctorResource extends JsonResource
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
            'price'=> $this->price,
            'date'=> $this->date,
            'time'=> $this->time,
            'patient_id'=>$this->patient_id,
            'status' => $this->status,
            'doctor'=>new DoctorResource(Doctor::findOrFail($this->doctor_id)),
        ];
    }
}
