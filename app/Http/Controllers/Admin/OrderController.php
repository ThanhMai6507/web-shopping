<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderModel;
use App\Models\OrderDetialModel;

class OrderController extends Controller
{
    public function index(){
        $order = OrderModel::orderBy('id', 'desc')->get();
        //$order2 = OrderDetialModel::with('order_card')->orderBy('id','DESC')->paginate(10);
       // dd($order2);
        return view('admin.order.index')->with(compact('order'));
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
        OrderDetialModel::where('order_card_id',$id)->delete();;
        return redirect()->back()->with('status','Xóa Thành Công');
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


}
