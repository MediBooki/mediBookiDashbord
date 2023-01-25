<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DoctorResource extends JsonResource
{
   
    public function toArray($request)
    {
        //return parent::toArray($request);
    
        return [
            'id'=> $this->id,
            'name'=> $this->getTranslation('name',app()->getLocale($request->lang)),        
            'photo' => $this->getFirstMediaUrl('photo'),
            'start'=> $this->start,
            'end'=> $this->end,
            'patient_time_minute'=> $this->patient_time_minute,
            'section'=> SectionResource::make($this->whenLoaded('section')),
            'appointments'=> AppointmentResource::collection($this->whenLoaded('appointments')),
            
        ];
    }
}
