@extends('parstial.main');
@section('content')
<link rel="stylesheet" href="{{ asset('css/beritaindex.css') }}">
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
                        <li class="breadcrumb-item"><a href="#">Dhasboard</a></li>
                        <li class="breadcrumb-item active">Tabungan</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('alskredit.create')  }}" class="btn btn-outline-primary"><i
                            class="fas fa-edit"></i>Tambah</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Porduk Relation</th>
                                    <th>Produk</th>
                                    <th>Setoran Awal</th>
                                    <th>Bunga</th>
                                    <th>Biaya Admin</th>
                                    <th>Akses</th>
                                    <th>Fleksibilat</th>
                                    <th>Kelebihan</th>
                                    <th>Kekurangan</th>
                                    <th>Edit</th>
                                    <th>Hapus</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($dbals as $d)
                                <tr>
                                    <td>{{ $d->id }}</td>
                                    <td>{{ $d->idkred }}</td>
                                    <td>{{ $d->produk }}</td>
                                    <td>{{ $d->setaw }}</td>
                                    <td>{{ $d->bunga }}</td>
                                    <td>{{ $d->admin }}</td>
                                    <td>{{ $d->akses }}</td>
                                    <td>{{ $d->flex }}</td>
                                    <td>{{ implode(', ', $d->kel) }}</td>
                                    <td>{{ implode(', ', $d->kek) }}</td>
                                    <td><a href="{{ route('alukredit.edit', $d->id) }}"
                                            class="btn btn-warning">Edit</a>
                                    </td>
                                    <td>
                                        <form method="post"
                                            action="{{ route('admtabungan.destroy', $d->id) }}">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class="btn btn-danger" type="submit">Hapus</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection