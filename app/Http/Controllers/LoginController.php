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
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials)) {
            return redirect('/dashboard')->with('success', 'Welcome to the admin dashboard');
        } else {
            return redirect()->route('login')->with('error', 'Email or password is incorrect.');
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
        ];

        $user = User::create($data);

        return redirect()->route('login')->with('success', 'Account created successfully! Please log in.');
    }
}
