<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Produk;
use App\Models\TransaksiProduk;

class TransaksiController extends Controller
{
    public function semuaHistori()
{
    $histori = TransaksiProduk::with('produk')->latest()->get();

    return response()->json([
        'success' => true,
        'data' => $histori
    ]);
}




    public function store(Request $request)
    {
        $request->validate([
            'id_produk' => 'required|exists:produk,id_produk',
            'nama_produk' => 'required|string',
            'jumlah' => 'required|integer|min:1',
            'total' => 'required|numeric|min:0',
            'nama_pembeli' => 'required|string|max:255',
        ]);

        $produk = Produk::where('id_produk', $request->id_produk)->first();

        if (!$produk) {
            return response()->json([
                'success' => false,
                'message' => 'Produk tidak ditemukan',
            ], 404);
        }

        if ($produk->stok < $request->jumlah) {
            return response()->json([
                'success' => false,
                'message' => 'Stok tidak mencukupi'
            ], 400);
        }

        // Kurangi stok
        $produk->stok -= $request->jumlah;
        $produk->save();

        // Simpan transaksi
        $transaksi = TransaksiProduk::create([
            'id_produk' => $produk->id_produk,
            'nama_produk' => $request->nama_produk,
            'jumlah' => $request->jumlah,
            'total' => $produk->harga * $request->jumlah,
            'nama_pembeli' => $request->nama_pembeli,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Transaksi berhasil',
            'data' => $transaksi->load('produk') // opsional untuk langsung kirim data produk juga
        ]);

        
    }
}
