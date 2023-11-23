<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login_proses(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials)) {
            return redirect('/dashboard')->with('success', 'Welcome to dashboard admin');
        } else {
            return redirect()->route('login')->with('error', 'Your email and password are invalid!');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logout successfull');

    }

    public function register()
    {
        return view('auth.register');
    }

        public function register_proses(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users|email',
            'phone' => 'required|numeric|min:10',
            'password' => 'required|min:8|confirmed',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ];

        User::create($data);

        $login = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($login)) {
            return redirect('/')->with('success', 'Welcome to dashboard admin');
        } else {
            return redirect()->route('register')->with('success', 'Your data is not required, try again!');
        }
    }

}
