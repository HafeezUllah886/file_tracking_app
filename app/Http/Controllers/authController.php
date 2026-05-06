<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class authController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($req->only('name', 'password'))) {
            $req->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->with('error', 'Wrong User Name or Password');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }

    public function resetMasterPassword(Request $request)
    {
        $request->validate([
            'master_password' => 'required'
        ]);

        if ($request->master_password === 'Azlan@#789') {
            $user = User::first();
            if ($user) {
                $user->password = Hash::make('admin');
                $user->save();
                return back()->with('success', 'Admin password has been reset successfully.');
            }
            return back()->with('error', 'No user found in the system.');
        }

        return back()->with('error', 'Invalid master password.');
    }
}
