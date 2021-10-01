<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryModel;
use App\Models\ProductModel;
use App\Models\Clinetlogin;
use Auth;
use Cart;

class UserController extends Controller
{
    public function loginUser(){
        $category = CategoryModel::orderBy('id','ASC')->get();

        return view('user.page.login')->with(compact('category'));
    }

    public function registerUser(){
        $category = CategoryModel::orderBy('id','ASC')->get();
        return view('user.page.register')->with(compact('category'));
    }
 

}
