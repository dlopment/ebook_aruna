<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Simulasi Omzet & Kemampuan Bayar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Optional: Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-4">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Simulasi Omzet & Kemampuan Bayar</h5>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('simulasi.usaha.hitung') }}">
                    @csrf

                    {{-- PENJUALAN HARIAN --}}
                    <div class="mb-3">
                        <label class="form-label">Penjualan Harian (Rp)</label>
                        <input type="number" name="penjualan_harian"
                            class="form-control @error('penjualan_harian') is-invalid @enderror"
                            value="{{ old('penjualan_harian') }}" required>
                        @error('penjualan_harian')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- BIAYA --}}
                    <label class="form-label">Biaya Operasional</label>

                    <div id="biaya-wrapper">
                        <div class="input-group mb-2">
                            <input type="number" name="biaya[]"
                                class="form-control"
                                placeholder="Biaya (Rp)" required>
                            <button type="button" class="btn btn-danger remove-biaya">
                                Hapus
                            </button>
                        </div>
                    </div>

                    <button type="button" class="btn btn-sm btn-success mb-3" id="tambahBiaya">
                        + Tambah Biaya
                    </button>

                    {{-- ANGSRAN --}}
                    <div class="mb-3">
                        <label class="form-label">Angsuran Diajukan (Opsional)</label>
                        <input type="number" name="angsuran"
                            class="form-control"
                            value="{{ old('angsuran') }}">
                    </div>

                    <button type="submit" class="btn btn-primary w-100">
                        Hitung Simulasi
                    </button>
                </form>

                {{-- HASIL --}}
                @if(session()->has('omzet'))
                <hr>
                <h5>Hasil Simulasi</h5>

                <table class="table table-bordered">
                    <tr>
                        <th>Omzet Bulanan</th>
                        <td>Rp {{ number_format(session('omzet'), 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <th>Total Biaya</th>
                        <td>Rp {{ number_format(session('totalBiaya'), 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <th>Laba Bersih</th>
                        <td>Rp {{ number_format(session('laba'), 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <th>Kemampuan Bayar (35%)</th>
                        <td>Rp {{ number_format(session('kemampuanBayar'), 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <th>Angsuran</th>
                        <td>Rp {{ number_format(session('angsuran'), 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            <span class="badge
                                {{ session('status') == 'LAYAK' ? 'bg-success' : 'bg-danger' }}">
                                {{ session('status') }}
                            </span>
                        </td>
                    </tr>
                </table>
                @endif
            </div>
        </div>
    </div>

    {{-- SCRIPT --}}
    <script>
        document.getElementById('tambahBiaya').addEventListener('click', function() {
            const wrapper = document.getElementById('biaya-wrapper');

            const div = document.createElement('div');
            div.className = 'input-group mb-2';
            div.innerHTML = `
            <input type="number" name="biaya[]" class="form-control" placeholder="Biaya (Rp)" required>
            <button type="button" class="btn btn-danger remove-biaya">Hapus</button>
        `;

            wrapper.appendChild(div);
        });

        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-biaya')) {
                e.target.closest('.input-group').remove();
            }
        });
    </script>

</body>

</html>