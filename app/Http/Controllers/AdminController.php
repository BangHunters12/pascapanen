<?php

namespace App\Http\Controllers;

use App\Models\Petani;
use App\Models\ProduksiBeras;
use Illuminate\Http\Request;
use NumberFormatter;

class AdminController extends Controller
{
    public function index()
    {
        // dd(Petani::currentMonth());
        return view('admin.dashboard',[
            "petani" => ["Total" => Petani::count(),'CurrentMonth'=>Petani::currentMonth(),'LastMonth'=>Petani::lastMonth()],
            "penjualan"=> ["Total" => '-'],
            "produksiBeras" => ["TotalBerat"=>ProduksiBeras::sum(column: 'jumlah_beras')],
            'pendapatan'=>["Total"=>'-']

        ]);
    }
}
