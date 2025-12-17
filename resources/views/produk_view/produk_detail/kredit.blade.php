@extends('parstial.nav')
@section('content')
<link rel="stylesheet" href="{{asset('css/kredit.css')}}">
<section id="section1" class="content">
    <section class="hero animate__animated animate__zoomIn" style="--img: url('{{ asset('gambar_kredit/' . $kredit->gambar) }}')">
        <div class="hero-content animate__animated animate__fadeInLeft">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('welcome.index') }}">Beranda</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">{{$kredit->nama}}</li>
                </ol>
            </nav>
            <h1><b>{{$kredit->nama_produk}}</b></h1>
            <p>{{ implode(', ', $kredit->desprod)}}</p>
        </div>
    </section>
</section>

<div class="container">
    <div class="text-content">
        <p>{{ implode(', ', $kredit->desprod)}}</p>
    </div>
</div>
<div data-aos="fade-down" data-aos-duration="1000">
    <div class="section-title">
        <span>Fitur Dan Persyaratan</span>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
</div>

<!-- Tombol untuk memunculkan pop-up modal -->
<section id="service" class="section">
    <div class="container">
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
                    <h3></h3>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
<div class="row">
    <div class="col-4">
        <nav id="navbar-example3" class="h-100 flex-column align-items-stretch pe-4 border-end">
            <nav class="nav nav-pills flex-column">
                <a class="nav-link" href="#item-1">Item 1</a>
                <nav class="nav nav-pills flex-column">
                    <a class="nav-link ms-3 my-1" href="#item-1-1">Item 1-1</a>
                    <a class="nav-link ms-3 my-1" href="#item-1-2">Item 1-2</a>
                </nav>
                <a class="nav-link" href="#item-2">Item 2</a>
                <a class="nav-link" href="#item-3">Item 3</a>
                <nav class="nav nav-pills flex-column">
                    <a class="nav-link ms-3 my-1" href="#item-3-1">Item 3-1</a>
                    <a class="nav-link ms-3 my-1" href="#item-3-2">Item 3-2</a>
                </nav>
            </nav>
        </nav>
    </div>

    <div class="col-8">
        <div data-bs-spy="scroll" data-bs-target="#navbar-example3" data-bs-smooth-scroll="true" class="scrollspy-example-2" tabindex="0">
            <div id="item-1">
                <h4>Item 1</h4>
                <p>...</p>
            </div>
            <div id="item-1-1">
                <h5>Item 1-1</h5>
                <p>...</p>
            </div>
            <div id="item-1-2">
                <h5>Item 1-2</h5>
                <p>...</p>
            </div>
            <div id="item-2">
                <h4>Item 2</h4>
                <p>...</p>
            </div>
            <div id="item-3">
                <h4>Item 3</h4>
                <p>...</p>
            </div>
            <div id="item-3-1">
                <h5>Item 3-1</h5>
                <p>...</p>
            </div>
            <div id="item-3-2">
                <h5>Item 3-2</h5>
                <p>...</p>
            </div>
        </div>
    </div>
</div>
<div data-aos="fade-down" data-aos-duration="1000">
    <div class="section-title">

        <span>Biaya</span>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua.</p>
        <section class="container">
            <table>
                <tbody>
                    <tr>
                        <th>Setoran Bulanan Minimum</th>
                        <td>
                            {{ $kredit->kelebihan }}
                        </td>
                    </tr>
                    <tr>
                        <th>Saldo Selanjutnya Minimum</th>
                        <td>
                            {{ $kredit->peryrtnketum }}
                        </td>
                    </tr>
                    <tr>
                        <th>Non Perorangan</th>
                        <td>
                            {{ $kredit->non_per }}
                        </td>
                    </tr>
                    <tr>
                        <th>Jangka Waktu</th>
                        <td>
                            {{ implode(', ', $kredit->jnk_waktu)}}
                        </td>
                    </tr>

                    <tr>
                        <th>Saldo Pengendapat Minimum</th>
                        <td>
                            {{$kredit->bunga}}
                        </td>
                    </tr>

                    <tr>
                        <th>Saldo Pengendapat Minimum</th>
                        <td>
                            {{ implode(', ', $kredit->desprod) }}
                        </td>
                    </tr>
                </tbody>
            </table>
    </div>
</div>
</section>


<div class="row" data-aos="fade-down" data-aos-duration="1000">
    <div class="section-title">
        <span>Simulasi</span>
        <p>Produk dalam aruna memiliki produk seperti abc</p>
    </div>
