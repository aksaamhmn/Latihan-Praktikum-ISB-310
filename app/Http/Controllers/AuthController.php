<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    public function showLogin(Request $request)
    {
        if (!session()->has('login') && $request->hasCookie('user_login')) {
            session(['login' => true, 'username' => $request->cookie('user_login')]);
            return redirect()->route('home');
        }

        if (session()->has('login')) return redirect()->route('home');

        return view('login');
    }

    public function login(Request $request)
    {
        $valid_user = 'apaweh';
        $valid_pass = '111';

        if ($request->username === $valid_user && $request->password === $valid_pass) {
            session(['login' => true, 'username' => $valid_user]);

            if ($request->has('remember')) {
                Cookie::queue('user_login', $valid_user, 60);

                Cookie::queue('remembered_username', $valid_user, 43200);
            }

            return redirect()->route('home');
        }

        return back()->with('error', 'Username atau Password Salah!');
    }

    public function logout()
    {
        session()->forget(['login', 'username']);

        Cookie::queue(Cookie::forget('user_login'));

        return redirect()->route('home');
    }
}
