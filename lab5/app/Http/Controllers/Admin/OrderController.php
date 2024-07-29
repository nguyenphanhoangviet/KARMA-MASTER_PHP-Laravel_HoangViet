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
        $orders = Order::paginate(10); // Phân trang với 10 mục mỗi trang   
        return view('admin.order.index', compact('orders'));
    }

    public function create()
    {
        return view('admin.order.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'cart_data' => 'required', // Assuming cart_data is a JSON string or array
            'shipping_fee' => 'required|numeric',
            'address' => 'required|string',
            'province' => 'required|string',
            'district' => 'required|string',
            'ward' => 'required|string',
            'street' => 'required|string',
            'total' => 'required|numeric',
            'payment_method' => 'required|string'
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
            'payment_method' => $request->input('payment_method') // Thêm cột payment_method
        ]);

        return redirect()->route('admin.orders.index')->with('success', 'Order created successfully.');
    }

    public function show(Order $order)
    {
        return view('admin.order.show', compact('order'));
    }

    public function edit(Order $order)
    {
        return view('admin.order.edit', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'cart_data' => 'required', // Assuming cart_data is a JSON string or array
            'shipping_fee' => 'required|numeric',
            'address' => 'required|string',
            'province' => 'required|string',
            'district' => 'required|string',
            'ward' => 'required|string',
            'street' => 'required|string',
            'total' => 'required|numeric',
            'payment_method' => 'required|string'
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
