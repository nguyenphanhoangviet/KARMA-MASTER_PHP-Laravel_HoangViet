<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::paginate(10);
        return view('admin.brand.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.brand.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'img' => 'nullable|image|max:2048',
        ]);

        $brand = new Brand();
        $brand->name = $request->name;

        if ($request->hasFile('img')) {
            $imageName = time() . '.' . $request->img->extension();
            $request->img->move(public_path('imgs/brands'), $imageName);
            $brand->img = $imageName;
        }

        $brand->save();

        return redirect()->route('admin.brands.index')->with('success', 'Brand created successfully.');
    }

    public function show(Brand $brand)
    {
        return view('admin.brand.show', compact('brand'));
    }

    public function edit(Brand $brand)
    {
        return view('admin.brand.edit', compact('brand'));
    }

    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'img' => 'nullable|image|max:2048',
        ]);

        $brand->name = $request->name;

        if ($request->hasFile('img')) {
            // Xóa hình ảnh cũ nếu có
            if ($brand->img && File::exists(public_path('imgs/brands/' . $brand->img))) {
                File::delete(public_path('imgs/brands/' . $brand->img));
            }

            // Lưu hình ảnh mới
            $imageName = time() . '.' . $request->img->extension();
            $request->img->move(public_path('imgs/brands'), $imageName);
            $brand->img = $imageName;
        }

        $brand->save();

        return redirect()->route('admin.brands.index')->with('success', 'Brand updated successfully.');
    }

    public function destroy(Brand $brand)
    {
        // Xóa hình ảnh nếu có
        if ($brand->img && File::exists(public_path('imgs/brands/' . $brand->img))) {
            File::delete(public_path('imgs/brands/' . $brand->img));
        }

        $brand->delete();

        return redirect()->route('admin.brands.index')->with('success', 'Brand deleted successfully.');
    }
}
