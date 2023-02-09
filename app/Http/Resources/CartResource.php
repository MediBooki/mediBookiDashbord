<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
      
        $total = 0;
        if($request){
            foreach ($this->medicines as $product){
                $total += $product->price*$product->pivot->qty;
            }
            
        }
        return [
            'id'=> $this->id,
            'first_name'=> $this->first_name,
            'last_name'=> $this->last_name,
            'email'=> $this->email,
            'phone1'=> $this->phone1,
            'phone2'=> $this->phone2,
            'address1'=> $this->address1,
            'address2'=> $this->address2,
            'state'=> $this->state,
            'city'=> $this->city,
            'zip_code'=> $this->zip_code,
            'total'=>$total,
            'status'=> $this->status,
            'check'=> $this->check,
            'shipping_status'=> $this->shipping_status,
            'Payment_Date'=> $this->Payment_Date,

            'user_cart_items' => $this->medicines->map(function ($item) {
                return [
                    'medicine_name'=>$item->name,
                    'price'=>$item->price,
                    'photo' => $item->getFirstMediaUrl('photo'),
                    'qty'=>$item->pivot->qty,
                ];
            })->all()
            
        ];
    }
}
