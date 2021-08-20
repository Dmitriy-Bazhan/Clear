<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('site.auth.login');
    }

    public function login(Request $request)
    {
        $input = $request->only('email', 'password');
        $credentials = [
            'email' => $input['email'],
            'password' => $input['password']
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect(url('/'));
        }

        return back()->withErrors([
            'email' => 'Предоставленные данные не соответствуют нашим записям...',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
