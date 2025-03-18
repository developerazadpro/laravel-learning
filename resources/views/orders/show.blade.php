@extends('layouts.master')

@section('content')
    <div class="container mt-4">
        <h2>Order Details - #{{ $order->id }}</h2>
        <p><strong>Customer:</strong> {{ $order->customer->name }}</p>
        <p><strong>Total Price:</strong> ${{ number_format($order->total_price, 2) }}</p>

        <h4>Order Items</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->orderItems as $item)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>${{ number_format($item->price, 2) }}</td>
                        <td>${{ number_format($item->price * $item->quantity, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
