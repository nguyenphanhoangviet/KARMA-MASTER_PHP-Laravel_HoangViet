@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2>Edit Order</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="customer_name">Customer Name:</label>
                    <input type="text" class="form-control" id="customer_name" name="customer_name" value="{{ $order->customer_name }}" required>
                </div>
                <div class="form-group">
                    <label for="order_date">Order Date:</label>
                    <input type="date" class="form-control" id="order_date" name="order_date" value="{{ $order->order_date }}" required>
                </div>
                <div class="form-group">
                    <label for="total_amount">Total Amount:</label>
                    <input type="number" class="form-control" id="total_amount" name="total_amount" value="{{ $order->total_amount }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update Order</button>
            </form>
        </div>
    </div>
</div>
@endsection
