<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class depositosimController extends Controller
{
    public function index()
    {
        return view('simulasinew');
    }

    public function hitung(Request $request)
    {
        $request->validate([
            'penjualan_harian' => 'required|numeric|min:1',
            'biaya' => 'required|array',
            'biaya.*' => 'numeric|min:0'
        ]);

        // HITUNG OMZET
        $omzet = $request->penjualan_harian * 30;

        // HITUNG TOTAL BIAYA
        $totalBiaya = array_sum($request->biaya);

        // HITUNG LABA BERSIH
        $laba = $omzet - $totalBiaya;

        // KEMAMPUAN BAYAR (35% dari laba)
        $kemampuanBayar = $laba * 0.35;

        // ANGSRAN YANG DIAJUKAN (opsional)
        $angsuran = $request->angsuran ?? 0;

        // STATUS KELAYAKAN
        $status = $angsuran > 0
            ? ($angsuran <= $kemampuanBayar ? 'LAYAK' : 'TIDAK LAYAK')
            : '-';

        return back()->with([
            'omzet' => $omzet,
            'totalBiaya' => $totalBiaya,
            'laba' => $laba,
            'kemampuanBayar' => $kemampuanBayar,
            'angsuran' => $angsuran,
            'status' => $status
        ]);
    }
}
