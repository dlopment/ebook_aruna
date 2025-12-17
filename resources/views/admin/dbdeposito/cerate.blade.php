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
                    <hr />
                    <form action="{{ route('admdeposito.store') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="input" class="col-sm-3 col-from-label">Nama Produk</label>
                            <div class="col-sm-9">
                                <input name="nama_produk" type="text" class="form-control" id="input"
                                    placeholder="Produk">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="input" class="col-sm-3 col-from-label">Gambar</label>
                            <div class="col-sm-9">
                                <input name="gambar" type="file" class="form-control" id="input"
                                    placeholder="Produk">
                            </div>
                        </div>
                        <div class="form-group">
                            <div id="fitur-container-1">
                                <div class="fitur-group row">
                                    <label for="input" class="col-sm-3 col-from-label">Deskripsi</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="desprod[]" class="form-control"
                                            placeholder="Deskripsi">
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
                                    placeholder="Suku Bunga">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="input" class="col-sm-3 col-from-label">Setoran Awalan Minimum</label>
                            <div class="col-sm-9">
                                <input name="setawmin" type="text" class="form-control" id="input"
                                    placeholder="Setoran Awalan Minimum">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="input" class="col-sm-3 col-from-label">Setoran selanjutnya minimum</label>
                            <div class="col-sm-9">
                                <input name="setselmin" type="text" class="form-control" id="input"
                                    placeholder="Setoran selanjutnya minimum">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="input" class="col-sm-3 col-from-label">Saldo pengendapan minimum</label>
                            <div class="col-sm-9">
                                <input name="salpeng" type="text" class="form-control" id="input"
                                    placeholder="Saldo pengendapan minimum">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="input" class="col-sm-3 col-from-label">Jangka Waktu</label>
                            <div class="col-sm-9">
                                <input name="jang_wkt" type="text" class="form-control" id="input"
                                    placeholder="Jangka Waktu">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="input" class="col-sm-3 col-from-label">Persyaratan &Ketentuan</label>
                            <div class="col-sm-9">
                                <textarea name="kel" id="kel" class="form-control"></textarea>
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

    // Panggil untuk kedua form
    setupFiturDinamis('tambah-fitur-1', 'fitur-container-1', 'desprod[]');
    setupFiturDinamis('tambah-fitur-2', 'fitur-container-2', 'kel[]');
</script>
<script>
    $(document).ready(function() {
        $('#kel').summernote({
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
@endsection