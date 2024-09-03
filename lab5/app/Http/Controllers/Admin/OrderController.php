<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        // Phân trang với 10 mục mỗi trang
        $orders = Order::paginate(10);   
        return view('admin.order.index', compact('orders'));
    }

    public function create()
    {
        return view('admin.order.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'cart_data' => 'required', // Giả sử cart_data là chuỗi JSON hoặc mảng
            'shipping_fee' => 'required|numeric',
            'address' => 'required|string',
            'province' => 'required|string',
            'district' => 'required|string',
            'ward' => 'required|string',
            'street' => 'required|string',
            'total' => 'required|numeric',
            'payment_method' => 'required|string',
            'phone' => 'required|string'
        ]);

        $order = Order::create([
            'user_id' => Auth::id(), // Lấy user_id từ Auth
            'cart_data' => $request->input('cart_data'),
            'shipping_fee' => $request->input('shipping_fee'),
            'address' => $request->input('address'),
            'province' => $request->input('province'),
            'district' => $request->input('district'),
            'ward' => $request->input('ward'),
            'street' => $request->input('street'),
            'total' => $request->input('total'),
            'payment_method' => $request->input('payment_method'),
            'phone' => $request->input('phone'), // Thêm cột phone
            'payment_status' => 'Chưa Thanh Toán' // Thiết lập trạng thái thanh toán mặc định
        ]);

        return redirect()->route('admin.orders.index')->with('success', 'Order created successfully.');
    }

    public function show($id)
    {
        // Sử dụng with('user') để load mối quan hệ user với order
        $order = Order::with('user')->find($id);

        // Kiểm tra nếu order không tồn tại
        if (!$order) {
            return redirect()->back()->with('error', 'Order not found.');
        }

        // Trả về view với dữ liệu order
        return view('admin.order.show', compact('order'));
    }

    public function edit(Order $order)
    {
        return view('admin.order.edit', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'cart_data' => 'required', // Giả sử cart_data là chuỗi JSON hoặc mảng
            'shipping_fee' => 'required|numeric',
            'address' => 'required|string',
            'province' => 'required|string',
            'district' => 'required|string',
            'ward' => 'required|string',
            'street' => 'required|string',
            'total' => 'required|numeric',
            'payment_method' => 'required|string',
            'phone' => 'required|string',
            'payment_status' => 'required|string' // Thêm validation cho payment_status
        ]);

        $order->update($request->all());

        return redirect()->route('admin.orders.index')->with('success', 'Order updated successfully.');
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('admin.orders.index')->with('success', 'Order deleted successfully.');
    }
}
