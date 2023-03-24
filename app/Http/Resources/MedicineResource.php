<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MedicineResource extends JsonResource
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
                'name'=> $this->getTranslation('name', app()->getLocale($request->lang)),
                'description'=> $this->getTranslation('description', app()->getLocale($request->lang)),
                'price'=> $this->price,
                'manufactured_by'=> $this->manufactured_by,
                'photo' => $this->getFirstMediaUrl('photo'),
                'section'=> SectionResource::make($this->whenLoaded('section')),
            ];
    }
}
