<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register', [
            'title' => 'register',
        ]);
    }

    public function store(RegisterRequest $request)
    {

        $validated = $request->validated();
        User::create($validated);

        return redirect('/login')->with('success', 'Registration is Successfull!');
    }
}
