<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class laporanController extends Controller
{
    // laporan laba rugi
    public function labarugi()
    {
        return view('laporan.labarugi');
    }

    // laporan rekapitulasi stok
    public function rekapstok()
    {
        return view('laporan.rekapstok');
    }

    // laporan barang masuk
    public function barangmasuk()
    {
        return view('laporan.barangmasuk');
    }

    // laporan pajak
    public function pajak()
    {
        return view('laporan.pajak');
    }

    // laporan rapot mekanik
    public function rapotmekanik()
    {
        return view('laporan.rapotmekanik');
    }
}