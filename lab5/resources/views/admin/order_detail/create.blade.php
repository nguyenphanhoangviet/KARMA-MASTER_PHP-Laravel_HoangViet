@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2>Create Order Detail</h2>
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
            <form action="{{ route('admin.order-details.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="order_id">Order ID:</label>
                    <input type="text" class="form-control" id="order_id" name="order_id" value="{{ old('order_id') }}">
                </div>
                <div class="form-group">
                    <label for="product_name">Product Name:</label>
                    <input type="text" class="form-control" id="product_name" name="product_name" value="{{ old('product_name') }}">
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity:</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" value="{{ old('quantity') }}">
                </div>
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}">
                </div>
                <button type="submit" class="btn btn-primary">Create Order Detail</button>
            </form>
        </div>
    </div>
</div>
@endsection
