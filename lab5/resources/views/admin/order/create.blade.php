@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2>Create Order</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.orders.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="customer_name">Customer Name:</label>
                    <input type="text" class="form-control" id="customer_name" name="customer_name" required>
                </div>
                <div class="form-group">
                    <label for="order_date">Order Date:</label>
                    <input type="date" class="form-control" id="order_date" name="order_date" required>
                </div>
                <div class="form-group">
                    <label for="total_amount">Total Amount:</label>
                    <input type="number" class="form-control" id="total_amount" name="total_amount" required>
                </div>
                <button type="submit" class="btn btn-primary">Create Order</button>
            </form>
        </div>
    </div>
</div>
@endsection
