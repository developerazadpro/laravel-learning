<?php

namespace App\Http\Controllers;

use App\Events\UserRegistered;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function store () {
        $user = User::create([
            'name' => 'User_' . Str::random(5),
            'email'=> Str::random(8) . '@example.com',
            'password' => bcrypt('12345678'),
        ]);

        event(new UserRegistered($user));
        dd('User registered');
    }
}
