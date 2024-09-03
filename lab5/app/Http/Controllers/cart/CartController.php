<?php

namespace App\Http\Controllers\cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CartService;
use App\Models\Product;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function addToCart(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1);
        $size = $request->input('size');
        $product = Product::find($productId);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found');
        }

        if (!$size) {
            return redirect()->route('single-product', ['id' => $productId])->with('error', 'Size is required');
        }

        $this->cartService->add($productId, $product->name, $quantity, $product->price, $product->img, $size);

        return redirect()->route('cart.index')->with('success', 'Product added to cart successfully!');
    }

    public function index()
    {
        $cart = $this->cartService->getCart();
        return view('user.karma-master.cart', compact('cart'));
    }

    public function remove(Request $request)
    {
        $productId = $request->input('product_id');
        $size = $request->input('size');
        $cartItemKey = $productId . '-' . $size;

        $this->cartService->remove($cartItemKey);

        return redirect()->route('cart.index');
    }

    public function update(Request $request)
    {
        $productId = $request->input('product_id');
        $size = $request->input('size');
        $cartItemKey = $productId . '-' . $size;
        $quantity = $request->input('quantity');

        // Đảm bảo số lượng không giảm xuống dưới 1
        if ($quantity < 1) {
            $quantity = 0;
        }

        $this->cartService->update($cartItemKey, $quantity);

        return redirect()->route('cart.index');
    }

    public function getShippingDetails($orderCode)
    {
        $client = new Client();
        $apiKey = 'YOUR_GHN_API_KEY'; // Thay thế bằng API key của bạn

        try {
            $response = $client->request('POST', 'https://online-gateway.ghn.vn/shiip/public-api/v2/shipping-order/detail', [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Token' => $apiKey,
                ],
                'json' => [
                    'order_code' => $orderCode,
                ]
            ]);

            $data = json_decode($response->getBody(), true);
            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function calculateShipping(Request $request)
    {
        $data = $request->all();
        // dd($request->phone);
        $curlData = [
            'pick_province' => "Hồ Chí Minh",
            'pick_district' => "Quận 4", // Thông tin quận lấy hàng
            'pick_ward' => "Phường 9", // Thông tin phường lấy hàng
            'pick_street' => "Đoàn Văn Bơ", // Tên đường lấy hàng
            'pick_address' => "152 Đoàn Văn Bơ Phường 9 Quận 4", // Địa chỉ chi tiết nơi lấy hàng
            'province' => $data['province'],
            'district' => $data['district'],
            'address' => $data['address'],
            'weight' => $data['weight'],
            'value' => $data['value'],
            'transport' => "road",
            'deliver_option' => "xteam",
            'tags' => [1]
        ];

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://services.giaohangtietkiem.vn/services/shipment/fee?" . http_build_query($curlData),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_HTTPHEADER => [
                "Token: 4e8183b8edfd94b705b802fb9e70e6ac8fc2d5a3",
            ],
        ]);

        $response = curl_exec($curl);
        curl_close($curl);

        $fee = json_decode($response, true);

        if (isset($fee['success']) && $fee['success']) {
            // dd($data);
            return back()->with([
                'shipping_fee' => $fee['fee']['fee'],
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
                'province' => $request->input('province'),
                'district' => $request->input('district'),
                'ward' => $request->input('ward'),
                'street' => $request->input('street'),
            ]);
        } else {
            // dd('abc');
            return back()->withErrors(['error' => 'Failed to calculate shipping fee']);
        }
    }
}
