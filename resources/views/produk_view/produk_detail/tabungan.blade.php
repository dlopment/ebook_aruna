@extends('parstial.nav')
@section('content')
<link rel="stylesheet" href="{{asset('css/tabungan.css')}}">

<section id="section1" class="content">
    <section class="hero animate__animated animate__zoomIn" style="--img: url('{{ asset('gambar_tabungan/' . $tabungan->gambar) }}')">
        <div class="hero-content animate__animated animate__fadeInLeft">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('welcome.index') }}">Beranda</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">{{$tabungan->nama}}</li>
                </ol>
            </nav>
            <h1><b>{{$tabungan->nama}}</b></h1>
            <p>{{$tabungan->desprod}}</p>
        </div>
    </section>
</section>

<div class="container">
    <div class="text-content">
        <p>{!! $tabungan->perket !!}</p>
    </div>
</div>
<div data-aos="fade-down" data-aos-duration="1000">
    <div class="section-title">
        <span>Fitur Dan Persyaratan</span>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
</div>

<div class="container">
    <!-- Tombol untuk memunculkan pop-up modal -->
    <section id="service" class="section">
        <div class="container">
            <div class="col-sm-6 col-md-3 wow fadeInLeft">
                <div class="service">
                    <div class="icon-box">
                        <span class="icon">
                            <i class="ion-android-desktop" type="button" class="btn btn-info" data-bs-toggle="modal"
                                data-bs-target="#infopersyaratan"></i>
                        </span>
                    </div>
                    <div class="caption">
                        <h2>Diperuntukan</h2>
                        <h3>
                            {{ implode(', ', $tabungan->peruntukan) }}
                        </h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 wow fadeInLeft" data-wow-delay="0.3s">
                <div class="service">
                    <div class="icon-box">
                        <span class="icon">
                            <i class="ion-speedometer" type="button" class="btn btn-info" data-bs-toggle="modal"
                                data-bs-target="#infofitur"></i>
                        </span>
                    </div>
                    <div class="caption">
                        <h2>Suku Bunga</h2>
                        <h3>{{$tabungan->jnkwkt}}</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 wow fadeInLeft" data-wow-delay="0.6s">
                <div class="service">
                    <div class="icon-box">
                        <span class="icon">
                            <i class="ion-ios-infinite-outline" type="button" class="btn btn-info"
                                data-bs-toggle="modal" data-bs-target="#infomanfaat"></i>
                        </span>
                    </div>
                    <div class="caption">
                        <h2>Jangka Waktu</h>
                            <h3>
                                {{ implode(', ', $tabungan->suku_bng) }}
                            </h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div data-aos="fade-down" data-aos-duration="1000">
    <div class="section-title">
        <span>Biaya</span>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
</div>
<section class="container">

    <table class="table">
        <tbody>
            <tr>
                <th class="table-light"> Plafon </th>
                <td>{{ $tabungan->setmin }}
                </td>
            </tr>
            <tr>
                <th class="table-light">Setoran Bulanan Minimum</th>
                <td>
                    <ul style="list-style-type: none; padding-left: 0;">
                        <li>{{ $tabungan->setblnmin }}</li>
                    </ul>
                </td>
            </tr>
            <tr>
                <th class="table-light">Saldo Selanjutnya Minimum</th>
                <td>
                    <ul style="list-style-type: none; padding-left: 0;">
                        <li>{{ $tabungan->salselmin }}</li>
                    </ul>
                </td>
            </tr>
            <tr>
                <th class="table-light">Saldo Pengendapat Minimum</th>
                <td>
                    <ul style="list-style-type: none; padding-left: 0;">
                        <li>{{ $tabungan->setpengmin }}</li>
                    </ul>
                </td>
            </tr>

        </tbody>
    </table>
</section>

<div class="row" data-aos="fade-down" data-aos-duration="1000">
    <div class="section-title">
        <span>Produk Lainnya</span>
        <p>Produk dalam aruna memiliki produk seperti abc</p>
    </div>
