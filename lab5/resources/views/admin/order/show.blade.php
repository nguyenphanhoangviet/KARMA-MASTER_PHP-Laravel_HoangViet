@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2>Order Details</h2>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="customer_name">Customer Name:</label>
                <p class="form-control">{{ $order->customer_name }}</p>
            </div>
            <div class="form-group">
                <label for="order_date">Order Date:</label>
                <p class="form-control">{{ $order->order_date }}</p>
            </div>
            <div class="form-group">
                <label for="total_amount">Total Amount:</label>
                <p class="form-control">{{ $order->total_amount }}</p>
            </div>
            <a href="{{ route('admin.orders.index') }}" class="btn btn-primary">Back to List</a>
        </div>
    </div>
</div>
@endsection
