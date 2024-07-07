<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\san_pham;
use App\Http\Resources\san_pham as San_phamResource;

class SanPhamController extends Controller
{
    function index() {
        $listsp = san_pham::all();
        $data = San_phamResource::collection($listsp);
        return response()->json($data);
    }
    function chitiet($id = 0) {
        $sp = san_pham::findOrFail($id);
        $data = new San_phamResource($sp);
        return response()->json($data);
    }
    function sp_trong_loai($id = 0) {
        $listsp = san_pham::where('id_loai', $id)->orderBy('id', 'desc')->get();
        $data = San_phamResource::collection($listsp);
        return response()->json($data);
    }
}
