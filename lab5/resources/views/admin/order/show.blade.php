@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2>Show Order</h2>
            <a href="{{ route('admin.orders.index') }}" class="btn btn-primary">Back</a>
        </div>
        <div class="card-body">
            <div class="form-group d-flex">
                <div class="d-flex flex-column m-4">
                    <p><strong>ID:</strong> {{ $order->id }}</p>
                    <p><strong>User ID:</strong> {{ $order->user_id }}</p>
                    <p><strong>User name:</strong> {{ $order->user->name }}</p>
                    <p><strong>User email:</strong> {{ $order->user->email }}</p>
                    <p><strong>Shipping Fee:</strong> {{ number_format($order->shipping_fee, 2) }}đ</p>
                    <p><strong>Address:</strong> {{ $order->address }}</p>
                    <p><strong>Province:</strong> {{ $order->province }}</p>
                </div>
                <div class="d-flex flex-column m-4">
                    <p><strong>District:</strong> {{ $order->district }}</p>
                    <p><strong>Ward:</strong> {{ $order->ward }}</p>
                    <p><strong>Street:</strong> {{ $order->street }}</p>
                    <p><strong>Phone:</strong> {{ $order->phone }}</p>
                    <p><strong>Total:</strong> {{ number_format($order->total, 2) }}đ</p>
                    <p><strong>Payment Method:</strong> {{ $order->payment_method }}</p>
                    <p><strong>Payment Status:</strong> {{ $order->payment_status }}</p>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-header">
                    <h3>Order Details</h3>
                </div>
                <div class="card-body">
                    @if ($order->orderDetails->count())
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Product ID</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                    <th>Size</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->orderDetails as $detail)
                                    <tr>
                                        <td>{{ $detail->product_id }}</td>
                                        <td>{{ $detail->product_name }}</td>
                                        <td>{{ $detail->quantity }}</td>
                                        <td>{{ number_format($detail->price, 2) }}đ</td>
                                        <td><img src="{{ asset($detail->image) }}" alt="{{ $detail->product_name }}" style="width: 50px;"></td>
                                        <td>{{ $detail->size }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No order details found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
