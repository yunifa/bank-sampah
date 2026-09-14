<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NasabahController extends Controller
{
    /**
     * Halaman Data Nasabah.
     * NOTE: baru bagian tampilan, masih pakai data dummy di view-nya.
     */
    public function index()
    {
        return view('nasabah.index');
    }
}