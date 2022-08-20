<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function authenticate(Request $request)
    {
        $valid = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        try {
            if (!Auth::attempt($valid, $request->has('remember'))) {
                return back()->withErrors(['username' => 'Wrong credential! Please check your account correctly']);
            }
            return redirect()->intended(route('dashboard'))->with('success', 'Login Success');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
