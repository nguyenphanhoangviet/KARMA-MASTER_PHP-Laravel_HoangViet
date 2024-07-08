<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Models\Product;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::paginate(10); // Sử dụng paginate thay vì all hoặc get
        $products = Product::all();
        return view('admin.reviews.index', compact('reviews', 'products'));
    }

    public function create()
    {
        $products = Product::all(); // Lấy tất cả các sản phẩm
        return view('admin.reviews.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'review' => 'required|string',
        ]);

        $data = $request->except('_token');

        Review::create($data);

        return redirect()->route('admin.reviews.index')->with('success', 'Review created successfully.');
    }

    public function show(Review $review)
    {
        return view('admin.reviews.show', compact('review'));
    }

    public function edit(Review $review)
    {
        $products = Product::all(); // Lấy tất cả các sản phẩm
        return view('admin.reviews.edit', compact('review', 'products'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:15',
            'review' => 'required|string',
            'product_id' => 'required|exists:products,id',
        ]);

        $review = Review::findOrFail($id);
        $review->update($validatedData);

        return redirect()->route('admin.reviews.index')->with('success', 'Review updated successfully.');
    }

    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->route('admin.reviews.index')->with('success', 'Review deleted successfully.');
    }
}
