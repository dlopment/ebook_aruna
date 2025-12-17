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
                    <a href="{{ route('admdeposito.create') }}" class="btn btn-outline-primary">Tambah Data</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Produk</th>
                                    <th>Gambar</th>
                                    <th>Deskripsi Produk</th>
                                    <th>Suku Bunga</th>
                                    <th>Setoran Minimum</th>
                                    <th>Setoran Selanjutnya Minimum</th>
                                    <th>Saldo Pengendapaan</th>
                                    <th>Jangka Waktu</th>
                                    <th>Kelbihan & Persyaratan</th>
                                    <th>Edit</th>
                                    <th>Hapus</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($data as $d)
                                <tr>
                                    <td>{{ $d->id }}</td>
                                    <td>{{ $d->nama_produk }}</td>
                                    <td>
                                        <!-- Tombol untuk membuka modal -->
                                        <button type="button" class="btn btn-sm btn-primary"
                                            data-bs-toggle="modal" data-bs-target="#modalGambar{{ $d->id }}">
                                            Lihat Gambar
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="modalGambar{{ $d->id }}" tabindex="-1"
                                            aria-labelledby="labelGambar{{ $d->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="labelGambar{{ $d->id }}">
                                                            Gambar Produk: {{ $d->nama }}</h5>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal" aria-label="Tutup"></button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <img src="{{ asset('gambar_produk/' . $d->gambar) }}"
                                                            alt="Gambar Produk" class="img-fluid rounded">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <td>{{ implode(', ', $d->desprod) }}</td>
                                    <td>{{ $d->sk_bunga }}</td>
                                    <td>{{ $d->jang_wkt }}</td>
                                    <td>{{ $d->setawmin }}</td>
                                    <td>{{ $d->setselmin }}</td>
                                    <td>{{ $d->salpeng }}</td>
                                    <td>
                                        <p style="font-family: 'Times New Roman', Times, serif;">{!! $d->kel !!}</p>
                                    </td>
                                    <td><a href="{{ route('admdeposito.edit', $d->id) }}"
                                            class="btn btn-warning">Edit</a>
                                    </td>
                                    <td>
                                        <form method="post"
                                            action="{{ route('admdeposito.destroy', $d->id) }}">
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
        <!-- /.container-fluid -->
    </div>
</div>
<!-- End of Main Content -->
@endsection