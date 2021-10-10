<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderModel;
use App\Models\OrderDetialModel;

class OrderController extends Controller
{
    public function index(){
        $order = OrderModel::where('status',1)->orWhere('status',2)->orWhere('status',3) ->get();
        //$order2 = OrderDetialModel::with('order_card')->orderBy('id','DESC')->paginate(10);
       // dd($order2);
        return view('admin.order.index')->with(compact('order'));
    }

    public function orderDove(){
        $order = OrderModel::where('status',4)->get();
        //$order2 = OrderDetialModel::with('order_card')->orderBy('id','DESC')->paginate(10);
       // dd($order2);
        return view('admin.order.dove')->with(compact('order'));
    }

    public function orderFaill(){
        $order = OrderModel::where('status',5)->get();
        //$order2 = OrderDetialModel::with('order_card')->orderBy('id','DESC')->paginate(10);
       // dd($order2);
        return view('admin.order.faill')->with(compact('order'));
    }

    public function orderDetail($id){
        $order_us = OrderModel::where('id', $id)->first();
        $order = OrderDetialModel::where('order_card_id',$id)->get();
        // dd($order);
        return view('admin.order.orderDetail')->with(compact('order_us','order'));
    }
   
    public function orderDestroy($id)
    {
        OrderModel::find($id)->delete();
        OrderDetialModel::where('order_card_id',$id)->delete();
        return redirect('/admin/order');
    }

    public function acceptOrder($id)
    { 
        OrderModel::where('id', $id)->update(['status'=> 0]);
        return redirect()->back();
    }
    public function cancelOrder($id)
    {
        OrderModel::where('id', $id)->update(['status'=> 1]);
        return redirect()->back();
    }
    public function deliveryOrder($id)
    {
        OrderModel::where('id', $id)->update(['status'=> 3]);
        return redirect()->back();
    }
    public function deliveryOrderDone($id)
    {
        OrderModel::where('id', $id)->update(['status' => 4]);
        return redirect()->back();
    }
    public function deliveryOrderFaill($id)
    {
        OrderModel::where('id', $id)->update(['status' => 5]);
        return redirect()->back();
    }


}
