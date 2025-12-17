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
                    <form action="{{ route('admdeposito.update', $data->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="credit-form">
                            <div class="form-group row">
                                <label for="input" class="col-sm-3 col-from-label">Nama Produk</label>
                                <div class="col-sm-9">
                                    <input name="nama_produk" type="text" class="form-control" id="input"
                                        placeholder="Produk" value="{{ old('nama_produk', $data->nama_produk) }}">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="gambar" class="form-label">Upload Gambar Baru (Opsional)</label>
                                <input type="file" name="gambar" id="gambar" class="form-control">

                                @if($data->gambar)
                                <p class="mt-2">Gambar Saat Ini:</p>
                                <img src="{{ asset('gambar_produk/' . $data->gambar) }}" alt="Gambar Produk"
                                    width="150" class="img-thumbnail">
                                @endif
                            </div>

                            <div class="form-group">
                                <div id="fitur-container-1">
                                    @foreach($data->desprod as $fitur)
                                    <div class="fitur-group row">
                                        <label for="input" class="col-sm-2 col-from-label">Deskripsi</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="desprod[]" value="{{ $fitur }}"
                                                class="form-control" placeholder="Deskripsi">
                                            @endforeach
                                            <button type="button" class="btn btn-success" id="tambah-fitur-1">Tambah
                                                Fitur</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="input" class="col-sm-3 col-from-label">Suku Bunga</label>
                                <div class="col-sm-9">
                                    <input name="sk_bunga" type="text" class="form-control" id="input"
                                        placeholder="Produk" value="{{ old('sk_bunga', $data->sk_bunga) }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="input" class="col-sm-3 col-from-label">Setoran Awal Minimum</label>
                                <div class="col-sm-9">
                                    <input name="setawmin" type="text" class="form-control" id="input"
                                        placeholder="Setoran awal minimum"
                                        value="{{ old('setawmin', $data->setawmin) }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="input" class="col-sm-3 col-from-label">Setoran Awal Minimum</label>
                                <div class="col-sm-9">
                                    <input name="setselmin" type="text" class="form-control" id="input"
                                        placeholder="Setoran awal minimum"
                                        value="{{ old('setselmin', $data->setselmin)}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="input" class="col-sm-3 col-from-label">Setoran Awal Minimum</label>
                                <div class="col-sm-9">
                                    <input name="salpeng" type="text" class="form-control" id="input"
                                        placeholder="Setoran awal minimum"
                                        value="{{ old('salpeng', $data->salpeng) }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="input" class="col-sm-3 col-from-label">Setoran Awal Minimum</label>
                                <div class="col-sm-9">
                                    <input name="jang_wkt" type="text" class="form-control" id="input"
                                        placeholder="Setoran awal minimum"
                                        value="{{ old('jang_wkt', $data->jang_wkt) }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="input" class="col-sm-3 col-from-label">Persyaratan &Ketentuan</label>
                                <div class="col-sm-9">
                                    <textarea name="kel" id="kel">{{ old('kel', $data->kel) }}</textarea>
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
        $('#kel').summernote({
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