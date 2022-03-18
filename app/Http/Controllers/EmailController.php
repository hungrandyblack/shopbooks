<?php

namespace App\Http\Controllers;

use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class EmailController extends Controller
{
    protected $productService;
    protected $cartService;
    protected $categoriesService;
    protected $redirectTo = '/password/success';

    public function __construct()
    {
    }
    protected function validateEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);
    }
    public function form()
    {
        $ngay_hien_tai = date('Y-m-d');
        $mang = explode('-', $ngay_hien_tai);
        $users = User::all();
        foreach ($users as $user) {

            $ngay_sing = explode('-', ($user->birthday));

            if ($ngay_sing[1] == $mang[1] && $ngay_sing[2] == $mang[2]) {
                $user->sendHappyBirthDate();
            }
        }
        return view('email.fogot_password');
    }
    public function sendEmail(\Illuminate\Http\Request $request)
    {
        $this->validateEmail($request);
        $input = $request->all();
        $email = strtolower($input['email']);
        $user = User::where('email', $email)->first();
        //Check if exists user then send mail
        if ($user) {
            return ($user->generateAndSendEmailResetPassword()) ?
                redirect()->back()->with('success', 'Mời bạn kiểm tra email')
                : redirect()->back()->withInput()->withErrors(trans('nayose.cannot_send_email_try_again_later'));
        } else {
            return redirect()->back()->withInput()->withErrors(trans('passwords.user'));
        }
    }
    protected function rules()
    {
        return [
            'token' => 'required',
            'email' => 'required|email',
            'password' => ['required', 'confirmed'],
        ];
    }
    public function passwordreset(Request $request)
    {


        if ($request->expires) {
            $token = $request->token;

            return view('email.reset_password', compact('token'));
        }
        $input = $request->all();

        $token = $input['token'];
        // $password = $input['password'];
        $record = PasswordReset::where('token', $token)->first();
        $user = User::where('email', $record->email)->first();
        $password = $user->password;
        // Check if the token has been used or not
        if (!isset($record)) {
            return redirect()->back()->withInput()->withErrors(trans('nayose.invalid_reset_password_token_or_expired'));
        }
        $user = User::where('email', $record->email)->first();
        $request->request->add(['email' => $record->email]);
        $request->validate($this->rules(), []);
        $this->resetPassword($user, $password);
        PasswordReset::where('token', $token)->delete();
        return redirect($this->redirectTo);
    }
    public function passwordEmail(Request $request)
    {

        $token = $request->token;
        
        $record = PasswordReset::where('token', $token)->first();
        $user = User::where('email', $record->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();
        Session::flash('success', 'thay đổi mật khẩu thành công');
        return redirect()->route('login');
    }
}
