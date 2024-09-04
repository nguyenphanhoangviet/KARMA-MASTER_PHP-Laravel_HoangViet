<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoginStat; // Thay đổi nếu tên model khác

class StatController extends Controller
{
    public function getLoginCountForToday()
    {
        $today = now()->toDateString();
        $loginStat = LoginStat::where('date', $today)->first();
        return $loginStat ? $loginStat->login_count : 0;
    }

    public function showDailyLoginStats()
    {
        $loginCount = $this->getLoginCountForToday();
        dd($loginCount); // Hiển thị giá trị của $loginCount
        return view('admin.dashboard', compact('loginCount'));
    }
}
