<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\CategoryModel;
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

}
