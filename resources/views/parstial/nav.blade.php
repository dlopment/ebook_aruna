<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="icon" href="{{ asset('aset/LOGOVERTIKAL_BLUE.png') }}">
    <title> BPR Aruna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

</head>

<body>
    <nav class="navbar animate__animated animate__fadeInDown">
        <div class="side-bar">
            <a href="{{route('welcome.index')}}"><img src="{{ asset('aset/LOGO ARUNA HORISONTAL BLUE.png') }}" class="log"></a>
        </div>
        <div class="nav-links">
            <ul class="nav nav-underline">
                <li><a class="nav-link" href="#">LKS MO
                    </a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown">
                        Siklus penjualan
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Membangun Kebutuhan</a></li>
                        <li><a class="dropdown-item" href="#">Cross Selling</a></li>
                        <li><a class="dropdown-item" href="#">Maintenance</a></li>
                        <li><a class="dropdown-item" href="{{route('simulasi.usaha')}}">Hitung Omzet Dan Kemampuan Bayar</a></li>

                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown">
                        Layanan & Produk
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('view.tabungan')}}">Tabungan</a></li>
                        <li><a class="dropdown-item" href="{{route('view.deposito')}}">Deposito</a></li>
                        <li><a class="dropdown-item" href="{{route('view.kredit')}}">Kredit</a></li>
                        <li><a class="dropdown-item" href="{{route('view.detail')}}">Layanan</a></li>
                        <li><a class="dropdown-item" href="#">Promo</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown">
                        MO & FO
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Marketing</a></li>
                        <li><a class="dropdown-item" href="#">Funding</a></li>

                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    @yield('content')
    <section class="foter" data-aos="fade-up" data-aos-duration="1000">
        <div class="footer-container">
            <!-- Bagian Logo -->
            <div class="footer-logos">
                <img src="{{asset('css/aset/logo-bpr.png')}}" alt="BPR Logo">
                <p>PT BPR Aruna Berizin dan Diawasi Oleh OJK Serta Merupakan Peserta Penjaminan LPS.</p>
            </div>

            <!-- Navigasi Menu -->
            <div class="footer-nav">
                <p>Sejak awal berdirinya hingga saat ini, BPR Aruna secara konsisten terus berperan aktif dalam membantu
                    dan
                    meningkatkan usaha yang ditekuni oleh masyarakat khususnya untuk jenis usaha yang tergolong dalam
                    Usaha
                    Mikro Kecil Menengah (UMKM).
                </p>
            </div>
            <!-- Media Sosial -->
            <div class="footer-social">
                <a href="#"><img
                        src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEiFwyClsjtXIYZ-0VsC26mJ5cirfHXsYNDjWkAqjPOhVO9cENTVyE2z13ccP2bOfx1YR570E1b8YsciNlPelRUH1OeN6c_gJ5c7Xd_bViHjfduBfwV_tM1LBQtqcqAsdTHuvsHUCKBIz1QlZDyUQk7ZRWSWV-guQMSKZBvdqVgmsDiB7JU-PBLPw1l7J48z/s512/facebook.png"
                        alt="
                            WhatsApp"></a>
                <a href="#"><img
                        src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjtZfGQjrQgAwpaRvY_vvD39fms8fPN3cIwS_mM6zwgpbUckiK7UygN2UhOtxgtwMeFC89NIYaejeWTgM1pUit67hxLBex2pwVoutMhfc3iQ0fo6NYY35P-TgOdpxA3fi6wwW5JvF5amWF2hXrHALOGd2sN7SLl2NioGT4S3esY6z1ArbTEbaXTVPl8U4VW/s320/whatsapp.png"
                        alt="
                            Facebook"></a>
                <a href="#"><img
                        src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEg51L1s2XZLdlKJGM0xllToPS6Vp-MqAv-faUiEuCcbhidZUUqnwR0DZeZIkaD9EijenV03bDbk-iCBQCzK4OFUW0-8a1p1G_WThcbXWNm-IjnovZSDvJl6kl6yZNsU1UgNk3DPAQix61MUgrNC3MRr6uTtD_7MLLflB5zKR18dhIC8FiHXK6XxNaRbDtL0/s512/social.png"
                        alt="
                            Instagram"></a>
            </div>
        </div>
    </section>
    <div class="bawah">
        <!-- Konten footer di sini -->
        <p>PT BPR Aruna</p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>