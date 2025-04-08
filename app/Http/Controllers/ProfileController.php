<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware('is_admin')->only('adminArea');
        $this->middleware('throttle:10, 1')->except('publicProfile');
    }
    
    public function index() {
        return 'Welcome to dashboard';
    }

    public function adminArea() {
        return 'Admin Area Only';
    }
    
    public function publicProfile($username) {
        return "Public profile of $username";
    }
}
