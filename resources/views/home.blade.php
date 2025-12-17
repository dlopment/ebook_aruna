@extends('parstial.nav')
@section('content')

<!-- HERO SECTION  -->
<div class="site-hero">
    <ul class="slides animate__animated animate__zoomIn">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($slider as $key => $slider)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <img src="{{ $slider->gambar }}" class="d-block w-100" alt="{{ $slider->title }}">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden"></span>
            </button>
            <div class="agency animate__animated animate__fadeInRight">
                <div class="col-md-5 col-sm-12">
                    <div class="row">
                    </div>
                </div>
                <div class="col-md-offset-1 col-md-6 col-sm-12">
                    <div class="row">
                        <div class="section-title">
                            <span>Kenapa Pilih Aruna</span>
                            <h1>
                                {{$slider->deskripsi}}
                            </h1>
                        </div>

                        <a href="#" class="btn green"
                            style="float:right;margin-top:30px"><span>Selengkapnya</span></a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </ul>
</div>

<!-- WHY CHOOSE US -->
<section class="services">
    <div class="container">
        <div class="row" data-aos="fade-down" data-aos-duration="1000">
            <div class="section-title">
                <span>Mengapa Harus Memilih Aruna</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
        </div>

        <div class="col-md-7 col-sm-12 services-left wow fadeInUp">
            <div class="row" style="margin-bottom:50px">
                <div class="col-md-6 col-sm-12" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                    <div class="row">
                        <i class="icon ion-ios-infinite-outline"></i>
                        <span class="montserrat-text uppercase service-title">unlimited options</span>
                        <ul>
                            <li>branding</li>
                            <li>design &amp; copywriting</li>
                            <li>concept development</li>
                            <li>user experience</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                    <div class="row">
                        <i class="icon ion-ios-shuffle"></i>
                        <span class="montserrat-text uppercase service-title">design &amp; development</span>
                        <ul>
                            <li>branding</li>
                            <li>design &amp; copywriting</li>
                            <li>concept development</li>
                            <li>user experience</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-12" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                    <div class="row">
                        <i class="icon ion-ios-cart-outline"></i>
                        <span class="montserrat-text uppercase service-title">e-commerce</span>
                        <ul>
                            <li>branding</li>
                            <li>design &amp; copywriting</li>
                            <li>concept development</li>
                            <li>user experience</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                    <div class="row">
                        <i class="icon ion-ios-settings"></i>
                        <span class="montserrat-text uppercase service-title">customizable design</span>
                        <ul>
                            <li>branding</li>
                            <li>design &amp; copywriting</li>
                            <li>concept development</li>
                            <li>user experience</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-5 col-sm-12" data-aos="fade-left" data-aos-delay="400">
            <div class="row">
                <img src="{{asset('css/aset/celengan.png')}}" alt="image">
            </div>
        </div>
    </div>
</section>


<!-- PORTFOLIO -->
<section class="portfolio">
    <div class="container">
        <div class="row" data-aos="fade-up" data-aos-duration="1000">
            <div class="section-title">
                <span>Produk Andalan Aruna</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
        </div>
        <!-- all works -->
        <div class="col-md-12">
            <div class="row">
                <!-- single work -->
                <div class="col-md-3 photography" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                    <a href="#" class="portfolio_item work-grid wow fadeInUp">
                        <img src="{{asset('aset/tabungan aruna.jpeg')}}" alt="image">
                        <div class="portfolio_item_hover">
                            <div class="item_info">
                                <span>Tabungan</span>
                                <em>Tabungan Aruna</em>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 photography" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                    <a href="#" class="portfolio_item work-grid wow fadeInUp">
                        <img src="{{asset('aset/kredit modal.png')}}" alt="image">
                        <div class="portfolio_item_hover">
                            <div class="item_info">
                                <span>KREDIT</span>
                                <em>Kredit Modal Kerja</em>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 photography" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                    <a href="#" class="portfolio_item work-grid wow fadeInUp">
                        <img src="{{asset('aset/kredit modal.png')}}" alt="image">
                        <div class="portfolio_item_hover">
                            <div class="item_info">
                                <span>KREDIT</span>
                                <em>Kredit Modal Kerja</em>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 photography" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                    <a href="#" class="portfolio_item work-grid wow fadeInUp">
                        <img src="{{asset('aset/kredit modal.png')}}" alt="image">
                        <div class="portfolio_item_hover">
                            <div class="item_info">
                                <span>KREDIT</span>
                                <em>Kredit Modal Kerja</em>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection