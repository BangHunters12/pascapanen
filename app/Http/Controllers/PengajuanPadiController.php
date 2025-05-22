<?php

namespace App\Http\Controllers;

use App\Models\Padi;
use Illuminate\Http\Request;
use App\Models\PengajuanPadi;
use Illuminate\Support\Facades\Auth;
use App\Notifications\PengajuanPadiStatusNotification;

class PengajuanPadiController extends Controller
{
    public function penjualanView()
    {
        $padiList = Padi::all();
        return view('user.penjualan_padi.penjualanpadi', compact('padiList'));
    }

    // Proses simpan pengajuan
    public function store(Request $request)
    {
        $request->validate([
            'id_padi' => 'required|exists:padi,id_padi',
            'perlu_mobil' => 'required|boolean',
            'jumlah_karung' => 'required|integer|min:1',
            'tanggal_pengajuan' => 'required|date',
            'keterangan' => 'nullable|string',
        ]);

        PengajuanPadi::create([
            'id_petani' => Auth::user()->id_petani,
            'id_padi' => $request->id_padi,
            'perlu_mobil' => $request->perlu_mobil,
            'jumlah_karung' => $request->jumlah_karung,
            'tanggal_pengajuan' => $request->tanggal_pengajuan,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->back()->with('success', 'Pengajuan berhasil diajukan.');
    }

    // View admin: lihat semua pengajuan
    public function index()
    {
        $pengajuanList = PengajuanPadi::with('petani', 'padi')->latest()->get();
        return view('admin.pengajuanpadi.index', compact('pengajuanList'));
    }

    // Admin update status
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:disetujui,ditolak',
        ]);

        $pengajuan = PengajuanPadi::findOrFail($id);
        $pengajuan->update(['status' => $request->status]);

        $pengajuan->petani->notify(new PengajuanPadiStatusNotification($request->status));

        return back()->with('success', 'Status berhasil diperbarui.');
    }
}
