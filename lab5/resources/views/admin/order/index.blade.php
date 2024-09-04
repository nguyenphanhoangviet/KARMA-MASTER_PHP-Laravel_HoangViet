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

                @if ($orders->count())
                    @foreach ($orders as $order)
                        <div class="card mb-3">
                            <div class="card-header">
                                <h5>Order ID: {{ $order->id }}</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <!-- Column 1 -->
                                    <div class="col-md-6">
                                        <p><strong>User Email:</strong> {{ $order->user->email }}</p>
                                        <p><strong>User Name:</strong> {{ $order->user->name }}</p>
                                        <p><strong>Shipping Fee:</strong> {{ number_format($order->shipping_fee, 2) }}đ</p>
                                        <p><strong>Address:</strong> {{ $order->address }}</p>
                                    </div>
                                    
                                    <!-- Column 2 -->
                                    <div class="col-md-6">
                                        <p><strong>Payment Method:</strong> {{ $order->payment_method }}</p>
                                        <p><strong>Phone:</strong> {{ $order->phone }}</p>
                                        <p><strong>Total:</strong> {{ number_format($order->total, 2) }}đ</p>
                                        <p><strong>Payment Status:</strong> {{ $order->payment_status }}</p>
                                    </div>
                                </div>

                                <h4>Order Details</h4>
                                @if ($order->orderDetails->count())
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Product ID</th>
                                                <th>Product Name</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
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
                                                    <td>{{ $detail->size }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <p>No details found for this order.</p>
                                @endif
                                
                                <div class="mt-3">
                                    <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-info">Show</a>
                                    <a href="{{ route('admin.orders.edit', $order->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>Không có đơn hàng nào.</p>
                @endif

                {{ $orders->links() }}
            </div>
        </div>
    </div>
@endsection
