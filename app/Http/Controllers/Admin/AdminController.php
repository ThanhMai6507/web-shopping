<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminModel;
use Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function indexLogin(){
//         dd(
//             Hash::make('12345678')
//         );
        return view('admin.login');
    }

    public function checkLoginAdmin(Request $request)
    {
        $arr = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (auth()->guard('admin')->attempt($arr)) {
           // $user =Auth::guard('admin')->user()->email;
          // dd($user);
           return view('admin.home') ;
        } else {
            return redirect()->back()->with('error', 'error_login');
        }
    }

    // public function shareMail() {
    //     $to_name = "Khanh Pham";
    //     $to_email = "khanhpvth1808010@fpt.edu.vn";//send to this email
    //     $data = array("name"=>"Mail từ tài khoản Khách hàng","body"=>'Mail gửi về vấn về hàng hóa'); //body of mail.blade.php

    //     Mail::send('user.page.send_mail',$data,function($message) use ($to_name,$to_email){
    //         $message->to($to_email)->subject('Test thử gửi mail google');//send this mail with subject
    //         $message->from($to_email,$to_name);//send from this mail
    //     });
    // }

}
