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
                    <form action="{{ route('admkredit.update', $data->id) }}" method="POST"
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
                                <div class="form-group row">
                                    <label for="gambar" class="form-label">Upload Gambar Baru (Opsional)</label>
                                    <div class="col-sm-9">
                                        <input type="file" name="gambar" id="gambar" class="form-control">
                                        @if($data->gambar)
                                        <p class="mt-2">Gambar Saat Ini:</p>
                                        <img src="{{ asset('gambar_kredit/' . $data->gambar) }}" alt="Gambar Produk"
                                            width="150" class="img-thumbnail">
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div id="fitur-container-1">
                                    @foreach($data->desprod as $fitur)
                                    <div class="fitur-group row">
                                        <label for="input" class="col-sm-3 col-from-label">Deskripsi</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="desprod[]" value="{{ $fitur }}"
                                                class="form-control" placeholder="Deskripsi">
                                            <button type="button" class="btn btn-success" id="tambah-fitur-1">Tambah
                                                Fitur</button>

                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="input" class="col-sm-3 col-from-label">Plafon</label>
                                <div class="col-sm-9">
                                    <input name="plafon" type="text" class="form-control" id="input"
                                        placeholder="Produk" value="{{ old('plafon', $data->plafon) }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <div id="fitur-container-2">
                                    @foreach($data->jnk_waktu as $fitur)
                                    <div class="fitur-group row">
                                        <label for="input" class="col-sm-3 col-from-label">Jangka Waktu</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="jnk_waktu[]" value="{{ $fitur }}"
                                                class="form-control" placeholder="Jangka Waktu">
                                            <button type="button" class="btn btn-success" id="tambah-fitur-2">Tambah</button>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="input" class="col-sm-3 col-from-label">Suku Bunga</label>
                                <div class="col-sm-9">
                                    <input name="bunga" type="text" class="form-control" id="input"
                                        placeholder="Produk" value="{{ old('bunga', $data->bunga) }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="input" class="col-sm-3 col-from-label">Kelebihan</label>
                                <div class="col-sm-9">
                                    <input name="kelebihan" type="text" class="form-control" id="input"
                                        placeholder="Kelebiahan" value="{{ old('kelebihan', $data->kelebihan) }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="input" class="col-sm-3 col-from-label">Persyaratan &Ketentuan</label>
                                <div class="col-sm-9">
                                    <textarea name="peryrtnketum"
                                        id="peryrtnketum">{{ old('peryrtnketum', $data->peryrtnketum) }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="input" class="col-sm-3 col-from-label">Non Perorangan</label>
                                <div class="col-sm-9">
                                    <textarea name="non_per"
                                        id="non_per">{{ old('non_per', $data->non_per) }}</textarea>
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
           <label for="input" class="col-sm-3 col-from-label">Deskripsi</label>
                   <div class="col-sm-9">
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
    setupFiturDinamis('tambah-fitur-2', 'fitur-container-2', 'jnk_waktu[]');
</script>

<script>
    $(document).ready(function() {
        $('#non_per').summernote({
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
<script>
    $(document).ready(function() {
        $('#peryrtnketum').summernote({
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