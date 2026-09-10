<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Dashboard Pengelola/Admin.
     * NOTE: masih pakai data dummy untuk keperluan preview tampilan (frontend).
     * Nanti tinggal ganti isinya dengan query asli, nama variabel tetap sama.
     */
    public function pengelola()
    {
        return view('dashboard.pengelola');
    }
}