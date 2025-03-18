@extends('layouts.master')

@section('content')
<div class="container mt-4">
    <h2>Customer Details: {{ $customer->name }}</h2>
    <p>Email: {{ $customer->email }}</p>
    <p>Phone: {{ $customer->phone }}</p>

    <h3 class="mt-4">Orders</h3>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Order ID</th>
                <th>Total Price</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customer->orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>${{ number_format($order->total_price, 2) }}</td>
                    <td>{{ $order->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
