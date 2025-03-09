<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $name = 'JON\'S';
        return view('home', compact('name'));
    }
}
