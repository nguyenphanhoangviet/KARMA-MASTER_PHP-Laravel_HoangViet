@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2>Edit Order Detail</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('order-details.update', $orderDetail->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="order_id">Order ID:</label>
                    <input type="number" class="form-control" id="order_id" name="order_id" value="{{ $orderDetail->order_id }}" required>
                </div>
                <div class="form-group">
                    <label for="product_id">Product ID:</label>
                    <input type="number" class="form-control" id="product_id" name="product_id" value="{{ $orderDetail->product_id }}" required>
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity:</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $orderDetail->quantity }}" required>
                </div>
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="number" class="form-control" id="price" name="price" value="{{ $orderDetail->price }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update Order Detail</button>
            </form>
        </div>
    </div>
</div>
@endsection
