<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Petani;

class PetaniController extends Controller
{
    public function profile()
    {
        $user = Auth::user();

        // Ambil data petani berdasarkan user yang sedang login
        $petani = Petani::where('user_id', $user->id)->first();

        if (!$petani) {
            return response()->json([
                'message' => 'Data profil petani tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'message' => 'Berhasil mengambil data profil',
            'data' => $petani,
        ]);
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        // Validasi input
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'username'     => 'required|string|max:255',
            'email'        => 'required|email|max:255',
            'no_telp'      => 'required|string|max:20',
            'alamat'       => 'required|string',
        ]);

        // Ambil data petani dari user_id
        $petani = Petani::where('user_id', $user->id)->first();

        if (!$petani) {
            return response()->json([
                'message' => 'Data petani tidak ditemukan',
            ], 404);
        }

        // Update profil
        $petani->update([
            'nama_lengkap' => $request->nama_lengkap,
            'username'     => $request->username,
            'email'        => $request->email,
            'no_telp'      => $request->no_telp,
            'alamat'       => $request->alamat,
        ]);

        return response()->json([
            'message' => 'Profil berhasil diperbarui',
            'data' => $petani,
        ]);
    }
}
