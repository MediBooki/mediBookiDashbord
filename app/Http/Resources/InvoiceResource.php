<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceResource extends JsonResource
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
            'invoice_date'=> $this->invoice_date,
            'price'=> $this->price,
            'discount_value'=> $this->discount_value,
            'tax_rate'=> $this->tax_rate,
            'tax_value'=> $this->tax_value,
            'total_with_tax'=> $this->total_with_tax,
            'type'=> $this->type,
            'service'=> $this->service->name,
            'doctor'=> $this->doctor->name,
        ];
    }
}
