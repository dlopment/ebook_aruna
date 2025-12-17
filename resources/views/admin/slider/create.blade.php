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

                        <div class="card-header">Tambah Data Slider</div>
                        <hr />
                        <form method="POST" action="{{ URL('/slider') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <label for="input" class="col-sm-2 col-from-label">Judul</label>
                                <div class="col-sm-10">
                                    <input name="judul_gambar" type="text" class="form-control" id="input"
                                        placeholder="Masukan Nama">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="input" class="col-sm-2 col-from-label">Gambar</label>
                                <div class="col-sm-10">
                                    <input name="gambar" type="file" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="input" class="col-sm-2 col-from-label">Deskripsi</label>
                                <div class="col-sm-10">
                                    <textarea name="deskripsi" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12" align="right">
                                <a href="{{ route('slider.index') }}" class="btn btn-info"> Kembali</a>
                                <input type="reset" name="kosongkan" class="btn btn-warning" value="Kosongkan">
                                <input type="submit" class="btn btn-success" value="Simpan">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>