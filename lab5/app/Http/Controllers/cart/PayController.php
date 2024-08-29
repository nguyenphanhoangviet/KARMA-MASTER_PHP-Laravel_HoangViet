<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PayController extends Controller
{
    public function index(Request $request)
    {
        $cartData = $request->input('cart');
        $shippingFee = $request->input('shipping_fee');
        $address = $request->input('address');
        $province = $request->input('province');
        $district = $request->input('district');
        $ward = $request->input('ward');
        $street = $request->input('street');
        $total = $request->input('total');

        if (is_null($cartData) || is_null($shippingFee) || is_null($address) || is_null($province) || is_null($district) || is_null($ward) || is_null($street)) {
            return redirect()->route('cart.index')->with('error', 'Vui lòng nhập đầy đủ thông tin địa chỉ.');
        }

        return view('user.karma-master.pay', compact('cartData', 'shippingFee', 'address', 'province', 'district', 'ward', 'street', 'total'));
    }

    public function storeOrder(Request $request, $paymentMethod)
{
    $request->validate([
        'cart' => 'required',
        'shipping_fee' => 'required|numeric',
        'address' => 'nullable|string',
        'province' => 'required|string',
        'district' => 'required|string',
        'ward' => 'required|string',
        'street' => 'required|string',
        'total' => 'required|numeric',
        'expiry_date' => 'nullable|string',
        'bank' => 'nullable|string',
        'cvv' => 'nullable|string',
        'email' => 'nullable|email',
        'city' => 'nullable|string',
        'card_type' => 'nullable|string',
    ]);

    // Cung cấp giá trị mặc định nếu 'address' là null
    $address = $request->input('address', 'Địa chỉ không xác định');

    $order = Order::create([
        'user_id' => Auth::id(), // Lấy user_id từ Auth
        'cart_data' => $request->input('cart'),
        'shipping_fee' => $request->input('shipping_fee'),
        'address' => $address,
        'province' => $request->input('province'),
        'district' => $request->input('district'),
        'ward' => $request->input('ward'),
        'street' => $request->input('street'),
        'total' => $request->input('total'),
        'payment_method' => $paymentMethod
    ]);

    // Chuyển các dữ liệu không cần lưu vào cơ sở dữ liệu sang phương thức thanh toán
    if ($paymentMethod == 'vnpay') {
        return $this->vn_payments($request);
    } elseif ($paymentMethod == 'momo') {
        return $this->momo_payments($request);
    } elseif ($paymentMethod == 'paypal') {
        // return $this->paypal_payments($request);
    } else {
        return response()->json(['error' => 'Invalid payment method'], 400);
    }
}

    public function showPaymentForm(Request $request, $paymentMethod)
    {
        $cartData = $request->input('cart');
        $shippingFee = $request->input('shipping_fee');
        $address = $request->input('address');
        $province = $request->input('province');
        $district = $request->input('district');
        $ward = $request->input('ward');
        $street = $request->input('street');
        $total = $request->input('total');
        return view('user.karma-master.payment-info', compact('paymentMethod','cartData', 'shippingFee', 'address', 'province', 'district', 'ward', 'street', 'total'));
    }




    public function vn_payments(Request $request)
    {
        error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = 'http://127.0.0.1:8000/pay/pay'; // URL callback sau khi thanh toán
        $vnp_TmnCode = "W1GGPIQA"; // Mã website tại VNPAY
        $vnp_HashSecret = "CTYDAV3MTLPIW459EQGANU6WOTT92Y2M"; // Chuỗi bí mật

        $vnp_TxnRef = Order::latest()->value('id'); // Mã đơn hàng
        $vnp_OrderInfo = $request->input('order_desc', 'Thanh toán đơn hàng tại web');
        $vnp_OrderType = $request->input('order_type', 'billpayment');
        $vnp_Amount = $request->input('total') * 100;
        $vnp_Locale = $request->input('language', 'vn');
        $vnp_BankCode = $request->input('bank_code', 'Techcombank');
        $vnp_IpAddr = $request->ip();

        // $vnp_ExpireDate = $request->input('txtexpire');
        // $vnp_Bill_Mobile = $request->input('txt_billing_mobile');
        // $vnp_Bill_Email = $request->input('txt_billing_email');
        // $fullName = trim($request->input('txt_billing_fullname'));

        // $vnp_Bill_FirstName = '';
        // $vnp_Bill_LastName = '';

        // if (!empty($fullName)) {
        //     $name = explode(' ', $fullName);
        //     $vnp_Bill_FirstName = array_shift($name);
        //     $vnp_Bill_LastName = array_pop($name);
        // }

        // $vnp_Bill_Address = $request->input('txt_inv_addr1');
        // $vnp_Bill_City = $request->input('txt_bill_city');
        // $vnp_Bill_Country = $request->input('txt_bill_country');
        // $vnp_Bill_State = $request->input('txt_bill_state');
        // $vnp_Inv_Phone = $request->input('txt_inv_mobile');
        // $vnp_Inv_Email = $request->input('txt_inv_email');
        // $vnp_Inv_Customer = $request->input('txt_inv_customer');
        // $vnp_Inv_Address = $request->input('txt_inv_addr1');
        // $vnp_Inv_Company = $request->input('txt_inv_company');
        // $vnp_Inv_Taxcode = $request->input('txt_inv_taxcode');
        // $vnp_Inv_Type = $request->input('cbo_inv_type');

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
            // "vnp_ExpireDate" => $vnp_ExpireDate,
            // "vnp_Bill_Mobile" => $vnp_Bill_Mobile,
            // "vnp_Bill_Email" => $vnp_Bill_Email,
            // "vnp_Bill_FirstName" => $vnp_Bill_FirstName,
            // "vnp_Bill_LastName" => $vnp_Bill_LastName,
            // "vnp_Bill_Address" => $vnp_Bill_Address,
            // "vnp_Bill_City" => $vnp_Bill_City,
            // "vnp_Bill_Country" => $vnp_Bill_Country,
            // "vnp_Inv_Phone" => $vnp_Inv_Phone,
            // "vnp_Inv_Email" => $vnp_Inv_Email,
            // "vnp_Inv_Customer" => $vnp_Inv_Customer,
            // "vnp_Inv_Address" => $vnp_Inv_Address,
            // "vnp_Inv_Company" => $vnp_Inv_Company,
            // "vnp_Inv_Taxcode" => $vnp_Inv_Taxcode,
            // "vnp_Inv_Type" => $vnp_Inv_Type
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
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array(
            'code' => '00', 'message' => 'success', 'data' => $vnp_Url
        );
        // dd($request);
        if (isset($_POST['total'])) {
            // dd('abc');
            header('Location: ' . $vnp_Url);
            die();
        } else {
            dd('bcd');
            echo json_encode($returnData);
        }
    }





    public function momo_payments()
    {
    }
}
