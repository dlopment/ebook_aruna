@extends('parstial.nav')
@section('content')
<!--Meta For No Index-->
<meta name="robots" content="noindex, Nofollow, Noimageindex">

<!-- mobile responsive meta -->
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<!-- Theme Stylesheet -->
<link href="{{ asset('x/css/style.css') }}" rel="stylesheet" />

<!--Favicon-->
<link rel="shortcut icon" href="images/favicon.svg" type="image/x-icon" />
<link rel="icon" href="images/favicon.svg" type="image/x-icon" />
<!-- Navbar Start -->
<section class="blog-single">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 order-2 order-lg-1">
                <div class="share-now">
                    <a href="#" class="scrol">Share</a>
                    <div class="sociel-icon">
                        <ul>
                            <li> <a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li> <a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li> <a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-10 order-1 order-lg-2">
                <article class="single-blog">
                    <a href="#" class="tag">{{ $berita->judul }}</a>
                    <ul class="meta">
                        <li>{{ $berita->tempat }}</li>
                        <li>
                            <i class="fa fa-clock-o"></i>
                            {{ $berita->waktu }}
                        </li>
                    </ul>
                    <img src="{{ asset($berita->gambar) }}" height="200px" weight="300px">

                    <p>{{ $berita->deskripsi }}
                    </p>
                    <div class="single-blog-banner">
                        <div class="banner"> <img src="images/blog/single-blog.png" alt="banner">
                        </div>
                        <div class="banner"> <img src="images/blog/single-blog-2.png" alt="banner">
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>
<section class="footer">
</section>

<!-- Google Map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC9rV6yesIygoVKTD6QLf_iCa9eiIIHqZ0&libraries=geometry">
</script>
<!-- Vendor JS -->
<script src="vendor/jQuery/jquery.min.js"></script>
<script src="vendor/bootstrap/bootstrap.min.js"></script>
<script src="vendor/slick/slick.min.js"></script>
<script src="vendor/g-map/gmap.js"></script>
<!-- Main JS -->
<script src="js/script.js"></script>
@endsection