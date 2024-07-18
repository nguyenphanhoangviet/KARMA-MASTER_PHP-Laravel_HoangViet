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
                                <th scope="col">Product Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Size</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart as $item)
                                {{-- @if (!isset($item['size']) || empty($item['size']))
                                    <script>
                                        window.location.href = "{{ route('single-product', ['id' => $item['product_id']]) }}";
                                    </script>
                                @endif --}}
                                <tr>
                                    <td>
                                        <p>{{ $item['name'] }}</p>
                                    </td>
                                    <td>
                                        <img src="{{ asset('imgs/products/' . $item['img']) }}" alt="{{ $item['name'] }}"
                                            style="width: 50px; height: 50px;">
                                    </td>
                                    <td>
                                        <p>{{ isset($item['size']) && !empty($item['size']) ? $item['size'] : 'không có' }}</p>
                                    </td>
                                    <td>
                                        <h5>{{ number_format($item['price'], 0) }} VND</h5>
                                    </td>
                                    <td>
                                        <div class="product_count">
                                            <input type="text" name="qty" id="sst" maxlength="12"
                                                value="{{ $item['quantity'] }}" title="Quantity:" class="input-text qty">
                                            <button class="increase items-count" type="button"><i
                                                    class="lnr lnr-chevron-up"></i></button>
                                            <button class="reduced items-count" type="button"><i
                                                    class="lnr lnr-chevron-down"></i></button>
                                        </div>
                                    </td>
                                    <td>
                                        <h5>{{ number_format($item['price'] * $item['quantity'], 0) }} VND</h5>
                                    </td>
                                </tr>
                            @endforeach
                            <tr class="bottom_button">
                                <td colspan="6">
                                    <a class="gray_btn" href="#">Update Cart</a>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4"></td>
                                <td>
                                    <h5>Subtotal</h5>
                                </td>
                                <td>
                                    <h5>{{ number_format(collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']), 0) }}
                                        VND</h5>
                                </td>
                            </tr>
                            <tr class="shipping_area">
                                <td colspan="4"></td>
                                <td>
                                    <h5>Shipping</h5>
                                </td>
                                <td>
                                    <div class="shipping_box">
                                        <ul class="list">
                                            <li><a href="#">Flat Rate: $5.00</a></li>
                                            <li><a href="#">Free Shipping</a></li>
                                            <li><a href="#">Flat Rate: $10.00</a></li>
                                            <li class="active"><a href="#">Local Delivery: $2.00</a></li>
                                        </ul>
                                        <h6>Calculate Shipping <i class="fa fa-caret-down" aria-hidden="true"></i></h6>
                                        <select class="shipping_select">
                                            <option value="1">Bangladesh</option>
                                            <option value="2">India</option>
                                            <option value="4">Pakistan</option>
                                        </select>
                                        <select class="shipping_select">
                                            <option value="1">Select a State</option>
                                            <option value="2">Select a State</option>
                                            <option value="4">Select a State</option>
                                        </select>
                                        <input type="text" placeholder="Postcode/Zipcode">
                                        <a class="gray_btn" href="#">Update Details</a>
                                    </div>
                                </td>
                            </tr>
                            <tr class="out_button_area">
                                <td colspan="4"></td>
                                <td></td>
                                <td>
                                    <div class="checkout_btn_inner d-flex align-items-center">
                                        <a class="gray_btn" href="#">Continue Shopping</a>
                                        <a class="primary-btn" href="#">Proceed to checkout</a>
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
