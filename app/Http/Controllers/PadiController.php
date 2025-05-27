<?php

namespace App\Http\Controllers;

use App\Models\Padi;
use Illuminate\Http\Request;

class PadiController extends Controller
{
    public function index()
    {
        $padis = Padi::all();
        return view('admin.padi.index', compact('padis'));
    }

    public function create()
    {
        return view('admin.padi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_padi' => 'required|string|max:255',
            'warna' => 'required|string|max:255',
            'bentuk' => 'required|string|max:255',
            'tekstur' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|integer|min:0',
            'gambar' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        $gambarPath = $request->file('gambar')->store('gambar_padi', 'public');

        Padi::create([
            'nama_padi' => $request->nama_padi,
            'warna' => $request->warna,
            'bentuk' => $request->bentuk,
            'tekstur' => $request->tekstur,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'gambar' => $gambarPath,
        ]);

        return redirect()->route('padi.index')->with('success', 'Data Padi berhasil ditambahkan!');
    }

    public function edit($id_padi)
    {
        $padi = Padi::findOrFail($id_padi);
        return view('admin.padi.edit', compact('padi'));
    }

    public function update(Request $request, $id_padi)
    {
        $request->validate([
            'nama_padi' => 'required|string|max:255',
            'warna' => 'required|string|max:255',
            'bentuk' => 'required|string|max:255',
            'tekstur' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|integer|min:0',
            'gambar' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        $padi = Padi::findOrFail($id_padi);

        if ($request->hasFile('gambar')) {
            if ($padi->gambar && file_exists(storage_path('app/public/' . $padi->gambar))) {
                unlink(storage_path('app/public/' . $padi->gambar));
            }

            $gambarPath = $request->file('gambar')->store('gambar_padi', 'public');
            $padi->gambar = $gambarPath;
        }

        $padi->update([
            'nama_padi' => $request->nama_padi,
            'warna' => $request->warna,
            'bentuk' => $request->bentuk,
            'tekstur' => $request->tekstur,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'gambar' => $padi->gambar,
        ]);

        return redirect()->route('padi.index')->with('success', 'Data padi berhasil diperbarui');
    }

    public function destroy($id_padi)
    {
        $padi = Padi::findOrFail($id_padi);

        if ($padi->gambar && file_exists(storage_path('app/public/' . $padi->gambar))) {
            unlink(storage_path('app/public/' . $padi->gambar));
        }

        $padi->delete();

        return redirect()->route('padi.index')->with('success', 'Data Padi Berhasil Dihapus!');
    }
}
