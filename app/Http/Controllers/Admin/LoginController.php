<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Validator;
use Hash;
use Auth;
use Cart;
use Illuminate\Support\MessageBag;


class LoginController extends Controller
{
    function getLogin()
    {
        return view('login_admin.login');
    }

    function postLogin(Request $req)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ];
        $message = [
            'email.required' => 'Email là trường bắt buộc',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Mật khẩu là trường bắt buộc',
            'password.min' => 'Mật khẩu phải chứa ít nhất 8 ký tự',
        ];
        $validator = Validator::make($req->all(), $rules, $message);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();


        } else {
            $email = $req->input('email');
            $password = $req->input('password');

            if (Auth::attempt(['email' => $email, 'password' => $password])) {

                if (Auth::user()->role == 1) {
                    return redirect()->route('admin_category.index');
                }
            } else {
                return redirect()->back()->with('errorlogin', "Email hoặc mật khẩu sai vui lòng nhập lại");
            }
        }
    }
    public function getLogout(){
        Auth::logout();
        return redirect()->route('home.index');
    }
}
