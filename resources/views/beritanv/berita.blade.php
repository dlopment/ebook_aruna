@extends('parstial.nav')
@section('content')
<link rel="stylesheet" href="{{ asset('css/berita.css') }}">
<link href="css/responsive.css" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />


<section class="section">

    <section id="section1" class="content">
        <section class="hero animate__animated animate__zoomIn">
            <div class="hero-content animate__animated animate__fadeInLeft">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                    aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('welcome.index') }}">Beranda</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Kontak</li>
                    </ol>
                </nav>
                <h1>Your Dream Home, No Longer A Dream</h1>
                <p>jika kamu dadalaas</p>
                <a href="#">MORE &gt;
                </a>
            </div>
        </section>

        <footer class="about-footer">
            <h3 class="about-title" data-aos="fade-up" data-aos-duration="1000">Tentang BPR Aruna</h3>
            <div class="about-description">
                <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">PT BPR Aruna (“BPR Aruna”) adalah
                    bank perekonomian rakyat yang BPR Aruna
                    secara
                    konsisten terus berperan aktif dalam membantu dan meningkatkan usaha yang
                    ditekuni
                    oleh masyarakat khususnya untuk jenis usaha yang tergolong dalam Usaha Mikro
                    Kecil
                    Menengah</p>
            </div>
        </footer>
    </section>
    <div class="container" data-aos="fade-up" data-aos-duration="1000">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <div class="page-wrapper">
                    <div class="blog-list clearfix">
                        @foreach ($berita as $d)
                            <div class="blog-box row">
                                <div class="col-md-4">
                                    <div class="post-media">
                                        <a href="tech-single.html" title="">
                                            <img src="{{ $d->gambar }}" alt="" class="img-fluid">
                                            <div class="hovereffect"></div>
                                        </a>
                                    </div><!-- end media -->
                                </div><!-- end col -->

                                <div class="blog-meta big-meta col-md-8">
                                    <h4><a href="{{route('lengkap.berita', $d->id)}}  ">{{ $d->judul }}</a></h4>
                                    <p>{{ $d->deskripsi_singkat }}</p>
                                    <small class="firstsmall"><a class="bg-orange" href="tech-category-01.html"
                                            title="">Reviews</a></small>
                                    <small><a href="tech-single.html" title="">{{ $d->tanggal }}</a></small>
                                    <small><a href="tech-author.html" title="">{{ $d->tempat }}</a></small>

                                </div><!-- end meta -->
                            </div><!-- end blog-box -->
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12" data-aos="fade-up" data-aos-duration="1000">
        <hr>
        {{ $berita->links() }}
    </div><!-- end row -->
    <section id="section3" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
        <footer>
            <hr>
            <section class="foter">
                <div class="footer-container">
                    <!-- Bagian Logo -->
                    <div class="footer-logos">
                        <img src="{{asset('aset/logo-bpr.png')}}" alt="BPR Logo">
                        <img src="{{asset('aset/lp.png')}}" alt="LPS Logo">
                        <img src="{{asset('aset/ic.png')}}" alt="Ayo ke Bank Logo">

                        <p>PT BPR Aruna Berizin dan Diawasi Oleh OJK Serta Merupakan Peserta Penjaminan LPS.</p>
                    </div>

                    <!-- Navigasi Menu -->
                    <div class="footer-nav">
                        <p>Sejak awal berdirinya hingga saat ini, BPR Aruna secara konsisten terus berperan aktif dalam
                            membantu
                            dan
                            meningkatkan usaha yang ditekuni oleh masyarakat khususnya untuk jenis usaha yang tergolong
                            dalam
                            Usaha
                            Mikro Kecil Menengah (UMKM).
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
                <p>&copy; 2024 PT BPR Aruna</p>
            </div>
        </footer>
    </section>
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</section>
@endsection