<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderDetailResource extends JsonResource
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
            'first_name'=> $this->first_name,
            'last_name'=> $this->last_name,
            'email'=> $this->email,
            'phone1'=> $this->phone1,
            'address1'=> $this->address1,
            'address2'=> $this->address2,
            'state'=> $this->state,
            'city'=> $this->city,
            'zip_code'=> $this->zip_code,
            'total'=> $this->total,
            'updated_at'=>$this->updated_at,
            'created_at'=>$this->created_at,
            'shipping_status'=> $this->shipping_status,
            'user_medicine_items' => $this->medicines->map(function ($item) {
                return [
                    'id'=> $item->id,
                    'medicine_name'=>$item->name,
                    'price'=>$item->price,
                    'photo' => $item->getFirstMediaUrl('photo'),
                    'qty'=>$item->pivot->qty,
                ];
            })->all()
        ];
    }
}
