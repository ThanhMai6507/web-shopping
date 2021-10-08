<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryModel;
use App\Models\ProductModel;
use Cart;


class IndexController extends Controller
{
    public function index(Request $request){
        //seo
        $meta_desc = "Ưu đãi cho đơn hàng đầu tiên √Thanh toán khi nhận hàng√Mua bộ sưu tập váy đầm nữ của chúng tôi từ SHEIN trực tuyến. Thời trang nữ váy đầm nữ nhất định phải có trong mua này";
        $meta_keywords = "Quần áo nữ &amp; nam, mua sắm thời trang trực tuyến  SHEIN";
        $meta_title = "Thời trang nữ váy đầm nữ giá rẻ |SHEIN VN";
        $url_canonical = $request->url();
        //end seo
        $category = CategoryModel::orderBy('id','ASC')->get();

        $product = ProductModel::orderBy('id','ASC')->paginate(12);
        $product_new = ProductModel::orderBy('id','ASC')->where('hot',0)->get();
        return view('user.home')->with(compact('category','product','product_new','meta_desc','meta_keywords','meta_title','url_canonical'));
    }

    public function category(Request $request,$slug ){
        $category = CategoryModel::orderBy('id','ASC')->get();

        $category_id = CategoryModel::where('slug_category',$slug)->first();
       // dd($category_id -> category_name );
        //seo
        $meta_title = $category_id ->category_name;
        $meta_desc = $category_id -> category_desc;
        $meta_keywords = $category_id -> category_keywords ;
        $url_canonical = $request->url();
        //end seo
       

        $product = ProductModel::orderBy('id','ASC')->where('category_id',$category_id->id)->paginate(16);
        return view('user.page.category')->with(compact('category','product','meta_desc','meta_keywords','meta_title','url_canonical'));
    }

    public function detailProduct(Request $request,$slug){
        $category = CategoryModel::orderBy('id','ASC')->get();
        $product = ProductModel::Where('slug_product',$slug)->first();
         //seo
         $meta_title = $product ->name_product;
         $meta_desc = $product -> description;
         $meta_keywords = $product -> product_keywords ;
         $url_canonical = $request->url();
         //end seo
        //$options_Product = ProductModel::orderBy('id','ASC')->get();
        return view('user.page.detailProduct')->with(compact('category','product','meta_desc','meta_keywords','meta_title','url_canonical'));
    }

}
