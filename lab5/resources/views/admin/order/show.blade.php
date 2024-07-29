@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2>Show Order</h2>
            <a href="{{ route('admin.orders.index') }}" class="btn btn-primary">Back</a>
        </div>
        <div class="card-body">
            <div class="form-group">
                <p><strong>ID:</strong> {{ $order->id }}</p>
                <p><strong>User ID:</strong> {{ $order->user_id }}</p>
                <p><strong>Cart Data:</strong> {{ $order->cart_data }}</p>
                <p><strong>Shipping Fee:</strong> {{ $order->shipping_fee }}</p>
                <p><strong>Address:</strong> {{ $order->address }}</p>
                <p><strong>Province:</strong> {{ $order->province }}</p>
                <p><strong>District:</strong> {{ $order->district }}</p>
                <p><strong>Ward:</strong> {{ $order->ward }}</p>
                <p><strong>Street:</strong> {{ $order->street }}</p>
                <p><strong>Total:</strong> {{ $order->total }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
