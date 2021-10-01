<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\OrderModel;
use App\Models\OrderDetialModel;
use Cart;

class CartController extends Controller
{
    public function saveCart(Request $request){
        $productId = $request -> productId;
        $quantity = $request -> qty;
        $product_info = ProductModel::where('id',$productId)->first();
        //dd($product_info -> name_product);
        //dd($quantity);
        //Cart::add('293ad', 'Product 1', 1, 9.99);
        $data ['id'] = $product_info-> id;
        $data ['qty'] = $quantity;
        $data ['name'] = $product_info->name_product;
        $data ['price'] = $product_info->price;
        $data ['weight'] = '123';
        $data ['options']['image'] = $product_info -> img_product;
        Cart::add($data);
        return redirect('/show-cart');
    }

    public function showCart(){
        $category = CategoryModel::orderBy('id','ASC')->get();
        return view('user.page.cart')->with(compact('category'));
    }

    public function deleteCart($rowId){
        Cart::update($rowId,0);
        return redirect()->back()->with('status','Xóa Thành Công');
    }

    public function updateCart(Request $request){
        $rowId = $request-> rowId_cart;
        $qty = $request->cart_quantity;

        Cart::update($rowId,$qty);
        return redirect()->back();
    }
    
    public function checkOut(){
         $category = CategoryModel::orderBy('id','ASC')->get();
        return view('user.page.checkout')->with(compact('category'));
    }
    public function saveOrder(Request $request){
        $data = $request->validate(
            [
                'order_name' => 'required',
                'order_phone' => 'required',
                'order_adds' => 'required',

            ],[
                'order_name.required' => 'Điền Tên',
                'order_phone.required' => 'Điền Số Điện Thoại',
                'order_adds.required' => 'Điền Dịa Chỉ',
            ]
        );
        $order_cart = new OrderModel();
        $order_cart-> order_name = $data['order_name'];
        $order_cart-> order_address = $data['order_adds'];
        $order_cart-> order_phone = $data['order_phone'];
        $order_cart-> payment_method = "1";
        $order_cart -> save();
        $order_cart_Id = $order_cart->id;
        $content = Cart::content();
        foreach($content as $v_content){
            $price_total = $v_content -> price * $v_content ->qty;
            $order_cart_detail = new OrderDetialModel();
            $order_cart_detail-> order_name_product = $v_content -> name;
            $order_cart_detail-> order_qty = $v_content -> qty;
            $order_cart_detail-> order_price = $price_total;
            $order_cart_detail-> order_card_id = $order_cart_Id;
            //dd($order_cart_detail);
            $order_cart_detail -> save();
           }
          if($order_cart -> save() == true && $order_cart_detail -> save() == true) {
            Cart::destroy();
          }
        return redirect('/tks-out');

    }

    public function tksOut(){
        $category = CategoryModel::orderBy('id','ASC')->get();
        return view('user.page.tks')->with(compact('category'));
    }

}
