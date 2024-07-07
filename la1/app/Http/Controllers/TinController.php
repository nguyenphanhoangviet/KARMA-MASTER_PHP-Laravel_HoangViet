<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TinController extends Controller
{
    public function index(){
        echo "Đây là trang index";
        return view('index');
    }

    public function lienhe(){
        echo "Đây là trang liên hệ";
        return view('lienhe');
    }

    public function lay1tin($id)
    {
        // Giả sử lấy dữ liệu tin tức từ database hoặc mô phỏng dữ liệu
        $data = ['id' => $id, 'title' => 'Tiêu đề tin', 'content' => 'Nội dung tin tức'];

        // Truyền dữ liệu vào view
        return view('chitiet', ['tin' => $data]);
    }
}
