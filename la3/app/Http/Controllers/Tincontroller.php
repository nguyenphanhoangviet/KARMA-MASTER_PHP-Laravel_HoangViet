<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Add this line to import the DB facade

class TinController extends Controller // Corrected the class name to follow PSR-4 conventions
{
    public function index()
    {
        return view("home");
    }

    public function chitiet($id = 0)
    {
        $tin = DB::table('tin')->where('id', $id)->first(); // Fetch data from the database
        $data = ['id' => $id, 'tin' => $tin];
        return view("chitiet", $data);
    }

    function tintrongloai($idLT=0){
        $listtin = DB::table('tin')->where('idLT', $idLT)->get();
        $data = ['idLT'=>$idLT, 'listtin'=>$listtin];
        return view("tintrongloai", $data);
        }
        
}
