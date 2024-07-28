<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PayController extends Controller
{
    public function index(Request $request)
    {
        $cartData = $request->input('cart'); // Retrieve cart data from the request
        $shippingFee = $request->input('shipping_fee');
        $address = $request->input('address');
        $province = $request->input('province');
        $district = $request->input('district');
        $ward = $request->input('ward');
        $street = $request->input('street');
        // dd($cartData);
        // dd( $shippingFee , $address , $province , $district , $ward , $street);

        return view('user.karma-master.pay', compact('cartData', 'shippingFee', 'address', 'province', 'district', 'ward', 'street'));
    }

    public function vn_payments(Request $request)
    {
        error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://127.0.0.1:8000/pay#";
        $vnp_TmnCode = "W1GGPIQA"; // Mã website tại VNPAY
        $vnp_HashSecret = "CTYDAV3MTLPIW459EQGANU6WOTT92Y2M"; // Chuỗi bí mật

        $vnp_TxnRef = '12345'; // Mã đơn hàng
        $vnp_OrderInfo = 'Thanh toán đơn hàng tại web';
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $request->amount * 100;
        $vnp_Locale = $request->language;
        $vnp_BankCode = $request->bank_code;
        $vnp_IpAddr = $request->ip();

        $vnp_ExpireDate = $request->txtexpire;

        $vnp_Bill_Mobile = $request->txt_billing_mobile;
        $vnp_Bill_Email = $request->txt_billing_email;
        $fullName = trim($request->txt_billing_fullname);
        if (isset($fullName) && trim($fullName) != '') {
            $name = explode(' ', $fullName);
            $vnp_Bill_FirstName = array_shift($name);
            $vnp_Bill_LastName = array_pop($name);
        }
        $vnp_Bill_Address = $request->txt_inv_addr1;
        $vnp_Bill_City = $request->txt_bill_city;
        $vnp_Bill_Country = $request->txt_bill_country;
        $vnp_Bill_State = $request->txt_bill_state;

        $vnp_Inv_Phone = $request->txt_inv_mobile;
        $vnp_Inv_Email = $request->txt_inv_email;
        $vnp_Inv_Customer = $request->txt_inv_customer;
        $vnp_Inv_Address = $request->txt_inv_addr1;
        $vnp_Inv_Company = $request->txt_inv_company;
        $vnp_Inv_Taxcode = $request->txt_inv_taxcode;
        $vnp_Inv_Type = $request->cbo_inv_type;

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
            "vnp_ExpireDate" => $vnp_ExpireDate,
            "vnp_Bill_Mobile" => $vnp_Bill_Mobile,
            "vnp_Bill_Email" => $vnp_Bill_Email,
            "vnp_Bill_FirstName" => $vnp_Bill_FirstName,
            "vnp_Bill_LastName" => $vnp_Bill_LastName,
            "vnp_Bill_Address" => $vnp_Bill_Address,
            "vnp_Bill_City" => $vnp_Bill_City,
            "vnp_Bill_Country" => $vnp_Bill_Country,
            "vnp_Inv_Phone" => $vnp_Inv_Phone,
            "vnp_Inv_Email" => $vnp_Inv_Email,
            "vnp_Inv_Customer" => $vnp_Inv_Customer,
            "vnp_Inv_Address" => $vnp_Inv_Address,
            "vnp_Inv_Company" => $vnp_Inv_Company,
            "vnp_Inv_Taxcode" => $vnp_Inv_Taxcode,
            "vnp_Inv_Type" => $vnp_Inv_Type
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }

        if ($request->redirect) {
            return redirect($vnp_Url);
        } else {
            return response()->json([
                'code' => '00',
                'message' => 'success',
                'data' => $vnp_Url
            ]);
        }
    }

    public function vnpayReturn(Request $request)
    {
        // handle return logic here
        return view('user.karma-master.vnpay_return', $request->all());
    }
}
