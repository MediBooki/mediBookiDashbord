<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use DB;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where([
            ['check', '=' , 1]
        ])->paginate(15);
        return view('dashboard.orders.index',compact('orders'));
    }

    public function show($id)
    {
        $order = Order::where([
            ['id', '=', $id],
            ['check', '=' , 1]
        ])->first();
        return view('dashboard.orders.show',compact('order'));
    }
    public function edit($id)
    {
        $order = Order::where([
            ['id', '=', $id],
            ['check', '=' , 1]
        ])->first();
        return view('dashboard.orders.edit',compact('order'));
    }
    public function update(Request $request)
    {
        try {
            DB::beginTransaction();
            $order = Order::findorFail($request->id);
            $order->first_name =$request->first_name;
            $order->last_name =$request->last_name;
            $order->email =$request->email;
            $order->phone1 =$request->phone1;
            $order->phone2 =$request->phone2;
            $order->address1 =$request->address1;
            $order->address2 =$request->address2;
            $order->state =$request->state;
            $order->city =$request->city;
            $order->zip_code =$request->zip_code;
            $order->total =$request->total;
            $order->shipping_status= $request->shipping_status;
            $order->save();
            DB::commit();
            return redirect()->route('Dash_orders.index')->with(['success' => 'order Has Updated Successfully']);
        } catch (\Exception $e) {
            return redirect()->route('Dash_orders.edit')->with(['error' => 'Something is wrong']);
        }
    }
    public function destroy(Request $request)
    {
        $order = Order::findOrFail($request->id);
        $order->delete();
        return redirect()->route('Dash_orders.index')->with(['success' => 'Order Deleted Successfully']);
    }

    public function order_delivered()
    {
        $orders = Order::where([
            ['check', '=' , 1],
            ['shipping_status', '=', 1],
        ])->paginate(15);
        return view('dashboard.orders.delivered',compact('orders'));
    }
    public function order_undelivered()
    {
        $orders = Order::where([
            ['check', '=' , 1],
            ['shipping_status', '=', 2],
        ])->paginate(15);
        return view('dashboard.orders.undelivered',compact('orders'));
    }
    public function order_preparation()
    {
        $orders = Order::where([
            ['check', '=' , 1],
            ['shipping_status', '=', 0],
        ])->paginate(15);
        return view('dashboard.orders.preparation',compact('orders'));
    }

}
