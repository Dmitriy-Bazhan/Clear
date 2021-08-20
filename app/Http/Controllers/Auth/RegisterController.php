<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function index()
    {
        return view('site.auth.register');
    }

    public function register(Request $request)
    {

        $input = $request->only('name', 'email', 'password', 'password_confirmation');

        $rules = [
            'name' => ['required', 'string', 'max:255', 'regex:/^[0-9A-Za-zА-Яа-яґҐЁёІіЇїЄє\'’ʼ.,:;-_\s\ ]+$/u'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'alpha_dash', 'confirmed', 'min:6']
        ];

        $message = require_once base_path('resources/lang/' . app()->getLocale() . '/errors-message.php');

        Validator::validate($input, $rules, $message);

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        Auth::login($user);
        return redirect(url('/'));
    }
}
