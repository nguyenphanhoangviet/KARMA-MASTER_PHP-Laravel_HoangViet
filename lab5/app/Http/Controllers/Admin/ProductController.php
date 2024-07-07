<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Color;
use App\Models\Brand;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $colors = Color::all();
        $brands = Brand::all();
        return view('admin.product.create', compact('categories', 'colors', 'brands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'img' => 'nullable|mimes:jpeg,png,jpg,gif,svg,avif|max:2048',
            'category_id' => 'required|exists:categories,id',
            'color_id' => 'nullable|exists:colors,id',
            'brand_id' => 'required|exists:brands,id',
        ]);

        $product = new Product($request->all());

        if ($request->hasFile('img')) {
            $imageName = time() . '.' . $request->img->extension();
            $request->img->move(public_path('imgs/products'), $imageName);
            $product->img = $imageName;
        }

        $product->save();

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        return view('admin.product.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $colors = Color::all();
        $brands = Brand::all();
        return view('admin.product.edit', compact('product', 'categories', 'colors', 'brands'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'img' => 'nullable|mimes:jpeg,png,jpg,gif,svg,avif|max:2048',
            'category_id' => 'required|exists:categories,id',
            'color_id' => 'nullable|exists:colors,id',
            'brand_id' => 'required|exists:brands,id',
        ]);

        $data = $request->all();

        if ($request->hasFile('img')) {
            if ($product->img && file_exists(public_path('imgs/products/' . $product->img))) {
                unlink(public_path('imgs/products/' . $product->img));
            }

            $imageName = time() . '.' . $request->img->extension();
            $request->img->move(public_path('imgs/products'), $imageName);
            $data['img'] = $imageName;
        } else {
            $data['img'] = $product->img;
        }

        $product->update($data);

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        if ($product->img && file_exists(public_path('imgs/products/' . $product->img))) {
            unlink(public_path('imgs/products/' . $product->img));
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }
}
