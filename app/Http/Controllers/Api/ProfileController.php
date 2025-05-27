<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function show()
    {
        $user = request()->user();

        return response()->json([
            'success' => true,
            'data' => [
                'nama_lengkap' => $user->nama_lengkap,
                'username' => $user->username,
                'email' => $user->email,
                'no_telp' => $user->no_telp,
                'gender' => $user->gender,
                'alamat' => $user->alamat,
                'role' => $user->role,
                'logo' => $user->logo ? asset('storage/' . $user->logo) : null,
                'created_at' => $user->created_at,
            ],
        ]);
    }

    public function update(Request $request)
    {
        $user = $request->user();

        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'no_telp' => 'required|string|max:20',
            'gender' => 'required|string|in:Laki-laki,Perempuan',
            'alamat' => 'required|string|max:500',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Update data dasar
        $user->nama_lengkap = $request->nama_lengkap;
        $user->username = $request->username;
        $user->no_telp = $request->no_telp;
        $user->gender = $request->gender;
        $user->alamat = $request->alamat;

        if ($request->hasFile('logo')) {
            // Hapus logo lama kalau ada
            if ($user->logo && Storage::exists('public/' . $user->logo)) {
                Storage::delete('public/' . $user->logo);
            }

            $path = $request->file('logo')->store('profile_images', 'public');
            $user->logo = $path;
        }

        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'Profile updated successfully',
        ]);
    }
}
