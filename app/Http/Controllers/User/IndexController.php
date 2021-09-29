<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryModel;
use App\Models\ProductModel;


class IndexController extends Controller
{
    public function index(){
        
        $category = CategoryModel::orderBy('id','ASC')->get();


        $product = ProductModel::orderBy('id','ASC')->paginate(12);
        $product_new = ProductModel::orderBy('id','ASC')->where('hot',0)->paginate(3);
        return view('user.home')->with(compact('category','product','product_new'));
    }

    public function category($slug){
        $category = CategoryModel::orderBy('id','ASC')->get();
        $category_id = CategoryModel::where('slug_category',$slug)->first();

        $product = ProductModel::orderBy('id','ASC')->where('category_id',$category_id->id)->paginate(16);
        return view('user.page.category')->with(compact('category','product'));
    }

    public function detailProduct($slug){
        $category = CategoryModel::orderBy('id','ASC')->get();
        $product = ProductModel::Where('slug_product',$slug)->first();
        //$options_Product = ProductModel::orderBy('id','ASC')->get();
        return view('user.page.detailProduct')->with(compact('category','product'));
    }

}
