<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('orderDetails')->paginate(10);
        return view('admin.order.index', compact('orders'));
    }

    public function create()
    {
        $users = User::all();
        return view('admin.order.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'shipping_fee' => 'required|numeric',
            'address' => 'required|string',
            'province' => 'required|string',
            'district' => 'required|string',
            'ward' => 'required|string',
            'street' => 'required|string',
            'payment_method' => 'required|string',
            'phone' => 'required|string',
            'payment_status' => 'required|string'
        ]);

        // Tạo đơn hàng với giá trị total là 0
        $order = Order::create([
            'user_id' => Auth::id(),
            'shipping_fee' => $request->input('shipping_fee'),
            'address' => $request->input('address'),
            'province' => $request->input('province'),
            'district' => $request->input('district'),
            'ward' => $request->input('ward'),
            'street' => $request->input('street'),
            'payment_method' => $request->input('payment_method'),
            'phone' => $request->input('phone'),
            'payment_status' => $request->input('payment_status'),
            'total' => 0 // Đặt total là 0 ban đầu
        ]);

        // Tính tổng số tiền từ chi tiết đơn hàng
        $total = 0;
        foreach ($order->orderDetails as $orderDetail) {
            $total += $orderDetail->quantity * $orderDetail->price;
        }

        // Cập nhật tổng số tiền với phí vận chuyển
        $total += $request->input('shipping_fee');
        $order->update(['total' => $total]);

        return redirect()->route('admin.orders.index')->with('success', 'Order created successfully.');
    }

    public function show($id)
    {
        $order = Order::with('user', 'orderDetails')->find($id);

        if (!$order) {
            return redirect()->back()->with('error', 'Order not found.');
        }

        return view('admin.order.show', compact('order'));
    }

    public function edit(Order $order)
    {
        $users = User::all();
        return view('admin.order.edit', compact('order', 'users'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'shipping_fee' => 'required|numeric',
            'address' => 'required|string',
            'province' => 'required|string',
            'district' => 'required|string',
            'ward' => 'required|string',
            'street' => 'required|string',
            'payment_method' => 'required|string',
            'phone' => 'required|string',
            'payment_status' => 'required|string'
        ]);

        // Cập nhật đơn hàng
        $order->update([
            'shipping_fee' => $request->input('shipping_fee'),
            'address' => $request->input('address'),
            'province' => $request->input('province'),
            'district' => $request->input('district'),
            'ward' => $request->input('ward'),
            'street' => $request->input('street'),
            'payment_method' => $request->input('payment_method'),
            'phone' => $request->input('phone'),
            'payment_status' => $request->input('payment_status')
        ]);

        // Tính tổng số tiền từ chi tiết đơn hàng
        $total = 0;
        foreach ($order->orderDetails as $orderDetail) {
            $total += $orderDetail->quantity * $orderDetail->price;
        }

        // Cập nhật tổng số tiền với phí vận chuyển
        $total += $request->input('shipping_fee');
        $order->update(['total' => $total]);

        return redirect()->route('admin.orders.index')->with('success', 'Order updated successfully.');
    }


    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('admin.orders.index')->with('success', 'Order deleted successfully.');
    }
}
