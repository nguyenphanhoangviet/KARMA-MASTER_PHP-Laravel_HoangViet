<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,jpg,gif|max:2048',
            'publisher' => 'required|string|max:255',
        ]);

        // Lưu tệp hình ảnh vào đường dẫn cụ thể
        $imageName = time() . '.' . $request->image->extension();  
        $request->image->move(public_path('img'), $imageName);

        // Tạo bản ghi mới trong cơ sở dữ liệu với đường dẫn ảnh
        Book::create([
            'title' => $request->title,
            'price' => $request->price,
            'image' => 'img/' . $imageName,
            'publisher' => $request->publisher,
        ]);

        return redirect()->back()->with('success', 'Sách đã được thêm thành công!');
    }

    public function index()
    {
        $books = Book::all();
        return view('index', compact('books'));
    }
}
