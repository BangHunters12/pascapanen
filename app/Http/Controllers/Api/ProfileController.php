<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profil()
    {
        $petani = Auth::guard('sanctum')->user();

        return response()->json([
            'nama_lengkap' => $petani->nama_lengkap,
            'username'     => $petani->username,
            'email'        => $petani->email,
            'no_telepon'   => $petani->no_telp,
            'alamat'       => $petani->alamat,
            'jenis_kelamin'=> $petani->gender,
            'logo'         => $petani->logo,
        ]);
    }
}
