<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $name = 'JON\'S';
        $contactUrl = 'https://contactme.com';
        return view('home', compact('name', 'contactUrl'));
    }
}
