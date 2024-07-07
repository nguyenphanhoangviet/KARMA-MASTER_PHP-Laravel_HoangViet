@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2>Order Details</h2>
            <a href="{{ route('order-details.create') }}" class="btn btn-primary">Create Order Detail</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Product ID</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orderDetails as $orderDetail)
                    <tr>
                        <td>{{ $orderDetail->order_id }}</td>
                        <td>{{ $orderDetail->product_id }}</td>
                        <td>{{ $orderDetail->quantity }}</td>
                        <td>{{ $orderDetail->price }}</td>
                        <td>
                            <a href="{{ route('order-details.show', $orderDetail->id) }}" class="btn btn-success">Show</a>
                            <a href="{{ route('order-details.edit', $orderDetail->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('order-details.destroy', $orderDetail->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
