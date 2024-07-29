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
                        <a href="#" class="btn btn-primary">Thanh toán MoMo</a>
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
                        <form action="{{ route('vn.payments') }}" method="POST">
                            @csrf
                            <input type="hidden" name="order_id" value="123456"> <!-- Add necessary hidden fields here -->
                            <input type="hidden" name="order_desc" value="Mô tả đơn hàng">
                            <input type="hidden" name="order_type" value="billpayment">
                            <input type="hidden" name="amount" value="1000000">
                            <input type="hidden" name="language" value="vn">
                            <input type="hidden" name="bank_code" value="">
                            <input type="hidden" name="txtexpire" value="{{ date('YmdHis', strtotime('+15 minutes')) }}">
                            <input type="hidden" name="txt_billing_mobile" value="0912345678">
                            <input type="hidden" name="txt_billing_email" value="example@example.com">
                            <input type="hidden" name="txt_billing_fullname" value="Nguyen Van A">
                            <input type="hidden" name="txt_inv_addr1" value="123 Đường ABC">
                            <input type="hidden" name="txt_bill_city" value="Hà Nội">
                            <input type="hidden" name="txt_bill_country" value="VN">
                            <input type="hidden" name="txt_bill_state" value="">
                            <input type="hidden" name="txt_inv_mobile" value="0912345678">
                            <input type="hidden" name="txt_inv_email" value="example@example.com">
                            <input type="hidden" name="txt_inv_customer" value="Nguyen Van A">
                            <input type="hidden" name="txt_inv_company" value="Công ty XYZ">
                            <input type="hidden" name="txt_inv_taxcode" value="123456789">
                            <input type="hidden" name="cbo_inv_type" value="I">
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
                        <a href="#" class="btn btn-primary" onclick="document.getElementById('vnpay-form').submit();">Thanh toán VNPay</a>
                    </div>
                </div>
            </div>
            <form id="vnpay-form" action="{{ route('vn.payments') }}" method="POST" style="display: none;">
                @csrf
                <input type="hidden" name="order_id" value="1235">
                <input type="hidden" name="order_desc" value="Mô tả đơn hàng">
                <input type="hidden" name="order_type" value="billpayment">
                <input type="hidden" name="amount" value="20000">
                <input type="hidden" name="language" value="vn">
                <input type="hidden" name="bank_code" value="NCB">
                <input type="hidden" name="txtexpire" value="">
                <input type="hidden" name="txt_billing_mobile" value="0123456789">
                <input type="hidden" name="txt_billing_email" value="email@example.com">
                <input type="hidden" name="txt_billing_fullname" value="Nguyen Van A">
                <input type="hidden" name="txt_inv_addr1" value="Address 1">
                <input type="hidden" name="txt_bill_city" value="City">
                <input type="hidden" name="txt_bill_country" value="Country">
                <input type="hidden" name="txt_bill_state" value="">
                <input type="hidden" name="txt_inv_mobile" value="0123456789">
                <input type="hidden" name="txt_inv_email" value="email@example.com">
                <input type="hidden" name="txt_inv_customer" value="Customer">
                <input type="hidden" name="txt_inv_company" value="Company">
                <input type="hidden" name="txt_inv_taxcode" value="Taxcode">
                <input type="hidden" name="cbo_inv_type" value="I">
            </form>
        </div>
    </div>
@endsection
