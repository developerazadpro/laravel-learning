<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        $this->authorize('create', Customer::class);
        $customers = Customer::with('orders')->paginate(10);
        return view('customers.index', compact('customers'));
    }

    public function show($id){
        $this->authorize('create', Customer::class);
        $customer = Customer::with('orders')->findOrFail($id);
        return view('customers.show', compact('customer'));
    }
}