</div>
<section class="container">
    @if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('tabungan.simulasi') }}" method="POST">
        @csrf
        <input type="number" name="saldoterndah" placeholder="Masukkan Minimum Saldo" value="{{ old('saldoterndah') }}">

        <input type="number" name="sukubunga" placeholder="Masukkan bunga per tahun"
            value="{{ old('sukubunga') }}">

        <input type="number" name="bulan" placeholder="Masukkan jangka waktu (bulan)" value="{{ old('bulan') }}">

        <select name="method">
            <option value="tabungan_arn" {{ old('method') == 'tabungan_arn' ? 'selected' : '' }}>Tabungan Aruna</option>
            <option value="xtra" {{ old('method') == 'xtra' ? 'selected' : '' }}>Tabungan Xtra Plus</option>
        </select>

        <button type="submit">Hitung Simulasi</button>
    </form>

    @if (session('result'))
    <div class="result">
        <h3>Hasil Simulasi:</h3>
        <table>
            <thead>
                <tr>
                    <th>Bulan</th>
                    <th>Cicilan Bulanan</th>
                </tr>
            </thead>
            <tbody>
                @foreach (session('result') as $row)
                <tr>
                    <td>{{ $row['bulan'] }}</td>
                    <td>Rp {{ $row['bunga_bersih'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
    </div>
    <!-- .container close -->
</section>
<!-- Modal Bootstrap -->
<div class="modal fade" id="infomanfaat" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Header Modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="infoModalLabel">Manfaat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Body Modal -->
            <div class="modal-body">
                <ul class="custom-list">
                    <li>
                        <span class="list-icon">✔️</span>
                        <span class="list-text">Mendapatkan bunga sangat menarik.</span>
                    </li>
                    <li>
                        <span class="list-icon">✔️</span>
                        <span class="list-text">Tersedia dalam beberapa pilihan jangka waktu (mulai dari 1 bulan, 3
                            bulan, 6 bulan, 12 bulan dan 24 bulan) dan dapat diperpanjang secara otomatis.</span>
                    </li>
                    <li>
                        <span class="list-icon">✔️</span>
                        <span class="list-text">Tidak dikenakan biaya penalty apabila dicairkan sebelum tanggal jatuh
                            tempo.</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Modal Bootstrap -->
<div class="modal fade" id="infofitur" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Header Modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="infoModalLabel">Ketentuan Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Body Modal -->
            <div class="modal-body">
                <ul class="custom-list">
                    <li>
                        <span class="list-icon">✔️</span>
                        <span class="list-text">Rekening dalam mata uang Rupiah.</span>
                    </li>
                    <li>
                        <span class="list-icon">✔️</span>
                        <span class="list-text">Diperkenankan membuka rekening bersama (joint account) "DAN" maupun
                            "ATAU".</span>
                    </li>
                    <li>
                        <span class="list-icon">✔️</span>
                        <span class="list-text">Deposito diperpanjang secara otomatis. Apabila ada penyesuaian bunga,
                            nasabah akan dikonfirmasi terlebih dahulu.</span>
                    </li>
                    <li>
                        <span class="list-icon">✔️</span>
                        <span class="list-text">Wajib memiliki rekening Tabungan Aruna.</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>


<!-- Modal Bootstrap -->
<div class="modal fade" id="infopersyaratan" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Header Modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="infoModalLabel">
                    Persyaratan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Body Modal -->
            <div class="modal-body">
                <ul class="custom-list">
                    <li>
                        <span class="list-icon">✔️</span>
                        <span class="list-text">Identitas Diri (KTP/ Kartu Keluarga).</span>
                    </li>
                    <li>
                        <span class="list-icon">✔️</span>
                        <span class="list-text">NPWP (jika ada).</span>
                    </li>
                    <li>
                        <span class="list-icon">✔️</span>
                        <span class="list-text">Mengisi formulir KYC dan specimen.</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<section>
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="card">
                    <img src="{{asset('aset/tabungan.webp')}}" class="card-img-top" alt="Kredit Konsumtif">
                    <div class="card-body text-center">
                        <h5 class="card-title">KREDIT KONSUMTIF</h5>
                        <p class="card-text">Dapatkan kredit untuk kebutuhan konsumtif Anda.</p>
                    </div>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="card">
                    <img src="{{asset('aset/deposito.jpg')}}" class="card-img-top" alt="Tabunganku">
                    <div class="card-body text-center">
                        <h5 class="card-title">TABUNGANKU</h5>
                        <p class="card-text">Mulailah menabung untuk masa depan Anda bersama kami.</p>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="card">
                    <img src="path-to-image3.jpg" class="card-img-top" alt="Tabunganku">
                    <div class="card-body text-center">
                        <h5 class="card-title">TABUNGANKU</h5>
                        <p class="card-text">Mulailah menabung untuk masa depan Anda bersama kami.</p>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="card">
                    <img src="path-to-image3.jpg" class="card-img-top" alt="Tabunganku">
                    <div class="card-body text-center">
                        <h5 class="card-title">TABUNGANKU</h5>
                        <p class="card-text">Mulailah menabung untuk masa depan Anda bersama kami.</p>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="card">
                    <img src="path-to-image3.jpg" class="card-img-top" alt="Tabunganku">
                    <div class="card-body text-center">
                        <h5 class="card-title">TABUNGANKU</h5>
                        <p class="card-text">Mulailah menabung untuk masa depan Anda bersama kami.</p>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="card">
                    <img src="path-to-image3.jpg" class="card-img-top" alt="Tabunganku">
                    <div class="card-body text-center">
                        <h5 class="card-title">TABUNGANKU</h5>
                        <p class="card-text">Mulailah menabung untuk masa depan Anda bersama kami.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script>
    const swiper = new Swiper('.mySwiper', {
        slidesPerView: 5,
        spaceBetween: 5,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
    }, );
</script>

@endsection