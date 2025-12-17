<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
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
                        <form method="POST" action="{{ URL('/berita/card') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <label for="input" class="col-sm-2 col-from-label">Judul Kegiatan</label>
                                <div class="col-sm-10">
                                    <input name="judul" type="text" class="form-control" id="input"
                                        placeholder="Masukan Masukan Judul Kegiatan">
                                </div>
                            </div>
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a comment here"
                                    name="deskripsi_singkat" type="text" class="form-control" id="floatingTextarea2"
                                    style="height: 100px"></textarea>
                                <label for="floatingTextarea2" class="col-sm-2 col-from-label">Deskripsi</label>
                            </div>
                            <div class="form-group row">
                                <label for="input" class="col-sm-2 col-from-label">Tempat</label>
                                <div class="col-sm-10">
                                    <input name="tempat" type="text" class="form-control" id="input"
                                        placeholder="Masukan Tempat Berlangsung">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="input" class="col-sm-2 col-from-label">Waktu</label>
                                <div class="col-sm-10">
                                    <input name="waktu" type="date" class="form-control" id="input">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="input" class="col-sm-2 col-from-label">Gambar Kegiatan</label>
                                <div class="col-sm-10">
                                    <input name="gambar" type="file" class="form-control" id="input"
                                        placeholder="Masukan Gambar">
                                </div>
                            </div>
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a comment here" name="deskripsi"
                                    type="text" class="form-control" id="floatingTextarea2"
                                    style="height: 100px"></textarea>
                                <label for="floatingTextarea2" class="col-sm-2 col-from-label">Deskripsi</label>
                            </div>
                            <div class="col-sm-12" align="right">
                                <a href="{{ route('berita.index') }}" class="btn btn-info"> Kembali</a>
                                <input type="reset" name="kosongkan" class="btn btn-warning" value="Kosongkan">
                                <input type="submit" class="btn btn-success" value="Simpan">
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>