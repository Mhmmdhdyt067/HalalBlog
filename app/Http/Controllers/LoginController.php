<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login.login', [
            'title' => 'Login',
        ]);
    }

    public function auth(LoginRequest $request)
    {
        $validated = $request->validated();
        if (Auth::attempt($validated)) {
            $request->session()->regenerate();
            return to_route('profile')->with('loginSuccess', 'Berhasil');
        } else {
            $this->loginFailed();

        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function loginFailed()
    {
        return back()->with('loginError', 'Login Failed!');
    }
}
