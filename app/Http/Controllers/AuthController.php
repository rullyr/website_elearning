<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Console\Input\Input;

class AuthController extends Controller
{
    //
    public function register()
    {
        return view('auth-register');
    }

    public function actionRegister(RegisterRequest $request)
    {
        $register = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/login')->with('success', "Berhasil mendaftarkan akun, silahkan login");;
    }

    public function login()
    {
        # code...
        if (Auth::check()) {

            if (Auth::user()->role === 'admin') {
                return redirect('admin/dashboard');
            }
            return redirect('/');
        } else {
            return view('auth-login');
        }
    }

    public function actionlogin(Request $request)
    {
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::Attempt(['email' => $data['email'], 'password' => $data['password']])) {
            if (Auth::user()->role === 'admin') {
                return redirect()->intended('admin/dashboard');
            } elseif (Auth::user()->roles === 'user') {
                return redirect()->intended('/');
            } else {
                return back()->withErrors([
                    'error' => 'Role tidak ditemukan',
                ])->withInput($request->only('email'));
            }
        } else {
            return back()->withErrors([
                'error' => 'Username atau passowrd tidak ditemukan',
            ])->withInput($request->only('email'));
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/');
    }
}
