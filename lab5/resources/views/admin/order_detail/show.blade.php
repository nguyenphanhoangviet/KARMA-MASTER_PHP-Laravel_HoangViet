@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2>Order Detail</h2>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label>Order ID:</label>
                <p>{{ $orderDetail->order_id }}</p>
            </div>
            <div class="mb-3">
                <label>Product ID:</label>
                <p>{{ $orderDetail->product_id }}</p>
            </div>
            <div class="mb-3">
                <label>Quantity:</label>
                <p>{{ $orderDetail->quantity }}</p>
            </div>
            <div class="mb-3">
                <label>Price:</label>
                <p>{{ $orderDetail->price }}</p>
            </div>
            <a href="{{ route('order-details.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</div>
@endsection
