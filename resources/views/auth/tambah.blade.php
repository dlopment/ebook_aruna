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
                        <form method="POST" action="{{ URL('/register') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <label for="input" class="col-sm-2 col-from-label">Nama</label>
                                <div class="col-sm-10">
                                    <input name="name" type="text" class="form-control" id="input"
                                        placeholder="Masukan Masukan Judul Kegiatan">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="input" class="col-sm-2 col-from-label">Email</label>
                                <div class="col-sm-10">
                                    <input name="email" type="text" class="form-control" id="input"
                                        placeholder="Masukan email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="input" class="col-sm-2 col-from-label">Password</label>
                                <div class="col-sm-10">
                                    <input name="password" type="password" class="form-control" id="input"
                                        placeholder="Masukan Password Anda">
                                </div>
                            </div>
                            <div class="col-sm-12" align="right">
                                <a href="{{ route('user') }}" class = "btn btn-info"> Kembali</a>
                                <input type="reset" name = "kosongkan" class="btn btn-warning" value="Kosongkan">
                                <input type="submit" class="btn btn-success" value="Simpan">
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
