<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\san_pham;
use App\Http\Resources\san_pham as San_phamResource;

class AdminSPController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listsp = san_pham::all();
        $data = San_phamResource::collection($listsp);
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $sp = san_pham::create($input);
        $data = new San_phamResource($sp);
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input = $request->all();
        $sp = san_pham::find($id);
        $sp->ten_sp = $input['ten_sp'];
        $sp->gia = $input['gia'];
        $sp->id_loai = $input['id_loai'];
        $sp->save();
        $data = new San_phamResource($sp);
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        san_pham::where('id', $id)->delete();
        return response()->json([], 204);
    }
}
