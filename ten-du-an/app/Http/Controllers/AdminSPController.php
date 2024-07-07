<?php

namespace App\Http\Controllers;

use App\Http\Resources\san_pham as SanPhamResource;
use Illuminate\Http\Request;
use App\Models\SanPham;

class AdminSPController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $input = SanPham::all();
        return response()->json(SanPhamResource::collection($input), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $sp = SanPham::create($input);
        $data = new SanPhamResource($sp);
        return response()->json($data , 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sp = SanPham::find($id);

        if (is_null($sp)) {
            return response()->json(['message' => 'SanPham not found'], 404);
        }

        $data = new SanPhamResource($sp);
        return response()->json($data, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input = $request->all();
        $sp = SanPham::find($input);
        $sp->ten_sp = $input['ten_sp'];
        $sp->gia = $input['gia'];
        $sp->id_loai = $input['id_loai'];
        $sp->save();
        $data = new SanPhamResource($sp);
        return response()->json($data , 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        SanPham::where('id' , $id)->delete();
        return response()->json([] , 204);
    }
}
