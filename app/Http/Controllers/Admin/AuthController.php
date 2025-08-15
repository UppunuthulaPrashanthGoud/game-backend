<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $user = env('ADMIN_USER', 'admin');
        $pass = env('ADMIN_PASS', 'admin123');
        if ($request->input('username') === $user && $request->input('password') === $pass) {
            $request->session()->put('admin_logged_in', true);
            return redirect()->route('admin.games.index');
        }
        return back()->withErrors(['username' => 'Invalid credentials']);
    }

    public function logout(Request $request)
    {
        $request->session()->forget('admin_logged_in');
        return redirect()->route('admin.login');
    }
}




