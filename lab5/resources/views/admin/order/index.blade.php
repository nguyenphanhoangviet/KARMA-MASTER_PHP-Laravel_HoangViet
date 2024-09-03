@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2>Orders</h2>
            <a href="{{ route('admin.orders.create') }}" class="btn btn-primary">Create Order</a>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User ID</th>
                        <th>Shipping Fee</th>
                        <th>Address</th>
                        <th>Payment Method</th>
                        <th>Phone</th>
                        <th>Total</th>
                        <th>Payment Status</th>
                        <th>Order Details</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        @foreach($order->orderDetails as $detail)
                            <tr>
                                @if ($loop->first)
                                    <td rowspan="{{ $order->orderDetails->count() }}">{{ $order->id }}</td>
                                    <td rowspan="{{ $order->orderDetails->count() }}">{{ $order->user_id }}</td>
                                    <td rowspan="{{ $order->orderDetails->count() }}">{{ number_format($order->shipping_fee, 2) }}đ</td>
                                    <td rowspan="{{ $order->orderDetails->count() }}">{{ $order->address }}</td>
                                    <td rowspan="{{ $order->orderDetails->count() }}">{{ $order->payment_method }}</td>
                                    <td rowspan="{{ $order->orderDetails->count() }}">{{ $order->phone }}</td>
                                    <td rowspan="{{ $order->orderDetails->count() }}">{{ number_format($order->total, 2) }}đ</td>
                                    <td rowspan="{{ $order->orderDetails->count() }}">{{ $order->payment_status }}</td>
                                @endif
                                <td>
                                    <strong>Product ID:</strong> {{ $detail->product_id }}<br>
                                    <strong>Product Name:</strong> {{ $detail->product_name }}<br>
                                    <strong>Quantity:</strong> {{ $detail->quantity }}<br>
                                    <strong>Price:</strong> {{ number_format($detail->price, 2) }}đ<br>
                                    <strong>Size:</strong> {{ $detail->size }}<br>
                                </td>
                                @if ($loop->first)
                                    <td rowspan="{{ $order->orderDetails->count() }}">
                                        <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-info">Show</a>
                                        <a href="{{ route('admin.orders.edit', $order->id) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
            {{ $orders->links() }}
        </div>
    </div>
</div>
@endsection