</div>
<div class="container-simulasi">
    {{-- Tampilkan error --}}
    @if ($errors->any())
    <div class="error-box">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    {{-- Form Input --}}
    <form action="{{ route('simulasi.kredit') }}" method="POST">
        @csrf

        <input type="number" name="pokokPinjaman" placeholder="Masukkan jumlah pinjaman"
            value="{{ old('pokokPinjaman') }}">

        <input type="number" name="bungaTahunan" placeholder="Masukkan bunga per tahun"
            value="{{ old('bungaTahunan') }}">

        <input type="number" name="tenor" placeholder="Masukkan jangka waktu (bulan)"
            value="{{ old('tenor') }}">

        <input type="date" name="tanggalMulai" value="{{ old('tanggalMulai') }}">

        <select name="method">
            <option value="bungamenurun" {{ old('method') == 'bungamenurun' ? 'selected' : '' }}>Bunga Menurun</option>
            <option value="calculatetetap" {{ old('method') == 'calculatetetap' ? 'selected' : '' }}>Bunga Tetap</option>
        </select>

        <button type="submit">Hitung Simulasi</button>
    </form>

    {{-- Hasil Simulasi --}}
    @if (session('data'))
    <h3 class="mt-4">Hasil Simulasi:</h3>

    <div class="table">
        <table>
            <thead>
                <tr>
                    <th>Bulan</th>
                    <th>Tanggal</th>
                    <th>Saldo Awal</th>
                    <th>Cicilan Pokok</th>
                    <th>Bunga</th>
                    <th>Angsuran</th>
                    <th>Saldo Akhir</th>
                </tr>
            </thead>
            <tbody>
                @foreach (session('data') as $row)
                <tr>
                    <td>{{ $row['bulan_ke'] }}</td>
                    <td>{{ $row['tanggal'] }}</td>
                    <td>{{ $row['saldo_awal'] }}</td>
                    <td>{{ $row['cicilan_pokok'] }}</td>
                    <td>{{ $row['bunga'] }}</td>
                    <td>{{ $row['angsuran'] }}</td>
                    <td>{{ $row['saldo_akhir'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>

<div class="alur-wrapper">
    <div class="row" data-aos="fade-down" data-aos-duration="1000">
        <div class="section-title">
            <span>Alur Proses Pengajuan</span>
            <p>Produk dalam aruna memiliki produk seperti abc</p>
        </div>
    </div>
    <div class="flow-container">
        @foreach ($dbalur as $step)
        <div class="flow-box" onclick="toggleDetail({{ $step->id }})">
            <div class="flow-number">{{ $loop->iteration }}</div>
            <div class="flow-title">{{ $step->judul }}</div>
            <div class="flow-text">{{ $step->deskripsi }}</div>
            <div id="detail-{{ $step->id }}" class="flow-detail" style="display:none;">
                {{ implode(', ', $step->daftar) }}
            </div>

        </div>
        @endforeach
    </div>

    <div class="highlight-box">
        <b>Dokumen Yang Harus Dipersiapkan Konsumen:</b>
        <ul>
            <li>KTP</li>
            <li>Nomor telepon & email</li>
            <li>Surat kuasa jika diwakilkan</li>
            <li>Kronologi pengaduan</li>
            <li>Dokumen pendukung lain (jika ada)</li>
        </ul>
    </div>
    <div class="footer-info">
        Pengaduan lisan: max 5 hari kerja · Pengaduan tertulis: max 10 hari kerja
    </div>
</div>

<div class="row" data-aos="fade-down" data-aos-duration="1000">
    <div class="section-title">
        <span>Analisa Kompetitor</span>
        <p>Produk dalam aruna memiliki produk seperti abc</p>
    </div>
</div>
<div class="container-simulasi">
    <table class="table">
        <thead>
            <tr>
                <th>Produk</th>
                <th>Setoran Awal</th>
                <th>Bunga</th>
                <th>Biaya Admin</th>
                <th>Akses</th>
                <th>Fleksibilat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dbals as $d)
            <tr>
                <td>{{ $d->produk }}</td>
                <td>{{ $d->setaw }}</td>
                <td>{{ $d->bunga }}</td>
                <td>{{ $d->admin }}</td>
                <td>{{ $d->akses }}</td>
                <td>{{ $d->flex }}</td>
            </tr>

        </tbody>
    </table>
    @endforeach
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
    <div class="row" data-aos="fade-down" data-aos-duration="1000">
        <div class="section-title">
            <span>Simulasi</span>
            <p>Produk dalam aruna memiliki produk seperti abc</p>
        </div>
    </div>
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

<script>
    function toggleDetail(id) {
        const box = document.getElementById('detail-' + id);
        box.style.display = box.style.display === "block" ? "none" : "block";
    }
</script>

@endsection