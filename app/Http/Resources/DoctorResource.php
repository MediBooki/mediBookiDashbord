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
            'section'=> SectionResource::make($this->whenLoaded('section')),
        ];
    }
}
