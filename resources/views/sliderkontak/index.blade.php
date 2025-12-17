@extends('parstial.main');
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Slider</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div align="left">
                        <a href="{{ URL('sliderberita/tambah') }}" class="btn btn-success"><i
                                class="fas fa-edit"></i>Tambah</a>
                        <div>&nbsp; <br /></div>
                    </div>
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right"
                                placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <th>No</th>
                            <th>Nama Gambar</th>
                            <th>Gambar</th>
                            <th>Waktu ditambahkan</th>
                            <th>Aksi</th>
                        </thead>

                        <tbody>
                            @foreach ($berita as $d)
                            <tr>
                                <td>{{ $d->id }}</td>
                                <td>{{ $d->judul_gambar }}</td>
                                <td><img src="{{ $d->gambar }}" height="100" weight="150"></td>
                                <td>{{ $d->created_at }}</td>

                                <td><a href="{{ route('sliderberita.edit', $d->id) }}" class="btn btn-primary"><i
                                            class="fas fa-pen"></i> Edit</a>
                                </td>
                                <td>
                                    <form method="post" action="{{ route('sliderberita.destroy', $d->id) }}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="btn btn-danger" type="submit"><i class="fas fa-trash-alt"></i>
                                            Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection