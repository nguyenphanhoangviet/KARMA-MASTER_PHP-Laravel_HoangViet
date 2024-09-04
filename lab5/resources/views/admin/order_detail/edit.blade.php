@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2>Edit Order Detail</h2>
            <a href="{{ route('admin.order-details.index') }}" class="btn btn-primary">Back</a>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('admin.order-details.update', $orderDetail->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="order_id">Order ID:</label>
                    <select class="form-control" id="order_id" name="order_id">
                        <option value="">Select Order</option>
                        @foreach($orders as $order)
                            <option value="{{ $order->id }}" {{ $order->id == $orderDetail->order_id ? 'selected' : '' }}>
                                {{ $order->id }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="product_id">Product ID:</label>
                    <select class="form-control" id="product_id" name="product_id">
                        <option value="">Select Product</option>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}" {{ $product->id == $orderDetail->product_id ? 'selected' : '' }}>
                                {{ $product->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="quantity">Quantity:</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" value="{{ old('quantity', $orderDetail->quantity) }}">
                </div>

                <div class="form-group">
                    <label for="size">Size:</label>
                    <input type="text" class="form-control" id="size" name="size" value="{{ old('size', $orderDetail->size) }}">
                </div>

                <button type="submit" class="btn btn-primary">Update Order Detail</button>
            </form>
        </div>
    </div>
</div>
@endsection
