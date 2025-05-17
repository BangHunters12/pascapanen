<?php
namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::all();

        $kategori = ['beras', 'pupuk', 'obat-obatan']; // enum manual
        return view('admin.produk', compact('produk', 'kategori'));
    }

    public function store(Request $request)
    {
        Produk::create($request->all());
        return redirect()->back()->with('success', 'Produk berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        Produk::findOrFail($id)->update($request->all());
        return redirect()->back()->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Produk::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Produk berhasil dihapus.');
    }
}
