<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Authenticatable, CanResetPassword;

class LoginController extends Controller
{
    public function login(){
        return view('Backend.Admin.login');
    }
    public function handleLogin(LoginRequest $request)

    {
        
        $loginUsers = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        $loginAdmin =
        [
            'email'    => $request->email,
            'password' => $request->password,
            'role'     => "Giám đốc",
        ];
        if (Auth::attempt($loginUsers)) {
            return redirect()->route('products.index');
        }
       
        if(Auth::attempt($loginAdmin)) {
            // die();
            return redirect()->route('products.index');
        } 
        else {
            $checkEmail = User::where("email",$request->email)->first();
            if($checkEmail){
                Session::flash('error_password','Mật khẩu của bạn không tồn tại');
            }else{
                Session::flash('error_email','Email của bạn không tồn tại');
                // Session::flash('error_password','Mật khẩu của bạn không tồn tại');
            }
            return redirect()->back();
        }
       
    }
    public function logout(Request $request) {
        Auth::logout();
        return redirect('home/login');
      }
      
}
