<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role', 1)->get();
        return view("user.index", compact("users"));
    }

    public function userdata()
    {
        $order = Order::all();
        return view('user.data', compact('order'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Ambil data post berdasarkan id
        $user = User::where('id', $id)->first();
    
        // Tentukan aturan validasi
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => [
                'required',
                'numeric',
                'regex:/^08[0-9]{8,}$/',
                'unique:users,phone,' . $user->id,
            ],
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
    
        User::where('id', $user->id)->update($data);
    
        return redirect('/dashboard/user')->with('success', 'User data changed successfully!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user::destroy($user->id);
        return redirect('/dashboard/user')->with('success', 'User has been deleted!'); 
    }
}
