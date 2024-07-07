<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    public function index()
    {
        $orderDetails = OrderDetail::all();
        return view('admin.order_detail.index', compact('orderDetails'));
    }

    public function create()
    {
        return view('admin.order_detail.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        $orderDetail = OrderDetail::create($request->all());
        return redirect()->route('admin.order-details.index')->with('success', 'Order Detail created successfully.');
    }

    public function show(OrderDetail $orderDetail)
    {
        return view('admin.order_detail.show', compact('orderDetail'));
    }

    public function edit(OrderDetail $orderDetail)
    {
        return view('admin.order_detail.edit', compact('orderDetail'));
    }

    public function update(Request $request, OrderDetail $orderDetail)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        $orderDetail->update($request->all());
        return redirect()->route('admin.order-details.index')->with('success', 'Order Detail updated successfully.');
    }

    public function destroy(OrderDetail $orderDetail)
    {
        $orderDetail->delete();
        return redirect()->route('admin.order-details.index')->with('success', 'Order Detail deleted successfully.');
    }
}
