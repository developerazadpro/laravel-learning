<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Cache;

class OrderController extends Controller
{
    public function index(){
        //$orders = Order::with('customer')->paginate(5);
        $page = Request::get('page', 1); // current page or default to 1
        $cacheKey = "orders_page_{$page}";
        $orders = Cache::remember($cacheKey, now()->addMinutes(5), function () {
            return Order::with('customer')->paginate(5);
        });
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
