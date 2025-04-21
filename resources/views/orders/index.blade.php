@extends('layouts.master')

@section('content')
    <div class="container mt-4">
        <h2>{{ __('orders.order_list') }}</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>{{ __('orders.customer') }}</th>
                    <th>{{ __('orders.total_price') }}</th>
                    @can('create', \App\Models\Order::class)
                    <th>Action</th>
                    @endcan
                </tr>
            </thead>
            <tbody>
                <?php
                    if(Illuminate\Support\Facades\Session::get('locale')){
                        echo 'Current Lang is: ' . Illuminate\Support\Facades\Session::get('locale');
                    }
                ?>
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
