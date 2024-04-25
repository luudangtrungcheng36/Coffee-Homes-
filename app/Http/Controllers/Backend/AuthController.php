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
            // Authentication passed...
            // return redirect()->intended('/');
            // echo 1;die();
            return redirect()->route('dashboard.index');
        }else {
            echo 2;
        }
        // return back()->withErrors(['email' => 'Invalid credentials']);
    }
}
