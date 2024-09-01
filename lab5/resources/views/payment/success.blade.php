@extends('layouts.user')

@section('content')
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Alert</h1>
                    <nav class="d-flex align-items-center">
                        <a href="#">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="#">Alert</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <div class="container mt-5 mb-5">
        <div class="alert alert-success mt-5 mb-5">
            <h4 class="alert-heading">Thanh toán thành công!</h4>
            <p>Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi. Đơn hàng của bạn đã được thanh toán thành công.</p>
            <hr>
            <a href="{{ route('cart.index') }}" class="btn btn-primary">Quay lại giỏ hàng</a>
        </div>
    </div>
@endsection
