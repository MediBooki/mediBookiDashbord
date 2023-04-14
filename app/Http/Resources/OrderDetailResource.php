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
