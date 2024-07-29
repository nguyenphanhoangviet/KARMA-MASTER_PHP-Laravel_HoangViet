@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2>Create Order</h2>
            <a href="{{ route('admin.orders.index') }}" class="btn btn-primary">Back</a>
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
            <form action="{{ route('admin.orders.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="cart_data">Cart Data:</label>
                    <input type="text" class="form-control" id="cart_data" name="cart_data" value="{{ old('cart_data') }}">
                </div>
                <div class="form-group">
                    <label for="shipping_fee">Shipping Fee:</label>
                    <input type="number" class="form-control" id="shipping_fee" name="shipping_fee" value="{{ old('shipping_fee') }}">
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}">
                </div>
                <div class="form-group">
                    <label for="province">Province:</label>
                    <input type="text" class="form-control" id="province" name="province" value="{{ old('province') }}">
                </div>
                <div class="form-group">
                    <label for="district">District:</label>
                    <input type="text" class="form-control" id="district" name="district" value="{{ old('district') }}">
                </div>
                <div class="form-group">
                    <label for="ward">Ward:</label>
                    <input type="text" class="form-control" id="ward" name="ward" value="{{ old('ward') }}">
                </div>
                <div class="form-group">
                    <label for="street">Street:</label>
                    <input type="text" class="form-control" id="street" name="street" value="{{ old('street') }}">
                </div>
                <div class="form-group">
                    <label for="total">Total:</label>
                    <input type="number" class="form-control" id="total" name="total" value="{{ old('total') }}">
                </div>
                <button type="submit" class="btn btn-primary">Create Order</button>
            </form>
        </div>
    </div>
</div>
@endsection
