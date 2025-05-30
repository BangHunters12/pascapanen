<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Petani;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama_lengkap' => ['required', 'string', 'max:255'],
            'username'     => ['required', 'string', 'max:255', 'unique:petani', 'alpha_num'],
            'gender'       => ['required', 'in:Laki-laki,Perempuan'],
            'email'        => ['required', 'string', 'email', 'max:255', 'unique:petani'],
            'no_telp'      => ['required', 'string', 'max:15'],
            'alamat'       => ['required', 'string'],
            'password'     => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $petani = Petani::create([
            'nama_lengkap' => $request->nama_lengkap,
            'username'     => $request->username,
            'gender'       => $request->gender,
            'email'        => $request->email,
            'no_telp'      => $request->no_telp,
            'alamat'       => $request->alamat,
            'password'     => Hash::make($request->password),
            'role'         => 'petani',
        ]);

        Auth::login($petani);

        return redirect(RouteServiceProvider::HOME);
    }
}
