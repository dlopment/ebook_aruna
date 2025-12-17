<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-bs5.min.css" rel="stylesheet">
</head>

<body>
    <script src="https://cdn.tiny.cloud/1/lpykpjlylqbcppimw22jciqx11vtcyo7p7kahqi32k24s0fna/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.tiny.cloud/1/lpykpjlylqbcppimw22jciqx11vtcyo7p7kahqi32k24s0fna/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-bs5.min.js"></script>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">

                    <div class="card-header">Tambah Data Nasabah</div>
                    <hr />

                    <form action="{{ route('promo.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="input" class="col-sm-2 col-from-label">Nama Promo</label>
                            <div class="col-sm-10">
                                <input name="nama_promo" type="text" class="form-control" id="input"
                                    placeholder="Produk" value="{{ old('nama_promo', $data->nama_promo) }}">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Upload Gambar Baru (Opsional)</label>
                            <input type="file" name="gambar" id="gambar" class="form-control">
                            @if($data->gambar)
                                <p class="mt-2">Gambar Saat Ini:</p>
                                <img src="{{ asset('gambar_promo/' . $data->gambar) }}" alt="Gambar Produk" width="150"
                                    class="img-thumbnail">
                            @endif
                        </div>

                        <div class="form-group row">
                            <label for="input" class="col-sm-2 col-from-label">Tanggal Mulai</label>
                            <div class="col-sm-10">
                                <input name="tgl_mulai" type="date" class="form-control" id="input"
                                    value="{{ old('tgl_mulai', $data->tgl_mulai) }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="input" class="col-sm-2 col-from-label">Tanggal Selesai</label>
                            <div class="col-sm-10">
                                <input name="tgl_selesai" type="date" class="form-control" id="input"
                                    value="{{ old('tgl_selesai', $data->tgl_selesai) }}">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="jenis" class="form-label">Kategori</label>
                            <select name="kategori" id="jenis" class="form-select" required>
                                <option value="">-- Pilih Jenis --</option>
                                <option value="tabungan" {{ $data->kategori == 'Tabungan' ? 'selected' : '' }}>Tabungan
                                </option>
                                <option value="deposito" {{ $data->kategori == 'Deposito' ? 'selected' : '' }}>Deposito
                                </option>
                                <option value="kredit" {{ $data->kategori == 'Kredit' ? 'selected' : '' }}>Kredit
                                </option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label for="input" class="col-sm-2 col-from-label">Deskripsi</label>
                            <div class="col-sm-10">
                                <textarea name="deskripsi"
                                    id="perket"> {{ old('deskripsi', $data->deskripsi) }}"</textarea>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Simpan">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function setupFiturDinamis(buttonId, containerId, inputName) {
            const tambahBtn = document.getElementById(buttonId);
            const container = document.getElementById(containerId);

            tambahBtn.addEventListener('click', function () {
                const div = document.createElement('div');
                div.classList.add('fitur-group');
                div.innerHTML = `
                <input type="text" name="${inputName}"  class="form-control">
                </div>
                <button type="button" class="remove-fitur btn btn-danger">Hapus</button>
            `;
                container.appendChild(div);
            });

            container.addEventListener('click', function (e) {
                if (e.target.classList.contains('remove-fitur')) {
                    e.target.parentElement.remove();
                }
            });
        }
        // Panggil untuk kedua form
        setupFiturDinamis('tambah-fitur-1', 'fitur-container-1', 'suku_bng[]');
    </script>
    <script>
        $(document).ready(function () {
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
</body>

</html>