<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class tabungansimController extends Controller
{
    public function index()
    {
        return view('simulasi');
    }

    public function calculate(Request $request)
    {
        $request->validate([
            'saldoterndah' => 'required|numeric|min:0',
            'sukubunga' => 'required|numeric|min:0',
            'bulan' => 'required|numeric|min:1',
            'method' => 'required|string'

        ]);

        $saldoterndah = $request->input('saldoterndah');
        $sukubunga = $request->input('sukubunga');
        $bulan = $request->input('bulan');
        $method = $request->input('method');

        $result = [];

        if ($method == 'tabungan_arn') {
            $result = $this->calculatetabarn($saldoterndah, $sukubunga, $bulan);
        } elseif ($method == 'xtra') {
            $result = $this->calculatextra($saldoterndah, $sukubunga, $bulan);
        } elseif ($method == 'tamba') {
            $result = $this->calculatetamba($saldoterndah, $sukubunga, $bulan);
        } elseif ($method == 'tabunganku') {
            $result = $this->calculatetabunganku($saldoterndah, $sukubunga, $bulan);
        }
        return back()->with('result', $result);
    }

    private function calculatetabarn($saldoterndah, $sukubunga, $bulan)
    {
        // ubah persen ke desimal
        $suku = $sukubunga / 100;
        $bunga_kotor = ($saldoterndah * $suku) / $bulan;
        $pajak = $bunga_kotor * 0.20;
        $bunga_bersih = $bunga_kotor - $pajak;
        $result = [];
        for ($i = 1; $i <= $bulan; $i++) {
            $result[] = [
                'bulan' => $i,
                'bunga_kotor' => number_format($bunga_kotor, 0, ',', '.'),
                'pajak' => number_format($pajak, 0, ',', '.'),
                'bunga_bersih' => number_format($bunga_bersih, 0, ',', '.'),

            ];
        }
        return $result;
    }

    private function calculatextra($loanAmount, $interestRate, $loanTerm)
    {
        $monthlyInterest = $loanAmount * ($interestRate / 12);
        $totalPayment = $loanAmount + ($monthlyInterest * $loanTerm);

        $result = [];
        for ($i = 1; $i <= $loanTerm; $i++) {
            $result[] = [
                'bulan' => $i,
                'bunga' => number_format(($loanAmount / $loanTerm) + $monthlyInterest, 2)
            ];
        }
        return $result;
    }

    private function calculatetamba($loanAmount, $interestRate, $loanTerm)
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

    private function calculatetabunganku($loanAmount, $interestRate, $loanTerm)
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
