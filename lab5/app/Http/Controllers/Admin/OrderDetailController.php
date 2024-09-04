<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use App\Models\Product; // Thêm dòng này
use App\Models\Order;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    public function index()
    {
        $orderDetails = OrderDetail::paginate(10);
        return view('admin.order_detail.index', compact('orderDetails'));
    }

    public function create()
    {
        // Lấy tất cả các đơn hàng và sản phẩm
        $orders = Order::all();
        $products = Product::all();

        // Truyền dữ liệu đến view
        return view('admin.order_detail.create', compact('orders', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer',
            'size' => 'required|string',
        ]);

        $product = Product::find($request->product_id);

        $orderDetail = OrderDetail::create([
            'order_id' => $request->order_id,
            'product_id' => $request->product_id,
            'product_name' => $product->name,
            'price' => $product->price,
            'image' => $product->img,
            'quantity' => $request->quantity,
            'size' => $request->size,
        ]);

        // Cập nhật tổng số tiền của đơn hàng
        $order = Order::find($request->order_id);
        $total = 0;
        foreach ($order->orderDetails as $orderDetail) {
            $total += $orderDetail->quantity * $orderDetail->price;
        }

        // Cập nhật tổng số tiền với phí vận chuyển
        $total += $order->shipping_fee;
        $order->update(['total' => $total]);

        return redirect()->route('admin.order-details.index')->with('success', 'Order Detail created successfully.');
    }

    public function show(OrderDetail $orderDetail)
    {
        return view('admin.order_detail.show', compact('orderDetail'));
    }

    public function edit(OrderDetail $orderDetail)
    {
        // Lấy tất cả các đơn hàng và sản phẩm
        $orders = Order::all();
        $products = Product::all();

        // Truyền dữ liệu đến view
        return view('admin.order_detail.edit', compact('orderDetail', 'orders', 'products'));
    }

    public function update(Request $request, OrderDetail $orderDetail)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer',
            'size' => 'required|string',
        ]);

        $product = Product::find($request->product_id);

        $orderDetail->update([
            'product_id' => $request->product_id,
            'product_name' => $product->name,
            'price' => $product->price,
            'image' => $product->img,
            'quantity' => $request->quantity,
            'size' => $request->size,
        ]);

        // Cập nhật tổng số tiền của đơn hàng
        $order = Order::find($request->order_id);
        $total = 0;
        foreach ($order->orderDetails as $orderDetail) {
            $total += $orderDetail->quantity * $orderDetail->price;
        }
        // dd($order->shipping_fee);
        // Cập nhật tổng số tiền với phí vận chuyển
        $total += $order->shipping_fee;
        $order->update(['total' => $total]);

        return redirect()->route('admin.order-details.index')->with('success', 'Order Detail updated successfully.');
    }


    public function destroy(OrderDetail $orderDetail)
    {
        $orderDetail->delete();
        return redirect()->route('admin.order-details.index')->with('success', 'Order Detail deleted successfully.');
    }
}
