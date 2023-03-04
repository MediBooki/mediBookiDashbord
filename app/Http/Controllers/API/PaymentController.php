<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PaymentResource;
use App\Models\Order;
use Carbon\Carbon;
use App\Traits\ResponseAPI;
use Illuminate\Http\Request;
use Nafezly\Payments\Classes\PaymobPayment;

class PaymentController extends Controller
{
    use ResponseAPI;
    public function store()
    {
        
        $order = Order::patientCheck()->first();
        $order->check=1;
        $order->status =1;
        $order->Payment_Date =Carbon::now();
        $order->save();
        //pay function
        $payment = new PaymobPayment();
        $response = $payment->pay(
            $order->total, 
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
        return response()->json([
            'success' => $request->success,
            'order' => $request->order,
            'currency' => $request->currency,
        ]);
    }
   
}
