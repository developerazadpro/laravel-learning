@extends('layouts.master')

@section('content')
    <div class="container mt-4">
        <h2>Orders List</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer</th>
                    <th>Total Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->customer->name }}</td>
                        <td>${{ number_format($order->total_price, 2) }}</td>
                        <td><a href="{{ route('orders.show', $order->id) }}" class="btn btn-info btn-sm">View Details</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $orders->links() }}</div>
    </div>
@endsection
