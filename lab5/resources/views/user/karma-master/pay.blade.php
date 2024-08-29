@extends('layouts.user')
@section('content')
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Payment</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="single-product.html">Pay</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-header">
                        Thanh toán MoMo
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('imgs/payment/momo.jpg') }}" alt="MoMo" style="width: 100px;">
                        <p class="card-text">Thanh toán bằng ví điện tử MoMo.</p>
                        <form action="{{ route('pay.storeOrder', ['paymentMethod' => 'momo']) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">Thanh toán MoMo</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-header">
                        Thanh toán VNPay
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('imgs/payment/vnpay.jpg') }}" alt="VNPay" style="width: 100px;">
                        <p class="card-text">Thanh toán bằng ví điện tử VNPay.</p>
                        <form action="{{ route('pay.payment.info', ['paymentMethod' => 'vnpay']) }}" method="POST">
                            @csrf
                            <input type="hidden" name="cart" value="{{ $cartData }}">
                            <input type="hidden" name="shipping_fee" value="{{ $shippingFee }}">
                            <input type="hidden" name="address" value="{{ $address }}">
                            <input type="hidden" name="province" value="{{ $province }}">
                            <input type="hidden" name="district" value="{{ $district }}">
                            <input type="hidden" name="ward" value="{{ $ward }}">
                            <input type="hidden" name="street" value="{{ $street }}">
                            <input type="hidden" name="total" value="{{ $total }}">
                            <button type="submit" class="btn btn-primary">Thanh toán VNPay</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-header">
                        Thanh toán PayPal
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('imgs/payment/paypal.jpg') }}" alt="PayPal" style="width: 100px;">
                        <p class="card-text">Thanh toán bằng ví điện tử PayPal.</p>
                        <form action="{{ route('pay.storeOrder', ['paymentMethod' => 'paypal']) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">Thanh toán PayPal</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
