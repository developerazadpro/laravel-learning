<?php

namespace Database\Seeders;

use Database\Factories\OrderItemFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Generate user
        \App\Models\User::factory(10)->create();

        // Generate Customer
        Customer::factory()->count(30)->create();

        // Generate Products
        Product::factory()->count(20)->create();

        // Generate Order with Order Items
        Order::factory()->count(15)->create()->each(function ($order) {
            $orderItems = OrderItem::factory()->count(rand(1, 5))->create([
                'order_id' => $order->id,
            ]);

            // Update total price
            $order->total_price = $orderItems->sum(fn($item) => $item->price * $item->quantity);
            $order->save();
        });

    }
}
