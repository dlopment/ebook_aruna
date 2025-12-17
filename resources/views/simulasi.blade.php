@extends('parstial.nav')
@section('content')

<style>
    .container-simulasi {
        max-width: 750px;
        margin: auto;
        padding: 20px;
    }

    .container-simulasi input,
    .container-simulasi select,
    .container-simulasi button {
        width: 100%;
        padding: 10px;
        margin-bottom: 12px;
        border: 1px solid #ccc;
        border-radius: 6px;
    }

    .container-simulasi button {
        background: #007bff;
        color: white;
        border: none;
        font-weight: bold;
        cursor: pointer;
    }

    .container-simulasi button:hover {
        background: #0056b3;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    table th,
    table td {
        border: 1px solid #ccc;
        padding: 8px;
        text-align: center;
    }

    table th {
        background: #f5f5f5;
        font-weight: bold;
    }

    .error-box ul {
        color: red;
        padding-left: 20px;
    }
</style>

<div class="container-simulasi">
    <h2 class="text-center mb-4">Simulasi Kredit</h2>

    {{-- Tampilkan error --}}
    @if ($errors->any())
    <div class="error-box">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    {{-- Form Input --}}
    <form action="{{ route('simulasi.kredit') }}" method="POST">
        @csrf

        <input type="number" name="pokokPinjaman" placeholder="Masukkan jumlah pinjaman"
            value="{{ old('pokokPinjaman') }}">

        <input type="number" name="bungaTahunan" placeholder="Masukkan bunga per tahun"
            value="{{ old('bungaTahunan') }}">

        <input type="number" name="tenor" placeholder="Masukkan jangka waktu (bulan)"
            value="{{ old('tenor') }}">

        <input type="date" name="tanggalMulai" value="{{ old('tanggalMulai') }}">

        <select name="method">
            <option value="bungamenurun" {{ old('method') == 'bungamenurun' ? 'selected' : '' }}>Bunga Menurun</option>
            <option value="calculatetetap" {{ old('method') == 'calculatetetap' ? 'selected' : '' }}>Bunga Tetap</option>
        </select>

        <button type="submit">Hitung Simulasi</button>
    </form>

    {{-- Hasil Simulasi --}}
    @if (session('data'))
    <h3 class="mt-4">Hasil Simulasi:</h3>

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Bulan</th>
                    <th>Tanggal</th>
                    <th>Saldo Awal</th>
                    <th>Cicilan Pokok</th>
                    <th>Bunga</th>
                    <th>Angsuran</th>
                    <th>Saldo Akhir</th>
                </tr>
            </thead>
            <tbody>
                @foreach (session('data') as $row)
                <tr>
                    <td>{{ $row['bulan_ke'] }}</td>
                    <td>{{ $row['tanggal'] }}</td>
                    <td>{{ $row['saldo_awal'] }}</td>
                    <td>{{ $row['cicilan_pokok'] }}</td>
                    <td>{{ $row['bunga'] }}</td>
                    <td>{{ $row['angsuran'] }}</td>
                    <td>{{ $row['saldo_akhir'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>

@endsection