<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/txn', function(){
    $query = DB::table('tin')
    ->select('id', 'tieuDe', 'xem')
    ->orderBy('xem', 'desc')
    ->limit(10);
    $data = $query->get();
    foreach($data as $tin) echo "<table border='1'>
    
        <tr>
            <td>{$tin->tieuDe}</td>
        </tr>
    </table>
    ";
});
Route::get('/tinmoi', function(){
    $query = DB::table('tin')
    ->select('id', 'tieuDe', 'ngayDang')
    ->orderBy('ngayDang', 'desc')
    ->limit(10);
    $data = $query->get();
    return view('tinmoi', ['data'=>$data]);
});
Route::get('/tintrongloai/{id}', function($id){
    $query = DB::table('tin')
    ->select('id', 'tieuDe', 'tomTat')
    ->where('id' , $id)
    ->orderBy('ngayDang', 'desc');
    $data = $query->get();
    return view('tintrongloai', compact('data'));   
});
Route::get('/tin/{id}', function($id){
    $tin = DB::table('tin')
    ->where('id', $id)
    ->first();
    return view('chitiettin', ['tin'=>$tin]);
});
