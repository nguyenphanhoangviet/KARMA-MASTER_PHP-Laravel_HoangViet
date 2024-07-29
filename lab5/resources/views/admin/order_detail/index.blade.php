@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2>Order Details</h2>
            <a href="{{ route('admin.order-details.create') }}" class="btn btn-primary">Create Order Detail</a>
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
                        <th>Order ID</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orderDetails as $orderDetail)
                    <tr>
                        <td>{{ $orderDetail->id }}</td>
                        <td>{{ $orderDetail->order_id }}</td>
                        <td>{{ $orderDetail->product_name }}</td>
                        <td>{{ $orderDetail->quantity }}</td>
                        <td>{{ $orderDetail->price }}</td>
                        <td>
                            <a href="{{ route('admin.order-details.show', $orderDetail->id) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('admin.order-details.edit', $orderDetail->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.order-details.destroy', $orderDetail->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $orderDetails->links() }}
        </div>
    </div>
</div>
@endsection
