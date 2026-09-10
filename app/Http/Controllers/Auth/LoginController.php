<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Tampilkan halaman "Masuk ke Sistem" (Petugas/Pengelola).
     * NOTE: baru bagian tampilan. Proses cek username/password
     * belum diisi (bagian backend), tinggal ditambahkan method
     * `login(Request $request)` yang di-submit oleh form.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }
}