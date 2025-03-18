<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::with('customer')->get();
        return view('orders.index', compact('orders'));
    }
    public function show(Order $order){
        if (!$order){
            abort(404, 'Order not found');
        }

        if ($order->orderItems->isEmpty()){
            dd('No order items found for this order');
        }

        // Eager load order items with related product details
        $order->loadMissing(['orderItems.product']);
        return view('orders.show', compact('order'));
    }
}
