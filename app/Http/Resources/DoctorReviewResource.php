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
                'doctor'=>new DoctorResource(Doctor::findOrFail($this->doctor_id)),
            ];
        }
       
    }
}
