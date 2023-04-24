<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CartResource;
use App\Http\Resources\OrderDetailResource;
use App\Http\Resources\OrderResource;
use App\Models\Medicine;
use App\Models\Order;
use App\Traits\ResponseAPI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    use ResponseAPI;
    public function index()
    {
        $cart = Order::patientCheck()->with('medicines')->first();
        $total = 0;
        if ($cart) {
            foreach ($cart->medicines as $product) {
                $total += $product->price * $product->pivot->qty;
            }
            return $this->sendResponse(new CartResource($cart), 'cart retrieve success');

        }
        return $this->sendResponse('message','Not Found Medicine in Cart');
    }

    public function store(Request $request)
    {
        $order = Order::patientCheck()->select('id')->first();
        if($order)
        {
            $cart = Order::findorFail($order->id);
            $cart->first_name =$request->first_name;
            $cart->last_name =$request->last_name;
            $cart->email =$request->email;
            $cart->phone1 =$request->phone1;
            $cart->phone2 =$request->phone2;
            $cart->address1 =$request->address1;
            $cart->address2 =$request->address2;
            $cart->state =$request->state;
            $cart->city =$request->city;
            $cart->zip_code =$request->zip_code;
            $cart->total =$request->total;
            $cart->save();
            return $this->sendResponse(new CartResource($cart), 'cart retrieve success');
        } else {
            return $this->sendError('not Found', 'No Item In Cart');
        }
    }
    public function show($id)
    {
        $order = Order::patientCheck()->select('id')->first();
        $pr_id = Medicine::where([
            ['id', '=', $id]
        ])->select('id')->first();
        DB::beginTransaction();
        if ($order == null) {
            $cart = new Order();
            $cart->patient_id = auth()->user()->id;
            $cart->save();
            $pivotData = ["qty" => 1];
            $cart->medicines()->attach($pr_id, $pivotData);
        } else {
            $cart = Order::findorFail($order->id);
            $hasMedicine = $cart->medicines()->where('medicines.id', $id)->exists();

            if ($hasMedicine) {
                $qty = $cart->medicines()->where('medicines.id', $id)->first()->pivot->qty;
                $i = $qty;
                $cart->medicines()->updateExistingPivot($pr_id, [
                    'qty'      => ++$i,
                ]);
            } else {
                $pivotData = ["qty" => 1];
                $cart->medicines()->attach($pr_id, $pivotData);
            }
        }
        DB::commit();
        return $this->sendResponse('success', 'Medicine Added to Cart');
    }

    public function getOrder()
    {
        $orders = Order::where([
            ['patient_id', '=', auth()->user()->id],
            ['check','=',1]
            ])->orderBy('id','DESC')->get();
        return $this->sendResponse(OrderResource::collection($orders), 'Orders lists send successfully');
    }

    public function getOrderDetail(Request $request)
    {
        $orders = Order::where([
            ['patient_id', '=', auth()->user()->id],
            ['id',$request->id]
            ])->with(['medicines'])->orderBy('id','DESC')->get();
        return $this->sendResponse(OrderDetailResource::collection($orders), 'Orders lists send successfully');
    }

    public function update($id)
    {
        $order = Order::patientCheck()->select('id')->first();
        $cart = Order::findorFail($order->id);
        $hasMedicine = $cart->medicines()->where('medicines.id', $id)->exists();
        if ($hasMedicine) {
            $qty = $cart->medicines()->where('medicines.id', $id)->first()->pivot->qty;
            if ($qty > 1) {
                $i = $qty;
                $pr_id = Medicine::where([
                    ['id', '=', $id]
                ])->select('id')->first();
                $cart->medicines()->updateExistingPivot($pr_id, [
                    'qty'      => --$i,
                ]);
            }
        }
        return $this->sendResponse(new CartResource($cart), 'cart retrieve success');
    }


    public function destroy($id)
    {
        $order = Order::patientCheck()->select('id')->first();
        $cart = Order::findorFail($order->id);
        $hasMedicine = $cart->medicines()->where('medicines.id', $id)->exists();
        if($hasMedicine){
            $pr_id = Medicine::where([
                ['id', '=' , $id]
            ])->select('id')->first();
            $cart->medicines()->where('medicines.id', $id)->detach($pr_id);
        } 
        return $this->sendResponse(new CartResource($cart), 'cart retrieve success');
    }
}
