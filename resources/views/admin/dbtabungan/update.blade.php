@extends('parstial.main')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="card-header">Tambah Data Nasabah</div>
                    <br>
                    <form action="{{ route('admtabungan.update', $data->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="credit-form">

                            <div class="form-group row">
                                <label for="input" class="col-sm-3 col-from-label">Nama Produk</label>
                                <div class="col-sm-9">
                                    <input name="nama" type="text" class="form-control" id="input"
                                        placeholder="Produk" value="{{ old('nama', $data->nama) }}">
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-group row">
                                    <label for="gambar" class="col-sm-3 col-from-label">Upload Gambar Baru (Opsional)</label>
                                    <div class="col-sm-9">
                                        <input type="file" name="gambar" id="gambar" class="form-control">

                                        @if($data->gambar)
                                        <p class="mt-2">Gambar Saat Ini:</p>
                                        <img src="{{ asset('gambar_tabungan/' . $data->gambar) }}" alt="Gambar Produk"
                                            width="150" class="img-thumbnail">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="input" class="col-sm-3 col-from-label">Deskripsi</label>
                                <div class="col-sm-9">
                                    <textarea name="desprod" id="input" class="form-control"
                                        rows="5">{{ old('desprod', $data->desprod) }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div id="fitur-container-1">
                                    @foreach($data->peruntukan as $fitur)
                                    <div class="fitur-group row">
                                        <label for="input" class="col-sm-3 col-from-label">Peruntukan</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="peruntukan[]" value="{{ $fitur }}"
                                                class="form-control" placeholder="Deskripsi">

                                            @endforeach
                                            <button type="button" class="btn btn-success" id="tambah-fitur-1">Tambah
                                                Fitur</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div id="fitur-container-2">
                                    @foreach($data->suku_bng as $fitur)
                                    <div class="fitur-group row">
                                        <label for="input" class="col-sm-3 col-from-label">Suku Bunga</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="suku_bng[]" value="{{ $fitur }}"
                                                class="form-control" placeholder="Deskripsi">

                                            @endforeach
                                            <button type="button" class="btn btn-success" id="tambah-fitur-2">Tambah
                                                Fitur</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="input" class="col-sm-3 col-from-label">Setoran Minimum</label>
                                <div class="col-sm-9">
                                    <input name="setmin" type="text" class="form-control" id="input"
                                        placeholder="Setoran Awalan Minimum"
                                        value="{{ old('setmin', $data->setmin) }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="input" class="col-sm-3 col-from-label">Setoran Bulanan Minimum</label>
                                <div class="col-sm-9">
                                    <input name="setblnmin" type="text" class="form-control" id="input"
                                        placeholder="Setoran selanjutnya minimum"
                                        value="{{ old('setblnmin', $data->setblnmin) }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="input" class="col-sm-3 col-from-label">Saldo Selanjutnya Minimum</label>
                                <div class="col-sm-9">
                                    <input name="salselmin" type="text" class="form-control" id="input"
                                        placeholder="Saldo Selanjutnya Minimum"
                                        value="{{ old('salselmin', $data->salselmin) }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="input" class="col-sm-3 col-from-label">Saldo Pengendapan Minimum</label>
                                <div class="col-sm-9">
                                    <input name="setpengmin" type="text" class="form-control" id="input"
                                        placeholder="Saldo Pengendapan Minimum"
                                        value="{{ old('setpengmin', $data->setpengmin) }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="input" class="col-sm-3 col-from-label">Jangka Waktu</label>
                                <div class="col-sm-9">
                                    <input name="jnkwkt" type="text" class="form-control" id="input"
                                        placeholder="Jangka Waktu" value="{{ old('jnkwkt', $data->jnkwkt) }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="input" class="col-sm-3 col-from-label">Persyaratan &Ketentuan</label>
                                <div class="col-sm-9">
                                    <textarea name="perket" class="form-control"
                                        id="perket">{{ old('perket', $data->perket) }}</textarea>
                                </div>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Simpan">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function setupFiturDinamis(buttonId, containerId, inputName) {
        const tambahBtn = document.getElementById(buttonId);
        const container = document.getElementById(containerId);

        tambahBtn.addEventListener('click', function() {
            const div = document.createElement('div');
            div.classList.add('fitur-group');
            div.innerHTML = `
           <label for="input" class="col-sm-2 col-from-label">Deskripsi</label>
                   <div class="col-sm-10">
                <input type="text" name="${inputName}" placeholder="Deskripsi"  class="form-control">
                </div>
                <button type="button" class="remove-fitur btn btn-danger">Hapus</button>
        `;
            container.appendChild(div);
        });

        container.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-fitur')) {
                e.target.parentElement.remove();
            }
        });
    }

    setupFiturDinamis('tambah-fitur-1', 'fitur-container-1', 'desprod[]');
    setupFiturDinamis('tambah-fitur-2', 'fitur-container-2', 'kel[]');
</script>
<script>
    $(document).ready(function() {
        $('#perket').summernote({
            height: 500, // tinggi editor
            placeholder: 'Tulis sesuatu di sini...',
            tabsize: 2,
            height: 120,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ],
        });
    });
</script>
@endsection