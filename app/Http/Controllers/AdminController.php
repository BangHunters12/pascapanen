<?php

namespace App\Http\Controllers;

use App\Models\Petani;
use App\Models\ProduksiBeras;
use App\helper\FirebaseHelper;
use App\Models\Padi;
use App\Models\PengajuanSewa;
use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use NumberFormatter;

class AdminController extends Controller
{
    public function index()
    {



        return view('admin.dashboard', [
            "petani" => ["Total" => Petani::count(), 'CurrentMonth' => Petani::currentMonth(), 'LastMonth' => Petani::lastMonth(), 'Gender' => Petani::gender()->get()],
            "penjualan" => ["Total" => '-'],
            "padi" => ["Total" => Padi::sum(column: 'stok'),'datas'=>Padi::lastSixMonths()->get()],
            'beras'=>['datas'=>ProduksiBeras::lastSixMonths()->get()],
            "produk"=>Produk::where('stok','<=','20')->get(),
            "pendapatan" => ["Total" => Transaksi::sum('total'), 'CurrentMonth' => Transaksi::currentMonth()->sum('total')],
            "pengajuan" => [
                'sewa' => DB::table('pengajuan_sewa')
                    ->join('petani', 'pengajuan_sewa.id_petani', '=', 'petani.id_petani')
                    ->join('jenis_sewa','pengajuan_sewa.id_sewa','=','jenis_sewa.id_sewa')
                    ->select('pengajuan_sewa.*', 'petani.nama_lengkap as nama_lengkap_petani','jenis_sewa.nama_sewa as nama_sewa')
                    ->orderByDesc('updated_at')
                    ->get(),
                // PengajuanSewa::limit(5)->orderBy('tanggal_sewa','desc')->get()
            ]
        ]);
    }

    public function sendNotification()
    {
        $response = FirebaseHelper::sendFCMNotification();
        return $response;
    }
}
