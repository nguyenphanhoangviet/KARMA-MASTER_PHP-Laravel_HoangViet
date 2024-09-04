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

            <!-- Form to Create Order -->
            <form action="{{ route('admin.orders.store') }}" method="POST">
                @csrf
                <div class="row">
                    <!-- Group 1: Address and Contact Information -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="user_id">User:</label>
                            <select class="form-control" id="user_id" name="user_id">
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="shipping_fee">Shipping Fee:</label>
                            <input type="number" class="form-control" id="shipping_fee" name="shipping_fee" value="{{ old('shipping_fee') }}" step="0.01">
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
                    </div>

                    <!-- Group 2: Payment and Contact Information -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ward">Ward:</label>
                            <input type="text" class="form-control" id="ward" name="ward" value="{{ old('ward') }}">
                        </div>
                        <div class="form-group">
                            <label for="street">Street:</label>
                            <input type="text" class="form-control" id="street" name="street" value="{{ old('street') }}">
                        </div>
                        <div class="form-group">
                            <label for="payment_method">Payment Method:</label>
                            <select class="form-control" id="payment_method" name="payment_method">
                                <option value="Thanh toán nhận hàng" {{ old('payment_method') == 'Thanh toán nhận hàng' ? 'selected' : '' }}>Thanh toán nhận hàng</option>
                                <option value="vnpay" {{ old('payment_method') == 'vnpay' ? 'selected' : '' }}>VNPay</option>
                                <option value="momo" {{ old('payment_method') == 'momo' ? 'selected' : '' }}>MoMo</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone:</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
                        </div>
                        <div class="form-group">
                            <label for="payment_status">Payment Status:</label>
                            <select class="form-control" id="payment_status" name="payment_status">
                                <option value="Chưa Thanh Toán" {{ old('payment_status') == 'Chưa Thanh Toán' ? 'selected' : '' }}>Chưa Thanh Toán</option>
                                <option value="Giao dịch thành công" {{ old('payment_status') == 'Giao dịch thành công' ? 'selected' : '' }}>Giao dịch thành công</option>
                                <option value="Giao dịch thất bại" {{ old('payment_status') == 'Giao dịch thất bại' ? 'selected' : '' }}>Giao dịch thất bại</option>
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Create Order</button>
            </form>
        </div>
    </div>
</div>
@endsection
