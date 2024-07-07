<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Http\Resources\san_pham as SanPhamResource;

class SanPhamController extends Controller
{
    function index(){
        $listsp = SanPham::all();
        $data = SanPhamResource::collection($listsp);
        return response()->json($data);
    }
    function chitiet($id = 0){
        $sp = SanPham::findOrFail($id);
        $data = new SanPhamResource($sp);
        return response()->json($data);
    }
    function sp_trong_loai($id = 0){
        $listsp = SanPham::where('id_loai' , $id)->orderBy('id','desc')->get();
        $data =  SanPhamResource::collection($listsp);
        return response()->json($data);
    }
}

