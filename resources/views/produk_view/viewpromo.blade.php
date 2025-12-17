@extends('parstial.nav')
@section('content')
<div class="single-product section">
    <div class="container">
        <div class="row">
            <div class="container">
                <div class="row" data-aos="fade-up" data-aos-duration="1000">
                    <div class="section-title">
                        <h3 data-aos="fade-up" data-aos-duration="1000">Produk <b>Kredit</h3>
                        <br>
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
@endsection