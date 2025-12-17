<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <title>BPR Aruna | Detail</title>
    <!--

TemplateMo 589 lugx gaming

https://templatemo.com/tm-589-lugx-gaming

-->
</head>

<body>
    <div class="single-product section">
        <div class="container">
            <div class="row">
                <div class="container">
                    <div class="row" data-aos="fade-up" data-aos-duration="1000">
                        <div class="section-title">
                            <h3 data-aos="fade-up" data-aos-duration="1000">Produk <b>Deposito</h3>
                            <br>
                        </div>
                    </div>
                    <!-- all works -->

                    <div class="col-md-12">
                        <div class="row portfolio_container">
                            @foreach ($tabungan as $d)
                            <div class="col-md-4 photography" data-aos="fade-up" data-aos-duration="1000"
                                data-aos-delay="200">
                                <a href="{{ route('lengkap.tabungan', $d->id) }}"
                                    class="portfolio_item work-grid wow fadeInUp">
                                    <img src="{{ asset('gambar_tabungan/' . $d->gambar) }}" alt="image"
                                        class="rounded-image">
                                    <div class="portfolio_item_hover">
                                        <div class="item_info">
                                            <span>{{ $d->nama_produk }}</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row portfolio_container">
                            @foreach ($deposito as $d)
                            <div class="col-md-4 photography" data-aos="fade-up" data-aos-duration="1000"
                                data-aos-delay="200">
                                <a href="{{ route('lengkap.deposito', $d->id) }}"
                                    class="portfolio_item work-grid wow fadeInUp">
                                    <img src="{{ asset('gambar_produk/' . $d->gambar) }}" alt="image"
                                        class="rounded-image">
                                    <div class="portfolio_item_hover">
                                        <div class="item_info">
                                            <span>{{ $d->nama_produk }}</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row portfolio_container">
                            @foreach ($kredit as $d)
                            <div class="col-md-4 photography" data-aos="fade-up" data-aos-duration="1000"
                                data-aos-delay="200">
                                <a href="{{ route('lengkap.kredit', $d->id) }}"
                                    class="portfolio_item work-grid wow fadeInUp">
                                    <img src="{{ asset('gambar_kredit/' . $d->gambar) }}" alt="image"
                                        class="rounded-image">
                                    <div class="portfolio_item_hover">
                                        <div class="item_info">
                                            <span>{{ $d->nama_produk }}</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="container">
            <div class="col-lg-12">
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const passwordBenar = "aruna///"; // Ganti sesuai kebutuhan

            // Cek apakah user sudah login sebelumnya
            const sudahLogin = sessionStorage.getItem("akses_produk");

            if (sudahLogin !== "berhasil") {
                const userInput = prompt("Masukkan password untuk mengakses halaman produk:");

                if (userInput === passwordBenar) {
                    sessionStorage.setItem("akses_produk", "berhasil");
                    alert("Akses diberikan. Selamat datang.");
                } else {
                    alert("Password salah. Akses ditolak.");
                    window.location.href = "index.html"; // Redirect ke halaman lain
                }
            }
        });
    </script>

    </script>
    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/isotope.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/counter.js"></script>
    <script src="assets/js/custom.js"></script>

</body>

</html>