@extends('layout.customer')
@section('title','Beli paket iklan')
@section('content')
<!-- Sub banner start -->
<div class="sub-banner overview-bgi">
        <div class="overlay">
            <div class="container">
                <div class="breadcrumb-area">
                    <h1>Beli Paket Premium</h1>
                    <ul class="breadcrumbs">
                        <li><a href="index.html">Beranda</a></li>
                        <li class="active">Paket</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Sub Banner end -->
    
    <!-- Pricing tables 3 start -->
    <div class="pricing-tables-3 content-area-8">
        <div class="container">
            <div class="main-title mb">
                <h1>Paket yang tersedia</h1>
            </div>
            <div class="row">
                @foreach ($paket as $p)
                    <div class="col-lg-3 col-md-3" >
                        <div class="pricing-3 mb-50 clearfix">
                            <div class="price-header">
                                <div class="title">{{$p->nama_paket}}</div>
                                <div class="price">{{$p->harga}}</div>
                            </div>
                            <div class="content">
                                <ul>
                                    <li>{{$p->waktu}}</li>
                                    <li>
                                    @if ($p->video=="Y")
                                       <i class="fa fa-check"></i> Video 
                                    @else
                                        <i class="fa fa-close"></i> Video 
                                    @endif
                                    </li>
                                    <li>
                                    @if ($p->top_rekomen=="Y")
                                       <i class="fa fa-check"></i> Top Rekomen 
                                    @else
                                        <i class="fa fa-close"></i> Top Rekomen 
                                    @endif
                                    </li>
                                    <li>
                                        <b>{{$p->max_gambar}} gambar</b> /hunian 
                                    </li>
                                    <li>
                                    @if ($p->free_ads=="Y")
                                       <i class="fa fa-check"></i> Free Ads ke 50 web
                                    @else
                                        <i class="fa fa-close"></i> Free Ads ke 50 web
                                    @endif
                                    </li>
                                    <li>
                                        @if ($p->max_iklan>0)
                                            <b>{{$p->max_iklan}} Maksimum Iklan</b>
                                        @else
                                            <b style="color:gold">Iklan Takterbatas</b>
                                        @endif
                                    </li>
                                </ul>
                                @if ()
                                <div class="button"><a href="#" class="btn btn-outline pricing-btn">Beli sekarang</a></div>
                                @endif
                            </div>
                        </div>
                    </div> 
                @endforeach
            </div>
        </div>
    </div>
    <!-- Pricing tables 3 end -->
@endsection
@section('footer')
    
@endsection