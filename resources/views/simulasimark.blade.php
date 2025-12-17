@extends('parstial.nav')

@section('content')
<div class="container mt-5">
    <h3 class="mb-4">Simulasi Visit Harian vs Approval Rate</h3>

    <form action="{{ route('simulasi.marketing') }}" method="POST" class="card p-4 shadow-sm">
        @csrf
        <div class="mb-3">
            <label class="form-label">Total Visit</label>
            <input type="number" name="totalVisit" class="form-control" value="{{ $visit ?? '' }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Total Submission</label>
            <input type="number" name="totalSubmission" class="form-control" value="{{ $pengajuan ?? '' }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Total Approved</label>
            <input type="number" name="totalApproval" class="form-control" value="{{ $approved ?? '' }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Hari Kerja</label>
            <input type="number" name="hariKerja" class="form-control" value="{{ $approved ?? '' }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Hitung</button>
    </form>

    @isset($approvalRate)
    <div class="card mt-4 p-4">
        <h5>Hasil Perhitungan</h5>
        <li>Visit per Hari: {{ round($visitPerHari, 2) }}</li>
        <li>Submission Rate: {{ round($submissionRate, 2) }}%</li>
        <li>Approval Rate: {{ round($approvalRate, 2) }}%</li>
        <li>Closing Rate: {{ round($closingRate, 2) }}%</li>
        <li>Prediksi Approval: {{ round($prediksiApproval) }}</li>
    </div>
    @endisset
</div>

@endsection