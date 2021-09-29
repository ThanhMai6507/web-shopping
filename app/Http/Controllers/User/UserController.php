<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryModel;
use App\Models\ProductModel;
use App\Models\Clinetlogin;

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
 
    public function checkregister(Request $request)
    {
        $data = $request->validate(
            [
                'email' => 'required',
                'displayName' => 'required',
                'password' => 'required'

            ],
            [
                'email.required' => 'Điền Email',
                'displayName.required' => 'Điền Tên hiển thị',
                'password.required' => 'Điền password',
            ]
            );
            $Clinetlogin = new Clinetlogin();
            $Clinetlogin->displayName = $data['displayName'];
            $Clinetlogin->email	= $data['email'];
            $Clinetlogin->password =md5($data['password']);
    
            $Clinetlogin -> save();

        return redirect('/user-login');
    }

    public function checklogin(Request $request){
        $data = $request->validate(
            [
                'email' => 'required',
                'password' => 'required',
            ],
            [
                'email.required' => 'Điền Email',
                'password.required' => 'Điền password',
            ]
        );
        
        // $email =$data['email'];
        // $password = md5($data['password']);
      
        // $login = Clinetlogin::where('email',$email )->where('password',$password)->first();
        
        // if($login){
        //     $login_count = $login->count();
        //     if($login_count>0){
               
        //         return redirect('/');
        //     }
        // }else{
        //     return redirect('/user-login');
        // }
       
    }

}
