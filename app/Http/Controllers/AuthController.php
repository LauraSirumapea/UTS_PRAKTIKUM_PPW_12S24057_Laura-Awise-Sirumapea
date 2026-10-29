<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            // Mencegah session fixation setelah login.
            $request->session()->regenerate();

            return redirect()
                ->intended(route('buku.index'))
                ->with('success', 'Login berhasil. Selamat datang!');
        }

        throw ValidationException::withMessages([
            'email' => 'Email atau password yang kamu masukkan salah.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        // Hapus session lama dan buat token CSRF baru.
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('login')
            ->with('success', 'Kamu berhasil logout.');
    }
}