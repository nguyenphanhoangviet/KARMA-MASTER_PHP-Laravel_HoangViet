<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with('user', 'product')->paginate(10); // Sử dụng paginate và eager load các quan hệ
        return view('admin.reviews.index', compact('reviews'));
    }

    public function create()
    {
        $products = Product::all(); // Lấy tất cả các sản phẩm
        $users = User::all(); // Lấy tất cả các người dùng
        return view('admin.reviews.create', compact('products', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'user_id' => 'required|exists:users,id',
            'phone' => 'required|string|max:15',
            'review' => 'required|string',
            'star' => 'required|integer|min:1|max:5', // Validate cho cột star
        ]);

        $data = $request->except('_token');

        Review::create($data);

        return redirect()->route('admin.reviews.index')->with('success', 'Review created successfully.');
    }

    public function show(Review $review)
    {
        $review->load('user', 'product'); // Eager load các quan hệ
        return view('admin.reviews.show', compact('review'));
    }

    public function edit(Review $review)
    {
        $products = Product::all(); // Lấy tất cả các sản phẩm
        $users = User::all(); // Lấy tất cả các người dùng
        return view('admin.reviews.edit', compact('review', 'products', 'users'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,id',
            'user_id' => 'required|exists:users,id',
            'phone' => 'required|string|max:15',
            'review' => 'required|string',
            'star' => 'required|integer|min:1|max:5', // Validate cho cột star
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
