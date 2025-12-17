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
                    <form action="{{ route('alukredit.update', $alur->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="credit-form">
                            <div class="form-group row">
                                <label for="id_kategori" class="col-sm-2 col-form-label">ID Kreit</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="idkredit" id="id_kategori">
                                        <option value="">Pilih Kategori</option>
                                        @foreach ($kredit as $k)
                                        <option value="{{ $k->id }}" @if (old('idkredit', $alur->idkredit) ==
                                            $k->id) selected @endif>{{ $k->nama_produk }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="input" class="col-sm-3 col-from-label">Judul</label>
                                <div class="col-sm-9">
                                    <input name="judul" type="text" class="form-control" id="input"
                                        placeholder="Produk" value="{{ old('judul', $alur->judul) }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="input" class="col-sm-3 col-from-label">Deskripsi</label>
                                <div class="col-sm-9">
                                    <textarea name="deskripsi" id="input" class="form-control"
                                        rows="5">{{ old('deskripsi', $alur->deskripsi) }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div id="fitur-container-1">
                                    @foreach($alur->daftar as $fitur)
                                    <div class="fitur-group row">
                                        <label for="input" class="col-sm-3 col-from-label">Dafatr</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="daftar[]" value="{{ $fitur }}"
                                                class="form-control" placeholder="Deskripsi">
                                            <button type="button" class="btn btn-success" id="tambah-fitur-1">Tambah
                                                Fitur</button>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <input type="submit" class="btn btn-primary" value="Simpan">
                </div>
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

    setupFiturDinamis('tambah-fitur-1', 'fitur-container-1', 'daftar[]');
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