<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DiagnosticResource extends JsonResource
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
            'id' => $this->id,
            'review_date'=> $this->review_date,
            'diagnosis'=> $this->diagnosis,
            'medicine'=> $this->medicine,
            // 'patient'=> PatientResource::make($this->whenLoaded('patient')),
            'doctor'=> DoctorResource::make($this->whenLoaded('doctor')),
        ];
    }
}
