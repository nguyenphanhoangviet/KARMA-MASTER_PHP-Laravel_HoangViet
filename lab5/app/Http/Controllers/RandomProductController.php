<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Review;
use Illuminate\Http\Request;

class RandomProductController extends Controller
{
    public function index()
    {
        // Lấy 8 sản phẩm ngẫu nhiên
        $randomProducts1 = Product::inRandomOrder()->take(8)->get();
        // Lấy 8 sản phẩm ngẫu nhiên khác
        $randomProducts2 = Product::inRandomOrder()->take(8)->get();
        // Lấy 2 sản phẩm ngẫu nhiên khác
        $randomProducts3 = Product::inRandomOrder()->take(2)->get();
        // Trả về view và truyền dữ liệu sản phẩm
        return view('user.karma-master.index', compact('randomProducts1', 'randomProducts2', 'randomProducts3'));
    }

    public function showSingleProduct($id)
    {
        // Lấy sản phẩm theo ID
        // Lấy sản phẩm theo ID cùng với các đánh giá của nó
        $product = Product::with('reviews')->findOrFail($id);

        // Trả về view và truyền dữ liệu sản phẩm
        return view('user.karma-master.single-product', compact('product'));
    }

    public function storeSingleProduct(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'number' => 'required|string|max:15',
            'message' => 'required|string',
            'star' => 'required|integer|min:1|max:5',
        ]);

        Review::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->number,
            'review' => $request->message,
            'star' => $request->star,
            'product_id' => $id, // sử dụng $id từ route
        ]);

        return redirect()->route('single-product', ['id' => $id])->with('success', 'Review submitted successfully.');
    }

    public function category(Request $request)
    {
        $query = Product::query();

        if ($request->has('category')) {
            $query->where('category_id', $request->category);
        }

        if ($request->has('brand')) {
            $query->where('brand_id', $request->brand);
        }

        if ($request->has('color')) {
            $query->where('color_id', $request->color);
        }

        $itemsPerPage = $request->input('itemsPerPage', 10); // Default to 10 if not set
        $products = $query->paginate($itemsPerPage);

        $categories = Category::all();
        $brands = Brand::all();
        $colors = Color::all();

        // Trả về view và truyền dữ liệu sản phẩm
        return view('user.karma-master.category', compact('categories', 'brands', 'colors', 'products', 'itemsPerPage'));
    }

    public function showCategory($id)
    {
        $categories = Category::all();
        $category = Category::with('products')->findOrFail($id);
        $products = $category->products()->paginate(6);
        return view('user.karma-master.category', compact('categories', 'category', 'products'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('name', 'LIKE', "%$query%")
            ->orWhere('description', 'LIKE', "%$query%")
            ->paginate(10);

        return view('user.karma-master.category', compact('products', 'query'));
    }
}
