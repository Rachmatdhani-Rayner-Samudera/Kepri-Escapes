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

    // public function login_proses(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);

    //     $credentials = [
    //         'email' => $request->email,
    //         'password' => $request->password
    //     ];

    //     if (Auth::attempt($credentials)) {
    //         return redirect('/dashboard')->with('success', 'Welcome to the admin dashboard');
    //     } else {
    //         return redirect()->route('login')->with('error', 'Email or password is incorrect.');
    //     }
    // }


    public function login_proses(Request $request)
    {
        $input = $request->all();
        $request->validate([
                'email' => 'required',
                'password' => 'required',
            ],
            [
                'email.required' => 'username tidak boleh kosong',
                'password.required' => 'password tidak boleh kosong',
            ]
        );

        if (auth()->attempt(['email' => $input['email'], 'password' => $input['password']])) {
            $name = str_replace('_', '', strtolower(Auth::user()->email));
            if (auth()->user()->role == 'admin') {
                return redirect()->route('dashboard')->with('login', 'Selamat datang '. $name);
            } elseif (auth()->user()->role == 'user') {
                return redirect()->route('user_login')->with('login', 'Selamat datang ' . $name);
            }
        }else{
            return redirect()->route('login')->with('error-salah', 'email atau password salah !');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logout successful');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function register_proses(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => [
                'required',
                'numeric',
                'regex:/^08[0-9]{8,}$/',
                'unique:users',
            ],
            'password' => 'required|min:8|confirmed',
        ], [
            'email.unique' => 'The email address is already in use.',
            'phone.regex' => 'The phone number must start with 08 and have at least 10 digits.',
            'phone.unique' => 'The phone number is already in use.',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => 1,
        ];

        $user = User::create($data);

        return redirect()->route('login')->with('success', 'Account created successfully! Please log in.');
    }
}
