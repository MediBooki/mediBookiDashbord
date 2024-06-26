<?php

namespace App\Http\Resources;

use App\Models\Doctor;
use Illuminate\Http\Resources\Json\JsonResource;

class DoctorReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if(request()->route()->getName() == "doctors.index"){
            return [ 
                'id'=> $this->id,
                'comment'=> $this->comment,
                'rating'=> $this->rating,
            ];
        } else {
            return [ 
                'id'=> $this->id,
                'comment'=> $this->comment,
                'rating'=> $this->rating,
                'created_at'=> $this->created_at->format('Y-m-d'),
                'updated_at'=> $this->updated_at->format('Y-m-d'),
                'patient_name'=> $this->patient->name,
                'patient_image'=> $this->patient->getFirstMediaUrl('photo'),
                'doctor'=>new DoctorResource(Doctor::findOrFail($this->doctor_id)),

            ];
        }
       
    }
}
