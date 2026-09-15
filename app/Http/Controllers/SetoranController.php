<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SetoranController extends Controller
{
    /**
     * Halaman Riwayat Transaksi & Pembukuan Setoran.
     * NOTE: baru bagian tampilan, masih pakai data dummy di view-nya.
     */
    public function index()
    {
        return view('transaksi.index');
    }
}