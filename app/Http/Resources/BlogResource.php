<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
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
            'title'=> $this->getTranslation('title',app()->getLocale($request->lang)),
            'description'=> $this->getTranslation('description',app()->getLocale($request->lang)),
            'photo' => $this->getFirstMediaUrl('photo'),
            'created_at'=> $this->created_at->diffForHumans(),
            'section'=> SectionResource::make($this->whenLoaded('section')),
        ];
    }
}
