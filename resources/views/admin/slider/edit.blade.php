@extends('parstial.main')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ubah Data Produk</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form method="POST" action="{{ route('slider.update', $data->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="judul_gambar" class="col-sm-2 col-form-label">Judul Gambar</label>
                            <div class="col-sm-10">
                                <input name="judul_gambar" type="text" class="form-control" id="judul_gambar"
                                    placeholder="Masukan Nama" value="{{ old('judul_gambar', $data->judul_gambar) }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="harga_pokok" class="col-sm-2 col-form-label">Gambar</label>
                            <div class="col-sm-10">
                                <input name="gambar" type="file" class="form-control" id="gambar"
                                    value="{{ old('gambar', $data->gambar) }}">
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
@endsection