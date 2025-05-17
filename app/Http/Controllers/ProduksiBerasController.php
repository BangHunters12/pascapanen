<?php

namespace App\Http\Controllers;

use App\Models\ProduksiBeras;
use App\Models\Padi;
use Illuminate\Http\Request;

class ProduksiBerasController extends Controller
{
    public function index()
    {
        $produksi = ProduksiBeras::with('padi')->get(); // Hapus relasi 'produk'
        $padi = Padi::all();
;
        return view('admin.produksi_beras', compact('produksi', 'padi'));
    }

    public function store(Request $request)
    {
        // Pastikan hanya field yang ada di fillable ProduksiBeras yang dikirim
        ProduksiBeras::create($request->only([
            'id_padi', 'tanggal_produksi', 'jumlah_padi', 'jumlah_beras', 'keterangan'
        ]));

        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        ProduksiBeras::findOrFail($id)->update($request->only([
            'id_padi', 'tanggal_produksi', 'jumlah_padi', 'jumlah_beras', 'keterangan'
        ]));

        return redirect()->back()->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        ProduksiBeras::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
