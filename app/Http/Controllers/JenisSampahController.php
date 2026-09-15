<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JenisSampahController extends Controller
{
    /**
     * Halaman Kelola Jenis Sampah & Tarif Komoditas.
     * NOTE: baru bagian tampilan, masih pakai data dummy di view-nya.
     */
    public function index()
    {
        return view('jenis-sampah.index');
    }
}