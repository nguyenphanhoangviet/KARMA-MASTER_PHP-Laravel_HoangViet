<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
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
        $phone = $request->input('phone');
        // dd($phone);

        if (is_null($cartData) || is_null($shippingFee) || is_null($address) || is_null($province) || is_null($district) || is_null($ward) || is_null($street) || is_null($phone)) {
            return redirect()->route('cart.index')->with('error', 'Vui lòng nhập đầy đủ thông tin địa chỉ.');
        }

        return view('user.karma-master.pay', compact('cartData', 'shippingFee', 'address', 'province', 'district', 'ward', 'street', 'total' ,'phone'));
    }

    public function storeOrder(Request $request, $paymentMethod)
    {
        // dd($request);
        $request->validate([
            'cart' => 'required',
            'shipping_fee' => 'required|numeric',
            'address' => 'nullable|string',
            'province' => 'required|string',
            'district' => 'required|string',
            'ward' => 'required|string',
            'street' => 'required|string',
            'total' => 'required|numeric',
            'phone' => 'required|string'
            // 'expiry_date' => 'nullable|string',
            // 'bank' => 'nullable|string',
            // 'cvv' => 'nullable|string',
            // 'email' => 'nullable|email',
            // 'city' => 'nullable|string',
            // 'card_type' => 'nullable|string',
        ]);

        // Cung cấp giá trị mặc định nếu 'address' là null
        $address = $request->input('address', 'Địa chỉ không xác định');

        // Lưu thông tin vào bảng orders
        $order = Order::create([
            'user_id' => Auth::id(), // Lấy user_id từ Auth
            'shipping_fee' => $request->input('shipping_fee'),
            'address' => $address,
            'province' => $request->input('province'),
            'district' => $request->input('district'),
            'ward' => $request->input('ward'),
            'phone' => $request->input('phone'),
            'street' => $request->input('street'),
            'total' => $request->input('total'),
            'payment_method' => $paymentMethod,
            'payment_status' =>  "Chưa Thanh Toán"
            // 'cart_data' => $request->input('cart') // Cung cấp giá trị cho trường cart_data
        ]);

        $cartData = $request->input('cart');
        // dd($cartData);
        // Nếu cartData là chuỗi, cố gắng chuyển đổi nó thành mảng
        if (is_string($cartData)) {
            $cartData = json_decode($cartData, true); // true để trả về mảng thay vì đối tượng
        }

        // Kiểm tra xem cartData có phải là mảng hoặc đối tượng không
        if (is_array($cartData) || is_object($cartData)) {
            foreach ($cartData as $item) {
                // Kiểm tra và chuyển đổi giá trị size nếu cần
                $size = is_string($item['size']) ? $item['size'] : (string)$item['size'];

                // Kiểm tra và đảm bảo giá trị image là chuỗi
                $image = is_string($item['img']) ? $item['img'] : '';

                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => intval($item['product_id']),
                    'product_name' => $item['name'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                    'image' => $image, // Cung cấp giá trị cho thuộc tính image
                    'size' => $size,   // Cung cấp giá trị cho thuộc tính size
                ]);
            }
        } else {
            // Xử lý lỗi khi cartData không phải là mảng hoặc đối tượng
            return response()->json(['error' => 'Invalid cart data format.'], 400);
        }

        // Chuyển các dữ liệu không cần lưu vào cơ sở dữ liệu sang phương thức thanh toán
        if ($paymentMethod == 'vnpay') {
            return $this->vn_payments($request);
        } elseif ($paymentMethod == 'momo') {
            // dd('abc');
            $orderId = $order->id;
            return $this->momo_payments($request);
        } elseif ($paymentMethod == 'Thanh toán nhận hàng') {
            // dd('123');
            $orderId = $order->id;
            return $this->cashOnDelivery($request, $orderId);
        } else {
            return response()->json(['error' => 'Invalid payment method'], 400);
        }
    }

    public function vn_payments(Request $request)
    {
        error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = route('pay.vnpay.return');
        $vnp_TmnCode = "W1GGPIQA"; // Mã website tại VNPAY
        $vnp_HashSecret = "CTYDAV3MTLPIW459EQGANU6WOTT92Y2M"; // Chuỗi bí mật

        // dd($request);
        $vnp_TxnRef = Order::latest()->value('id'); // Mã đơn hàng
        $vnp_OrderInfo = $request->input('order_desc', 'Thanh toán đơn hàng tại web');
        $vnp_OrderType = $request->input('order_type', 'billpayment');
        $vnp_Amount = $request->input('total') * 100;
        $vnp_Locale = $request->input('language', 'vn');
        // $vnp_BankCode = $request->input('bank'); // Sử dụng 'bank' thay vì 'bank_code'
        // $cartType = $request->input('cart_type'); // Thêm biến cart_type vào đây
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
            'code' => '00',
            'message' => 'Thanh toán thành công',
            'data' => $vnp_Url
        );
        // dd($request);
        if (isset($_POST['total'])) {
            // dd('abc');
            header('Location: ' . $vnp_Url);
            die();
        } else {
            // dd('bcd');
            echo json_encode($returnData);
        }
    }

    public function handleVNPayReturn(Request $request)
    {
        // Lấy mã phản hồi từ VNPay
        // dd($request);
        $vnp_ResponseCode = $request->input('vnp_ResponseCode');
        $orderId = $request->input('vnp_TxnRef'); // Assuming this is how you get the order ID

        if ($vnp_ResponseCode == '00') {
            // Nếu thanh toán thành công

            // Cập nhật trạng thái thanh toán thành công trong cơ sở dữ liệu
            $order = Order::find($orderId);
            if ($order) {
                $order->payment_status = 'Giao dịch thành công'; // Hoặc trạng thái tương ứng
                $order->save();

                // Xóa giỏ hàng hoặc cập nhật số lượng
                // Nếu sử dụng session để lưu giỏ hàng
                $request->session()->forget('cart'); // Xóa giỏ hàng khỏi session

                // Hoặc cập nhật giỏ hàng theo nhu cầu
            }

            return view('payment.success', ['message' => 'Thanh toán thành công']);
        } else {
            $order = Order::find($orderId);
            if ($order) {
                $order->payment_status = 'Giao dịch thất bại'; // Hoặc trạng thái tương ứng
                $order->save();

                // Xóa giỏ hàng hoặc cập nhật số lượng

                // Hoặc cập nhật giỏ hàng theo nhu cầu
            }
            // Nếu thanh toán không thành công
            return view('payment.failure', ['message' => 'Thanh toán không thành công']);
        }
    }

    public function cashOnDelivery(Request $request, $orderId)
    {
        // dd($orderId);
        $orderId = $orderId;
        $order = Order::find($orderId);
        if ($order) {
            $order->payment_status = 'Giao dịch khi nhận hàng Thành Công'; // Hoặc trạng thái tương ứng
            $order->save();

            // Xóa giỏ hàng hoặc cập nhật số lượng
            // Nếu sử dụng session để lưu giỏ hàng
            $request->session()->forget('cart'); // Xóa giỏ hàng khỏi session

            // Hoặc cập nhật giỏ hàng theo nhu cầu
            return view('payment.success', ['message' => 'Thanh toán thành công']);
        } else {
            $order = Order::find($orderId);
            if ($order) {
                $order->payment_status = 'Giao dịch khi nhận hàng Thất Bại'; // Hoặc trạng thái tương ứng
                $order->save();

                // Xóa giỏ hàng hoặc cập nhật số lượng

                // Hoặc cập nhật giỏ hàng theo nhu cầu
            }
            // Nếu thanh toán không thành công
            return view('payment.failure', ['message' => 'Thanh toán không thành công']);
        }
    }

    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data)
            )
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }




    public function momo_payments(Request $request)
    {
        // dd('123');
        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';

        $orderInfo = "Thanh toán qua MoMo";
        $amount = "10000";
        $orderId = time() . "";
        $redirectUrl = route('pay.momo.return');
        $ipnUrl = route('pay.momo.return');
        $extraData = "";



        $partnerCode = $partnerCode;
        $accessKey = $accessKey;
        $serectkey = $secretKey;
        $orderId = $orderId; // Mã đơn hàng
        $orderInfo = $orderInfo;
        $amount = $amount;
        $ipnUrl = $ipnUrl;
        $redirectUrl = $redirectUrl;
        $extraData = $extraData;

        $requestId = time() . "";
        $requestType = "payWithATM";
        // $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
        //before sign HMAC SHA256 signature
        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $serectkey);
        $data = array(
            'partnerCode' => $partnerCode,
            'partnerName' => "Test",
            "storeId" => "MomoTestStore",
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature
        );
        $result = $this->execPostRequest($endpoint, json_encode($data));
        $jsonResult = json_decode($result, true);  // decode json

        //Just a example, please check more in there

        if (isset($jsonResult['payUrl'])) {
            return redirect()->away($jsonResult['payUrl']);
        } else {
            // Handle the case where payUrl is not returned
            return redirect()->back()->with('error', 'Không thể kết nối tới cổng thanh toán MoMo.');
        }
    }

    public function handleMOMOReturn(Request $request)
    {
        // dd('abc');
        $data = $request->all();

        if ($data['resultCode'] == 0) {
            $orderId=Order::latest()->value('id');
            // dd($orderId);
            $order = Order::find($orderId); // Find order using the orderId from the request
            // dd($order);
            if ($order) {
                $order->payment_status = 'Giao dịch thành công'; // Update payment status to "Giao dịch thành công"
                $order->save();

                // Clear the cart
                $request->session()->forget('cart'); // Clear cart from session
            }

            return view('payment.success', ['message' => 'Thanh toán thành công']);
        } else {
            $orderId=Order::latest()->value('id');
            // dd($orderId);
            $order = Order::find($orderId); // Find order using the orderId from the request

            if ($order) {
                $order->payment_status = 'Giao dịch thất bại'; // Update payment status to "Giao dịch thất bại"
                $order->save();
            }

            return view('payment.failure', ['message' => 'Thanh toán không thành công']);   
        }
    }
}
