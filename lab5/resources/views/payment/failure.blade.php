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
        <div class="alert alert-danger mt-5 mb-5">
            <h4 class="alert-heading">Thanh toán không thành công!</h4>
            <p>Đã xảy ra sự cố trong quá trình thanh toán. Vui lòng thử lại sau.</p>
            <hr>
            <a href="{{ route('cart.index') }}" class="btn btn-primary">Quay lại giỏ hàng</a>
        </div>
    </div>
@endsection
