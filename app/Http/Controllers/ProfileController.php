<?php

namespace App\Http\Controllers;

use App\Models\Blog;

class ProfileController extends Controller
{
    public function index()
    {
        return view('dashboard.home.index', [
            'title' => 'Dashboard',
            'no' => 1,
            'blogs' => Blog::where('user_id', auth()->user()->id)->get(),
            'date' => Indo(now())
        ]);
    }
}
