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
                    <form action="{{ route('admtabungan.store') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="input" class="col-sm-3 col-from-label">Nama Produk</label>
                            <div class="col-sm-9">
                                <input name="nama" type="text" class="form-control" id="input" placeholder="Produk">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="input" class="col-sm-3 col-from-label">Gambar</label>
                            <div class="col-sm-9">
                                <input name="gambar" type="file" class="form-control" id="input" placeholder="Produk">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="input" class="col-sm-3 col-from-label">Deskripsi</label>
                            <div class="col-sm-9">
                                <textarea name="desprod" id="input" class="form-control" rows="2"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div id="fitur-container-1">
                                <div class="fitur-group row">
                                    <label for="input" class="col-sm-3 col-from-label">Peruntukan</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="peruntukan[]" class="form-control" placeholder="Peruntukan">
                                        <button type="button" class="btn btn-success" id="tambah-fitur-1">Tambah
                                            Fitur</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div id="fitur-container-2">
                                <div class="fitur-group row">
                                    <label for="input" class="col-sm-3 col-from-label">Suku Bunga</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="suku_bng[]" class="form-control" placeholder="Suku Bunga">
                                        <button type="button" class="btn btn-success" id="tambah-fitur-2">Tambah Suku Bunga</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="input" class="col-sm-3 col-from-label">Setoran Minimum</label>
                            <div class="col-sm-9">
                                <input name="setmin" type="text" class="form-control" id="input"
                                    placeholder="Setoran Awalan Minimum">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="input" class="col-sm-3 col-from-label">Setoran Bulanan Minimum</label>
                            <div class="col-sm-9">
                                <input name="setblnmin" type="text" class="form-control" id="input"
                                    placeholder="Setoran selanjutnya minimum">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="input" class="col-sm-3 col-from-label">Saldo Selanjutnya Minimum</label>
                            <div class="col-sm-9">
                                <input name="salselmin" type="text" class="form-control" id="input"
                                    placeholder="Saldo Selanjutnya Minimum">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="input" class="col-sm-3 col-from-label">Saldo Pengendapan Minimum</label>
                            <div class="col-sm-9">
                                <input name="setpengmin" type="text" class="form-control" id="input"
                                    placeholder="Saldo Pengendapan Minimum">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="input" class="col-sm-3 col-from-label">Jangka Waktu</label>
                            <div class="col-sm-9">
                                <input name="jnkwkt" type="text" class="form-control" id="input"
                                    placeholder="Jangka Waktu">
                            </div>
                        </div>
                        <label for="input" class="col-from-label">Persyaratan &Ketentuan</label>
                        <textarea name="perket" id="perket"></textarea>
                        <input type="submit" class="btn btn-primary" value="Simpan">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.tiny.cloud/1/lpykpjlylqbcppimw22jciqx11vtcyo7p7kahqi32k24s0fn/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        tinymce.init({
            selector: '#perket',
            plugins: 'lists link image table code media',
            toolbar: 'undo redo | styles | bold italic underline | alignleft aligncenter alignright | bullist numlist | table | link image media | code',
            menubar: false,
            height: 400
        });
    </script>

    <script>
        function setupFiturDinamis(buttonId, containerId, inputName) {
            const tambahBtn = document.getElementById(buttonId);
            const container = document.getElementById(containerId);

            tambahBtn.addEventListener('click', function() {
                const div = document.createElement('div');
                div.classList.add('fitur-group');
                div.innerHTML = `
                <input type="text" name="${inputName}"  class="form-control">
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
        // Panggil untuk kedua form
        setupFiturDinamis('tambah-fitur-1', 'fitur-container-1', 'peruntukan[]');
        setupFiturDinamis('tambah-fitur-2', 'fitur-container-2', 'suku_bng[]');
    </script>
    <script>
        $(document).ready(function() {
            $('#perket').summernote({
                height: 200, // tinggi editor
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
</div>
@endsection