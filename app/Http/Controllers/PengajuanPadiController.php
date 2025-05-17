<?php

namespace App\Http\Controllers;

use App\Models\Padi;
use Illuminate\Http\Request;

class PengajuanPadiController extends Controller
{
    public function info()
{
    return view('user.penjualan_padi.penjualanpadi');
}

public function penjualanView()
{
    $padiList = Padi::all(); // ambil semua data padi
    return view('user.penjualan_padi.penjualanpadi', compact('padiList'));
}

}
