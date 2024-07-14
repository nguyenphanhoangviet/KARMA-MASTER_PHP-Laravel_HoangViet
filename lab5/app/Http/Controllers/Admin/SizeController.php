<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sizes = Size::paginate(10); // Phân trang để sử dụng {{ $sizes->links() }}
        return view('admin.sizes.index', compact('sizes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sizes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Size::create($request->only('name'));

        return redirect()->route('admin.sizes.index')
                         ->with('success', 'Size created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Size $size)
    {
        return view('admin.sizes.show', compact('size'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Size $size)
    {
        return view('admin.sizes.edit', compact('size'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Size $size)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $size->update($request->only('name'));

        return redirect()->route('admin.sizes.index')
                         ->with('success', 'Size updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Size $size)
    {
        $size->delete();

        return redirect()->route('admin.sizes.index')
                         ->with('success', 'Size deleted successfully.');
    }
}
