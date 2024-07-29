@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2>Show Order Detail</h2>
            <a href="{{ route('admin.order-details.index') }}" class="btn btn-primary">Back</a>
        </div>
        <div class="card-body">
            <div class="form-group">
                <p><strong>ID:</strong> {{ $orderDetail->id }}</p>
                <p><strong>Order ID:</strong> {{ $orderDetail->order_id }}</p>
                <p><strong>Product Name:</strong> {{ $orderDetail->product_name }}</p>
                <p><strong>Quantity:</strong> {{ $orderDetail->quantity }}</p>
                <p><strong>Price:</strong> {{ $orderDetail->price }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
