<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('profile')->get();
        return view('users.index', compact('users'));
    }

    public function show ($slug)
    {
        $user = User::where('slug', $slug)->firstOrFail();
        return view('users.show', compact('user'));
    }
}

