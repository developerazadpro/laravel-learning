@extends('layouts.master')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Customer List</h2>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Orders Count</th>
                @can('create_customer')
                <th>Action</th>
                @endcan
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
                <tr>
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>{{ $customer->orders->count() }}</td>
                    @can('create_customer')
                    <td>
                        <a href="{{ route('customers.show', $customer->id) }}" class="btn btn-primary btn-sm">View Orders</a>
                    </td>
                    @endcan
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $customers->links() }}</div>
@endsection
