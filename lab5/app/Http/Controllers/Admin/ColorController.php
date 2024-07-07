<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        $colors = Color::paginate(10);
        return view('admin.color.index', compact('colors'));
    }

    public function create()
    {
        return view('admin.color.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'hex_code' => 'nullable|string|max:50',
        ]);

        Color::create($request->all());

        return redirect()->route('admin.colors.index')->with('success', 'Color created successfully.');
    }

    public function show(Color $color)
    {
        return view('admin.color.show', compact('color'));
    }

    public function edit(Color $color)
    {
        return view('admin.color.edit', compact('color'));
    }

    public function update(Request $request, Color $color)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'hex_code' => 'nullable|string|max:50',
        ]);

        $color->update($request->all());

        return redirect()->route('admin.colors.index')->with('success', 'Color updated successfully.');
    }

    public function destroy(Color $color)
    {
        $color->delete();

        return redirect()->route('admin.colors.index')->with('success', 'Color deleted successfully.');
    }
}
