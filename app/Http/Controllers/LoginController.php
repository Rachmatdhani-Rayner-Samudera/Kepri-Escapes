<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login_proses(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($data))
        {
            return redirect()->route('dashboard');
        }else{
            return redirect()->route('login')->with('error', 'Wrong email and password!');
        }
    }

    public function logout()
    {

    }


    public function register()
    {
        return view('auth.register');
    }


    public function register_proses(Request $request)
    {
        $request->validate([
            'name' =>'required',
            'email' => 'required|email|unique:users,email',
            'phone' =>'required|min:10',
            'password' => 'required|min:5',
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['password'] = Hash::make($request->password);

        User::create($data);

        $login = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($login))
        {
            return redirect()->route('/home');
        } else {
            return redirect()->route('login')->with('error', 'Wrong email and password!');
        }
    }
}
