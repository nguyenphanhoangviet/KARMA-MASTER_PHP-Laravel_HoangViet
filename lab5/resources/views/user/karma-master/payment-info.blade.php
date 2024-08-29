@extends('layouts.user')
@section('content')
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Payment</h1>
                    <nav class="d-flex align-items-center">
                        <a href="">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="">Pay</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <section class="checkout_area section_gap">
        <div class="container">
            <div class="billing_details">
                <div class="row">
                    <div class="col-lg-8">
                        <h3>Payment Information</h3>
                        <form class="row contact_form" action="{{ route('pay.storeOrder', ['paymentMethod' => 'vnpay']) }}" method="POST" novalidate="novalidate">
                            @csrf
                            <input type="hidden" name="cart" value="{{ $cartData }}">
                            <input type="hidden" name="shipping_fee" value="{{ $shippingFee }}">
                            <input type="hidden" name="address" value="{{ $address }}">
                            <input type="hidden" name="province" value="{{ $province }}">
                            <input type="hidden" name="district" value="{{ $district }}">
                            <input type="hidden" name="ward" value="{{ $ward }}">
                            <input type="hidden" name="street" value="{{ $street }}">
                            <input type="hidden" name="total" value="{{ $total }}">
                            <div class="col-md-6 form-group p_star">
                                <label for="expiry_date">Expiry Date</label>
                                <input type="text" class="form-control" id="expiry_date" name="expiry_date" placeholder="MM/YY" required>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                {{-- <label for="bank">Bank</label> --}}
                                <select class="form-control" id="bank" name="bank" required>
                                    <option value="">Select Bank</option>
                                    <option value="Vietcombank">Vietcombank</option>
                                    <option value="VietinBank">VietinBank</option>
                                    <option value="BIDV">BIDV</option>
                                    <option value="Agribank">Agribank</option>
                                    <option value="SHB">SHB</option>
                                    <option value="VIB">VIB</option>
                                    <option value="BacABank">BacABank</option>
                                    <option value="VietABank">VietABank</option>
                                    <option value="Sacombank">Sacombank</option>
                                    <option value="Techcombank">Techcombank</option>
                                    <option value="ACB">ACB</option>
                                    <option value="VPBank">VPBank</option>
                                    <option value="VietBank">VietBank</option>
                                    <option value="DongABank">DongA Bank</option>
                                    <option value="Eximbank">Eximbank</option>
                                    <option value="TPBank">TPBank</option>
                                    <option value="NCB">NCB</option>
                                    <option value="PVcomBank">PVcomBank</option>
                                    <option value="Saigonbank">Saigonbank</option>
                                    <option value="LienVietPostBank">LienVietPostBank</option>
                                    <option value="KienlongBank">KienlongBank</option>
                                    <option value="OceanBank">Ocean Bank</option>
                                    <option value="MSB">MSB</option>
                                    <option value="HDBank">HDBank</option>
                                    <option value="NamABank">Nam A Bank</option>
                                    <option value="BaoVietBank">BaoViet Bank</option>
                                    <option value="PublicBank">Public Bank</option>
                                    <option value="PGBank">PG Bank</option>
                                    <option value="VRB">VRB</option>
                                    <option value="OCB">OCB</option>
                                    <option value="IVB">IVB</option>
                                    <option value="ABBANK">ABBANK</option>
                                    <option value="MB">MB</option>
                                    <option value="GPBank">GPBank</option>
                                    <option value="ShinhanBank">Shinhan Bank</option>
                                    <option value="UOB">UOB</option>
                                    <option value="MiraeAsset">Mirae Asset Finance Company</option>
                                    <option value="VietCredit">VietCredit</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <label for="cvv">CVC/CVV</label>
                                <input type="text" class="form-control" id="cvv" name="cvv" placeholder="CVC/CVV" required>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" name="address" placeholder="Address" required>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <label for="city">City</label>
                                <input type="text" class="form-control" id="city" name="city" placeholder="City" required>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <select class="form-control" id="card_type" name="card_type" required>
                                    <option value="VISA">VISA (No 3DS)</option>
                                    <option value="MasterCard">MasterCard</option>
                                    <option value="Amex">Amex</option>
                                </select>
                            </div>
                            <div class="col-md-12 form-group">
                                <button type="submit" value="submit" class="primary-btn">Submit Payment</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
