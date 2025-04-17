<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;

class OrderController extends Controller
{
    public function index(){
        //$orders = Order::with('customer')->paginate(5);
        $page = Request::get('page', 1); // current page or default to 1
        $cacheKey = "orders_page_{$page}";

        // Track keys manually
        $trackedKeys = Cache::get('orders_cache_keys', []);
        if (!in_array($cacheKey, $trackedKeys)) {
            $trackedKeys[] = $cacheKey;
            Cache::put('orders_cache_keys', $trackedKeys, now()->addMinutes(10));
        }
        //dd($trackedKeys);
        $orders = Cache::remember($cacheKey, now()->addMinutes(5), function () {
            return Order::with('customer')->paginate(5);
        });
        return view('orders.index', compact('orders'));
    }
    public function show(Order $order){
        $this->authorize('create_order');
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

    protected function clearOrderCache() {
        $trackedKeys = Cache::get('orders_cache_keys', []);
        //dd($trackedKeys);
        foreach ($trackedKeys as $key) {
            //echo($key);
            Cache::forget($key); // delete individual cache key
        }
        Cache::forget('orders_cache_keys');
    }

    public function update(Request $request, Order $order) {
        //$order->update($request->all());
        if($this->clearOrderCache()){
            return 'cache cleared';      
        }
        
    }
}
