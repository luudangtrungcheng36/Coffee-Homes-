<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index() {
        return view('backend.auth.index');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if($user->role === 1)
                return redirect()->route('dashboard.index')->with('success', 'Đăng nhập thành công ');
            else {
                Auth::logout();
                return back()->with('error', 'Tài khoản này không được phép truy cập ');
            }
        }else {
            return back()->with('error', 'Email hoặc mật khẩu không đúng ');
        }
    }
}
