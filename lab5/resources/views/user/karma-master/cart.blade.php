@extends('layouts.user')
@section('content')
    <!-- Start Header Area -->

    <!-- End Header Area -->

    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Shopping Cart</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="category.html">Cart</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Tên Sản Phẩm</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Size</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Tổng (1 sản phẩm)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart as $item)
                                <tr>
                                    <td>
                                        <p>{{ $item['name'] }}</p>
                                    </td>
                                    <td>
                                        <img src="{{ asset('imgs/products/' . $item['img']) }}" alt="{{ $item['name'] }}"
                                            style="width: 50px; height: 50px;">
                                    </td>
                                    <td>
                                        <p>{{ isset($item['size']) && !empty($item['size']) ? $item['size'] : 'N/A' }}</p>
                                    </td>
                                    <td>
                                        <h5>{{ number_format($item['price'], 0) }} VND</h5>
                                    </td>
                                    <td>
                                        <div class="product_count">
                                            <form action="{{ route('cart.update') }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $item['product_id'] }}">
                                                <input type="hidden" name="size" value="{{ $item['size'] }}">
                                                <input type="hidden" name="quantity" value="{{ $item['quantity'] - 1 }}">
                                                <button class="reduced items-count" type="submit"><i
                                                        class="lnr lnr-chevron-down"></i></button>
                                            </form>
                                            <input type="text" name="qty" id="sst" maxlength="12"
                                                value="{{ $item['quantity'] }}" title="Quantity:" class="input-text qty"
                                                readonly>
                                            <form action="{{ route('cart.update') }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $item['product_id'] }}">
                                                <input type="hidden" name="size" value="{{ $item['size'] }}">
                                                <input type="hidden" name="quantity" value="{{ $item['quantity'] + 1 }}">
                                                <button class="increase items-count" type="submit"><i
                                                        class="lnr lnr-chevron-up"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                    <td>
                                        <h5>{{ number_format($item['price'] * $item['quantity'], 0) }} VND</h5>
                                    </td>
                                    <td>
                                        <form action="{{ route('cart.remove') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $item['product_id'] }}">
                                            <input type="hidden" name="size" value="{{ $item['size'] }}">
                                            <button type="submit" class="btn btn-danger">Remove</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="4"></td>
                                <td>
                                    <h5>Tổng tất cả sản phẩm</h5>
                                </td>
                                <td>
                                    <h5>{{ number_format(collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']), 0) }}
                                        VND</h5>
                                </td>
                            </tr>
                            <tr class="shipping_area">
                                <td colspan="4"></td>
                                <td></td>
                                <td>
                                    <div class="shipping_box">
                                        <form action="{{ route('calculateShipping') }}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="address">Address:</label>
                                                        <input type="text" id="address" name="address"
                                                            class="form-control" placeholder="Enter address">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="province">Province:</label>
                                                        <input type="text" id="province" name="province"
                                                            class="form-control" placeholder="Enter province">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="district">District:</label>
                                                        <input type="text" id="district" name="district"
                                                            class="form-control" placeholder="Enter district">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="ward">Ward:</label>
                                                        <input type="text" id="ward" name="ward"
                                                            class="form-control" placeholder="Enter ward">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="street">Street:</label>
                                                        <input type="text" id="street" name="street"
                                                            class="form-control" placeholder="Enter street">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="weight">Weight (grams):</label>
                                                        <input type="number" id="weight" name="weight"
                                                            class="form-control" placeholder="Enter weight"
                                                            value="5000">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="value" hidden>Value (VND):</label>
                                                        <input type="hidden" id="value" name="value"
                                                            class="form-control"
                                                            value="{{ collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']) }}">
                                                    </div>
                                                    <button class="gray_btn mt-3" type="submit">Shipping</button>
                                                    <span id="shipping_fee" class="mt-3 d-block">
                                                        Phí shipping:
                                                        {{ number_format(session('shipping_fee', 0), 0, ',', '.') }} VND
                                                    </span>
                                                    <span class="mt-3 d-block">
                                                        Tổng các chi phí:
                                                        {{ number_format(collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']) + session('shipping_fee', 0), 0, ',', '.') }}
                                                        VND
                                                    </span>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <tr class="out_button_area">
                                <td colspan="4"></td>
                                <td></td>
                                <td>
                                    <div class="checkout_btn_inner d-flex align-items-center">
                                        <a class="gray_btn" href="#">Continue Shopping</a>
                                        <form action="{{ route('pay') }}" method="POST">
                                            @csrf
                                            {{-- @foreach ($cart as $item)
                                                <input type="hidden" name="cart[{{ $item['product_id'] }}][name]"
                                                    value="{{ $item['name'] }}">
                                                <input type="hidden" name="cart[{{ $item['product_id'] }}][img]"
                                                    value="{{ $item['img'] }}">
                                                <input type="hidden" name="cart[{{ $item['product_id'] }}][size]"
                                                    value="{{ $item['size'] }}">
                                                <input type="hidden" name="cart[{{ $item['product_id'] }}][price]"
                                                    value="{{ $item['price'] }}">
                                                <input type="hidden" name="cart[{{ $item['product_id'] }}][quantity]"
                                                    value="{{ $item['quantity'] }}">
                                            @endforeach --}}
                                            <input type="hidden" name="cart" value="{{ json_encode($cart) }}">
                                            <input type="hidden" name="shipping_fee" value="{{ session('shipping_fee', 0) }}">
                                            <input type="hidden" name="address" value="{{ session('address', old('address')) }}">
                                            <input type="hidden" name="province" value="{{ session('province', old('province')) }}">
                                            <input type="hidden" name="district" value="{{ session('district', old('district')) }}">
                                            <input type="hidden" name="ward" value="{{ session('ward', old('ward')) }}">
                                            <input type="hidden" name="street" value="{{ session('street', old('street')) }}">
                                            <button type="submit" class="primary-btn">Proceed to checkout</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!--================End Cart Area =================-->

    <!-- start footer Area -->

    <!-- End footer Area -->
@endsection
