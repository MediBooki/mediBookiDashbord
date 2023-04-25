<?php

namespace App\Http\Resources;

use App\Models\Service;
use Illuminate\Http\Resources\Json\JsonResource;

class DoctorResource extends JsonResource
{
   
    public function toArray($request)
    {
        //return parent::toArray($request);
        $price = Service::where('doctor_id',$this->id)->select('price')->first();
        $result =  [
            'id'=> $this->id,
            'name'=> $this->getTranslation('name',app()->getLocale($request->lang)),
            'specialization'=> $this->specialization,
            'price'=> $price? $price->price: '',     
            'photo' => $this->getFirstMediaUrl('photo'),
            'start'=> $this->start,
            'end'=> $this->end,
            'patient_time_minute'=> $this->patient_time_minute,
            'section'=> SectionResource::make($this->whenLoaded('section')),
            'appointments'=> AppointmentResource::collection($this->whenLoaded('appointments')),
            'reviews'=> DoctorReviewResource::collection($this->whenLoaded('reviews')),
        ];
        if($this->review_rating_avg){
            $result = array_merge($result, [
                'review_rating_avg'=> $this->review_rating_avg,
            ]);
        }
        return $result;
    }
}
