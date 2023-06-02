<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PaymentResource;
use App\Models\Insurance;
use App\Models\Order;
use App\Models\Transaction;
use Carbon\Carbon;
use App\Traits\ResponseAPI;
use Illuminate\Http\Request;
use Nafezly\Payments\Classes\PaymobPayment;

class PaymentController extends Controller
{
    use ResponseAPI;
    public function store()
    {
        if(request()->status == 2) {
            $order = Order::patientCheck()->first();
            $order->check=1;
            if($order->insurance_id){
                $insurance = Insurance::findOrFail($order->insurance_id);
                $insurance->due = $order->total -$order->total_after_discount;
                $insurance->save();
            }
            $order->save();
        }

        if(request()->status == 1) {
            $order = Order::patientCheck()->first();
            
            //pay function
            $payment = new PaymobPayment();
            $response = $payment->pay(
                $order->total_after_discount > 0 ? $order->total_after_discount : $order->total , 
                $user_id = auth()->user()->id, 
                $user_first_name = $order->first_name, 
                $user_last_name = $order->last_name, 
                $user_email = $order->email, 
                $user_phone = $order->phone1, 
                $source = null
            );
            return response()->json([
                'details' => $response,
            ]);
        }
        return response()->json([
            'details' => "Order saved successfully",
        ]);
    }
    public function payment_verify(Request $request)
    {
        $payment = new PaymobPayment();
        $response = $payment->verify($request);
        return response()->json([
            'details' => $response,
        ]);
    }
    // راجع عليها مع الفرونت
    public function callback(Request $request)
    {
        /**
         * if request->success == true 
         * $order = Order::patientCheck()->first();
         * $order->check=1;
         * $order->save();
         */
        if(request()->success == true) {

            $order = Order::patientCheck()->first();
            $order->status =1;
            $order->check =1;
            $order->Payment_Date = request()->created_at;
            if($order->insurance_id){
                $insurance = Insurance::findOrFail($order->insurance_id);
                $insurance->due = $order->total -$order->total_after_discount;
                $insurance->save();
            }
            $order->save();
            $transaction = new Transaction();
            $transaction->amount_cents = $request->amount_cents;
            $transaction->success = $request->success;
            $transaction->order_number = $request->order;
            $transaction->order_id = $order->id;
            $transaction->currency = $request->currency;
            $transaction->type = $request->source_data;
            $transaction->sub_type = $request->source_subdata;
            $transaction->save();
            return response()->json([
                'success' => $request->success,
                'order' => $request->order,
                'currency' => $request->currency,
            ]);
        }

        return response()->json([
            'success' => $request->success,
            'order' => $request->order,
            'currency' => $request->currency,
        ]);
    }
   
}
