<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dbmarketingController extends Controller
{
    public function index()
    {
        return view('simulasimark');
    }
    public function harian(Request $request)
    {
        $request->validate([
            'totalVisit'    => 'required|numeric|min:0',
            'totalSubmission' => 'required|numeric|min:0',
            'totalApproval' => 'required|numeric|min:0',
            'hariKerja' => 'required|numeric|min:0',

        ]);
        // === INPUT DATA MANUAL ===
        $totalVisit       = $request->totalVisit; // total visit per bulan
        $totalSubmission  = $request->totalSubmission;  // total pengajuan
        $totalApproval    = $request->totalApproval;  // total disetujui
        $hariKerja        = $request->hariKerja;  // jumlah hari kerja

        // === PERHITUNGAN ===

        // Visit per hari
        $visitPerHari = $totalVisit / $hariKerja;

        // Submission Rate (%)
        $submissionRate = ($totalSubmission / $totalVisit) * 100;

        // Approval Rate (%)
        $approvalRate = ($totalApproval / $totalSubmission) * 100;

        // Closing Rate (%)
        $closingRate = ($totalApproval / $totalVisit) * 100;

        // Prediksi Approval
        $prediksiApproval = $totalVisit *
            ($submissionRate / 100) *
            ($approvalRate / 100);

        return view('simulasimark', compact(
            'totalVisit',
            'totalSubmission',
            'totalApproval',
            'hariKerja',
            'visitPerHari',
            'submissionRate',
            'approvalRate',
            'closingRate',
            'prediksiApproval'
        ));
    }
}
