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
                    @can('create', \App\Models\Order::class)
                    <th>Action</th>
                    @endcan
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->customer->name }}</td>
                        <td>${{ number_format($order->total_price, 2) }}</td>
                        @can('create', \App\Models\Order::class)
                        <td><a href="{{ route('orders.show', $order->id) }}" class="btn btn-info btn-sm">View Details</a></td>
                        @endcan
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $orders->links() }}</div>
    </div>
@endsection
