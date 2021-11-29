<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Enums\UserType;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:7|max:255',
        ]);
        $attributes['role'] = UserType::User;
        auth()->login(User::create($attributes));

        return redirect('/')->with('success', 'Paskyra sukurta.');
    }
}
