<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;

class PayController extends Controller
{
    public function index(Request $request)
    {
        // Retrieve data from the request
        $cartData = $request->input('cart');
        $shippingFee = $request->input('shipping_fee');
        $address = $request->input('address');
        $province = $request->input('province');
        $district = $request->input('district');
        $ward = $request->input('ward');
        $street = $request->input('street');

        if ($request->has('cart') && $request->has('shipping_fee')) {
            // Calculate total
            $total = 0;
            foreach ($cartData as $item) {
                $total += $item['quantity'] * $item['price'];
            }
            $total += $shippingFee;

            // Save order to the database
            $order = Order::create([
                'cart_data' => json_encode($cartData), // Assuming cartData is an array, encode it to JSON
                'shipping_fee' => $shippingFee,
                'address' => $address,
                'province' => $province,
                'district' => $district,
                'ward' => $ward,
                'street' => $street,
                'total' => $total,  // Lưu tổng số tiền vào database
            ]);

            // Save order details to the database
            foreach ($cartData as $item) {
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_name' => $item['product_name'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                ]);
            }
        }

        return view('user.karma-master.pay', compact('cartData', 'shippingFee', 'address', 'province', 'district', 'ward', 'street'));
    }

    public function vn_payments(Request $request)
    {
        // Xử lý thanh toán với VNPay
        error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = route('vn.payments.callback'); // URL callback sau khi thanh toán
        $vnp_TmnCode = "W1GGPIQA"; // Mã website tại VNPAY
        $vnp_HashSecret = "CTYDAV3MTLPIW459EQGANU6WOTT92Y2M"; // Chuỗi bí mật

        $vnp_TxnRef = $request->input('order_id', '12376'); // Mã đơn hàng
        $vnp_OrderInfo = $request->input('order_desc', 'Thanh toán đơn hàng tại web');
        $vnp_OrderType = $request->input('order_type', 'billpayment');
        $vnp_Amount = $request->input('amount', 20000) * 100;
        $vnp_Locale = $request->input('language', 'vn');
        $vnp_BankCode = $request->input('bank_code', 'NCB');
        $vnp_IpAddr = $request->ip();

        $vnp_ExpireDate = $request->input('txtexpire');
        $vnp_Bill_Mobile = $request->input('txt_billing_mobile');
        $vnp_Bill_Email = $request->input('txt_billing_email');
        $fullName = trim($request->input('txt_billing_fullname'));
        if (!empty($fullName)) {
            $name = explode(' ', $fullName);
            $vnp_Bill_FirstName = array_shift($name);
            $vnp_Bill_LastName = array_pop($name);
        }
        $vnp_Bill_Address = $request->input('txt_inv_addr1');
        $vnp_Bill_City = $request->input('txt_bill_city');
        $vnp_Bill_Country = $request->input('txt_bill_country');
        $vnp_Bill_State = $request->input('txt_bill_state');
        $vnp_Inv_Phone = $request->input('txt_inv_mobile');
        $vnp_Inv_Email = $request->input('txt_inv_email');
        $vnp_Inv_Customer = $request->input('txt_inv_customer');
        $vnp_Inv_Address = $request->input('txt_inv_addr1');
        $vnp_Inv_Company = $request->input('txt_inv_company');
        $vnp_Inv_Taxcode = $request->input('txt_inv_taxcode');
        $vnp_Inv_Type = $request->input('cbo_inv_type');

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

        if (!empty($vnp_BankCode)) {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (!empty($vnp_Bill_State)) {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        ksort($inputData);
        $hashData = "";
        foreach ($inputData as $key => $value) {
            $hashData .= urlencode($key) . "=" . urlencode($value) . '&';
        }
        $hashData = rtrim($hashData, '&');

        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);

        $vnp_Url .= "?" . $hashData . '&vnp_SecureHash=' . $secureHash;

        return redirect($vnp_Url);
    }

    public function vn_payments_callback(Request $request)
    {
        $vnp_HashSecret = "CTYDAV3MTLPIW459EQGANU6WOTT92Y2M"; // Chuỗi bí mật

        $inputData = $request->all();
        $vnp_SecureHash = $inputData['vnp_SecureHash'];
        unset($inputData['vnp_SecureHash']);

        ksort($inputData);
        $hashData = "";
        foreach ($inputData as $key => $value) {
            $hashData .= urlencode($key) . "=" . urlencode($value) . '&';
        }
        $hashData = rtrim($hashData, '&');

        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);

        if ($secureHash == $vnp_SecureHash) {
            // Thanh toán thành công, xử lý đơn hàng tại đây
            return redirect('http://127.0.0.1:8000/pay')->with('success', 'Thanh toán thành công!');
        } else {
            // Thanh toán thất bại
            return redirect('http://127.0.0.1:8000/pay')->with('error', 'Thanh toán thất bại!');
        }
    }
}
