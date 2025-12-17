@extends('parstial.main')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ubah Data Berita</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form method="POST" action="{{ route('berita.update', $data->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="judul" class="col-sm-2 col-form-label">Judul Berita</label>
                            <div class="col-sm-10">
                                <input name="judul" type="text" class="form-control" id="judul"
                                    placeholder="Masukan Nama" value="{{ old('judul', $data->judul) }}">
                            </div>
                        </div>

                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" name="deskripsi_singkat"
                                type="text" class="form-control" id="floatingTextarea2" style="height: 100px"
                                value="{{ old('deskripsi', $data->deskripsi) }}"></textarea>
                            <label for="floatingTextarea2" class="col-sm-2 col-from-label">Deskripsi Singkat</label>
                        </div>

                        <div class="form-group row">
                            <label for="tempat" class="col-sm-2 col-form-label">Tempat</label>
                            <div class="col-sm-10">
                                <input name="tempat" type="number" class="form-control" id="tempat"
                                    value="{{ old('tempat', $data->tempat) }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="waktu" class="col-sm-2 col-form-label">Waktu</label>
                            <div class="col-sm-10">
                                <input name="waktu" type="date" class="form-control" id="waktu"
                                    value="{{ old('stok', $data->waktu) }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                            <div class="col-sm-10">
                                <input name="gambar" type="text" class="form-control" id="gambar"
                                    value="{{ old('gambar', $data->gambar) }}">
                            </div>
                        </div>

                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" name="deskripsi"
                                type="text" class="form-control" id="floatingTextarea2" style="height: 100px"
                                value="{{ old('deskripsi', $data->deskripsi) }}"></textarea>
                            <label for="floatingTextarea2" class="col-sm-2 col-from-label">Deskripsi</label>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection