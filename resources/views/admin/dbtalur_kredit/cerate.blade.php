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
                    <form action="{{ route('alukredit.store') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="idkredit">Kredit</label>
                            <select name="idkredit" id="idkredit" class="form-control">
                                @foreach ($dbalur as $p)
                                <option value="{{ $p->id }}">{{ $p->nama_produk }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group row">
                            <label for="input" class="col-sm-3 col-from-label">Judul</label>
                            <div class="col-sm-9">
                                <input name="judul" type="text" class="form-control" id="input"
                                    placeholder="Setoran Awalan Minimum">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="input" class="col-sm-3 col-from-label">Deskripsi</label>
                            <div class="col-sm-9">
                                <textarea name="deskripsi" id="input" class="form-control" rows="2"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div id="fitur-container-1">
                                <div class="fitur-group row">
                                    <label for="input" class="col-sm-3 col-from-label">Daftar</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="daftar[]" class="form-control" placeholder="Peruntukan">
                                        <button type="button" class="btn btn-success" id="tambah-fitur-1">Tambah
                                            Fitur</button>
                                    </div>
                                </div>
                            </div>
                        </div>
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
        setupFiturDinamis('tambah-fitur-1', 'fitur-container-1', 'daftar[]');
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