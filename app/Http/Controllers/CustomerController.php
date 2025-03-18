<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        $customers = Customer::with('orders')->get();
        return view('customers.index', compact('customers'));
    }

    public function show($id){
        $customer = Customer::with('orders')->findOrFail($id);
        return view('customers.show', compact('customer'));
    }
}
