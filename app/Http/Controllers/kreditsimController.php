<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class kreditsimController extends Controller
{
    public function index()
    {
        return view('simulasi');
    }

    public function calculate(Request $request)
    {


        // Ambil input
        $pokokPinjaman = $request->pokokPinjaman;
        $tenor = $request->tenor;                  // bulan
        $bungaTahunan = $request->bungaTahunan;   // contoh: 18
        $tanggalMulai = $request->tanggalMulai;
        $method = $request->input('method');

        if (!$tenor || $tenor == 0) {
            throw new \Exception("Tenor tidak boleh 0");
        }

        if (!$pokokPinjaman || $pokokPinjaman == 0) {
            throw new \Exception("Pokok pinjaman harus diisi");
        }

        if ($bungaTahunan === null) {
            throw new \Exception("Bunga tidak boleh kosong");
        }

        $data = [];

        if ($method == 'bungamenurun') {
            $data = $this->hitungAngsuranMenurun($pokokPinjaman, $bungaTahunan, $tenor, $tanggalMulai);
        } elseif ($method == 'calculateTetap') {
            $data = $this->calculateTetap($pokokPinjaman, $bungaTahunan, $tenor, $tanggalMulai);
        } elseif ($method == 'sliding') {
            $data = $this->calculateSliding($pokokPinjaman, $bungaTahunan, $tenor, $tanggalMulai);
        }

        return back()->with('data', $data)->with('tenor', $tenor);
    }

    public function hitungAngsuranMenurun($pokokPinjaman, $tenor, $bungaTahunan, $tanggalMulai)
    {
        $bungaPerBulan = $bungaTahunan / 12 / 100;
        $cicilanPokok = $pokokPinjaman / $tenor;

        $data = [];
        $saldo = $pokokPinjaman;

        // Convert tanggal mulai ke Carbon
        $tanggal = \Carbon\Carbon::parse($tanggalMulai);

        for ($i = 1; $i <= $tenor; $i++) {

            // Hitung bunga dari saldo berjalan
            $bunga = $saldo * $bungaPerBulan;

            // Angsuran = pokok + bunga
            $angsuran = $cicilanPokok + $bunga;

            // Hitung saldo akhir
            $saldoAkhir = $saldo - $cicilanPokok;

            // Simpan data
            $data[] = [
                'bulan_ke'      => $i,
                'tanggal'       => $tanggal->format('Y-m-d'),
                'saldo_awal'    => round($saldo),
                'cicilan_pokok' => round($cicilanPokok),
                'bunga'         => round($bunga),
                'angsuran'      => round($angsuran),
                'saldo_akhir'   => round($saldoAkhir)
            ];

            // Naikkan 1 bulan
            $tanggal->addMonth();

            // Update saldo
            $saldo = $saldoAkhir;
        }

        return $data;
    }

    private function calculateTetap($pokokPinjaman, $bungaTahunan, $tenor, $tanggalMulai)
    {
        // Konversi bunga tahunan ke desimal
        $bungaTahunanDecimal = $bungaTahunan / 100;

        // 1. Hitung cicilan pokok
        $cicilanPokok = $pokokPinjaman / $tenor;

        // 2. Hitung bunga flat per bulan
        $bungaPerBulan = $pokokPinjaman * ($bungaTahunanDecimal / (100 * 12));

        // 3. Angsuran per bulan
        $angsuranPerBulan = $cicilanPokok + $bungaPerBulan;

        $saldo = $pokokPinjaman;
        $data = [];

        for ($i = 1; $i <= $tenor; $i++) {

            $saldoAkhir = $saldo - $cicilanPokok;

            $data[] = [
                'bulan_ke' => $i,
                'tanggal' => date("M Y", strtotime("+" . ($i - 1) . " month", strtotime($tanggalMulai))),
                'saldo_awal' => round($saldo),
                'cicilan_pokok' => round($cicilanPokok),
                'bunga' => round($bungaPerBulan),
                'angsuran' => round($angsuranPerBulan),
                'saldo_akhir' => max(round($saldoAkhir), 0)
            ];

            $saldo = $saldoAkhir;
        }

        return $data;
    }

    private function calculateSliding($loanAmount, $interestRate, $loanTerm)
    {
        $result = [];
        $remainingLoan = $loanAmount;
        $monthlyPrincipal = $loanAmount / $loanTerm;

        for ($i = 1; $i <= $loanTerm; $i++) {
            $monthlyInterest = $remainingLoan * ($interestRate / 12);
            $totalPayment = $monthlyPrincipal + $monthlyInterest;

            $result[] = [
                'bulan' => $i,
                'cicilan_bulanan' => number_format($totalPayment, 2)
            ];

            $remainingLoan -= $monthlyPrincipal;
        }
        return $result;
    }
}
