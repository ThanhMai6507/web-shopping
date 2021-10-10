<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\OrderModel;
use App\Models\OrderDetialModel;
use App\Models\CouponModel;
use Cart;
use Session;

class CartController extends Controller
{
    public function saveCart(Request $request){
       // $productId = $request -> productId;cart_product_id
        $productId = $request -> productId;
        //dd($productId);
        $quantity = $request -> qty;
        $product_size = $request -> productSize;
        //dd($product_size);
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
        //$data  ['options']['size'] = $product_info -> img_product;
        Cart::add($data);
        //dd($data);
        return redirect('/show-cart');
        //return redirect()->back();
    }

    public function showCart(Request $request){

        $meta_desc = "Ưu đãi cho đơn hàng đầu tiên √Thanh toán khi nhận hàng√Mua bộ sưu tập váy đầm nữ của chúng tôi từ SHEIN trực tuyến. Thời trang nữ váy đầm nữ nhất định phải có trong mua này";
        $meta_keywords = "Quần áo nữ &amp; nam, mua sắm thời trang trực tuyến  SHEIN";
        $meta_title = "Giỏ Hàng";
        $url_canonical = $request->url();

        $category = CategoryModel::orderBy('id','ASC')->get();

        return view('user.page.cart')->with(compact('category','meta_desc','meta_keywords','meta_title','url_canonical'));
    }

    public function deleteCart($rowId){
        Cart::update($rowId,0);
        Session::forget('coupon');
        return redirect()->back()->with('status','Xóa Thành Công');
    }

    public function updateCart(Request $request){
        $rowId = $request-> rowId_cart;
        $qty = $request->cart_quantity;

        Cart::update($rowId,$qty);
        return redirect()->back();
    }
    
    public function checkOut(Request $request){
        $meta_desc = "Ưu đãi cho đơn hàng đầu tiên √Thanh toán khi nhận hàng√Mua bộ sưu tập váy đầm nữ của chúng tôi từ SHEIN trực tuyến. Thời trang nữ váy đầm nữ nhất định phải có trong mua này";
        $meta_keywords = "Quần áo nữ &amp; nam, mua sắm thời trang trực tuyến  SHEIN";
        $meta_title = "Thanh Toán";
        $url_canonical = $request->url();

         $category = CategoryModel::orderBy('id','ASC')->get();
        return view('user.page.checkout')->with(compact('category','meta_desc','meta_keywords','meta_title','url_canonical'));
    }
    public function saveOrder(Request $request){
        //  $data1 = $request->coupon_price;
        //  dd($data1);
        //seo
        $meta_desc = "Ưu đãi cho đơn hàng đầu tiên √Thanh toán khi nhận hàng√Mua bộ sưu tập váy đầm nữ của chúng tôi từ SHEIN trực tuyến. Thời trang nữ váy đầm nữ nhất định phải có trong mua này";
        $meta_keywords = "Quần áo nữ &amp; nam, mua sắm thời trang trực tuyến  SHEIN";
        $meta_title = "Thanh Toán Thành Công";
        $url_canonical = $request->url();
        //end seo

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
        //tinh cart coupon
        if(Session::get('coupon')){
            $order_cart-> order_totol = $request->coupon_price;
            $order_cart-> coupon_status = 1;
        }else{
            $order_cart-> order_totol = Cart::priceTotal(0,',','');
            $order_cart-> coupon_status = 0;
        }
        //end cart coupon
        $order_cart-> payment_method = $request->bankdef;
        $order_cart-> order_qty = Cart::count();
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
            //dd($tong2);
            $order_cart_detail -> save();
           }
          if($order_cart -> save() == true && $order_cart_detail -> save() == true) {
            Cart::destroy();
            Session::forget('coupon');
            }

        $category = CategoryModel::orderBy('id','ASC')->get();

        return view('user.page.tks')->with(compact('category','meta_desc','meta_keywords','meta_title','url_canonical'));
       // return redirect('/tks-out');
    }

    // public function tksOut(){
    //     if(Cart::count =) {
    //         $category = CategoryModel::orderBy('id','ASC')->get();
    //         return view('user.page.tks')->with(compact('category'));
    //     }
    //     else{
    //         return redirect('/');
    //     }
       
    // }

    public function checkCoupon(Request $request){
        $data = $request -> all();
        $coupon = CouponModel::where('code_coupon',$data['coupon']) ->first();
        if($coupon){
            $count_coupon = $coupon->count();
            if($count_coupon > 0){
                $coupon_session = Session::get('coupon');
                if($coupon_session == true){
                    $is_available = 0;
                    if($is_available == 0){
                        $cou[] = array(
                            'code_coupon' => $coupon -> code_coupon,
                            'coupon_condition' => $coupon -> coupon_condition,
                            'coupon_number' => $coupon -> coupon_number,
                        );
                        Session::put('coupon',$cou);
                    }
                }else{
                    $cou[] = array(
                        'code_coupon' => $coupon -> code_coupon,
                        'coupon_condition' => $coupon -> coupon_condition,
                        'coupon_number' => $coupon -> coupon_number,
                    );
                    Session::put('coupon',$cou);
                }
                Session::save();
            return redirect()->back()->with('message','Ma giam da duoc ap dung');

            }
        }else{
            return redirect()->back()->withErrors('Ma giam khong dung');
        }
    }

}
