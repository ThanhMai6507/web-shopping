<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminModel;
use Auth;

class AdminController extends Controller
{
    public function indexLogin(){
        return view('admin.login');
    }

    public function checkLoginAdmin(Request $request)
    {
        $arr = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::guard('admin')->attempt($arr)) {

           // $user =Auth::guard('admin')->user()->name;
          // dd($user);
           return view('admin.home') ;
        } else {
            return view('admin.login');
        }
    }
}
