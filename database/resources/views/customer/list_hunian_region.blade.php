@extends('layout.customer')
@section('title',"Hunian Region: ".$region)
    <div style="padding-top:20px" class="properties-section-body content-area">
        <div class="container">
            <div class="row">
                @if (count($properti)<1)
                    <div class="error404-content">
                        <h1><span class="fa fa-search"></span></h1>
                        <h2>Kami tidak menemukan yang kamu inginkan</h2>
                        <p>silahkan masukkan data pencarian lainnya</p>
                    </div>
                @else
                <div class="col-lg-12 col-md-12 col-xs-12">
                    <!-- Option bar Start -->
                    <div class="option-bar">
                        <div class="row">
                        <div class="col-lg-6 col-md-5 col-sm-5 col-xs-6">
                            <h4>Daftar Hunian</h4>
                            </div>
                            <div class="col-lg-6 col-md-7 col-sm-7 col-xs-6 cod-pad">
                                <div class="sorting-options">
                                    <select class="sorting">
                                    <option>Terbaru</option>
                                    <option>Terlama</option>
                                    <option>Properties (High To Low)</option>
                                    <option>Properties (Low To High)</option>
                                    </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Option bar end -->
                    <div class="clearfix"></div>

                    <!-- Property grid start -->
                    <div class="row">
                        {{-- loop properti --}}
                        @foreach ($properti as $p)
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 wow fadeInUp delay-03s">
                                    <!-- Property start -->
                                    <div class="property">
                                        <!-- Property img -->
                                        <div class="property-img">
                                            @if (!empty($jarak))
                                                <div style="background: #2a2e2742;" class="property-tag button alt featured">
                                                    @if ($p->distance<1)
                                                    <h5 style="color: #ffffff;">{{intval($p->distance*1000)}}m</h5> dari lokasimu
                                                    @else
                                                        <h5 style="color: #ffffff;">{{intval($p->distance)}}km</h5> dari lokasimu
                                                    @endif
                                                </div>
                                            @endif
                                            <div class="property-tag button sale"> {{$p->status}}</div>
                                            <div class="property-price">{{$p->harga}}</div>
                                            <img src="/{{$p->link}}" alt="fp" class="img-responsive">
                                            <div class="property-overlay">
                                                <a href="/detail/properti/{{$p->id_properti}}" class="overlay-link">
                                                    <i style="padding-top: 30%;" class="fa fa-link"></i>
                                                </a>
                                                <a onclick="loadmodal('{{$p->id_properti}}')" class="overlay-link property-video" title="Lexus GS F">
                                                    <i style="padding-top: 30%;" class="fa fa-video-camera"></i>
                                                </a>
                                                <div onclick="magnify('{{$p->id_properti}}')" id="imgmagnify" class="property-magnify-gallery">
                                                    <a  href="{{$p->link}}" class="overlay-link">
                                                        <i style="padding-top: 30%;" class="fa fa-expand"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Property content -->
                                        <div class="property-content">
                                            <!-- title -->
                                            <h1 class="title">
                                                <a href="/detail/properti/{{$p->id_properti}}">{{$p->properti}}</a>
                                            </h1>
                                            <!-- Property address -->
                                            <h3 class="property-address">
                                                <a href="/detail/properti/{{$p->id_properti}}">
                                                    <i class="fa fa-map-marker"></i>{{$p->alamat}}
                                                </a>
                                            </h3>
                                            <!-- Facilities List -->
                                            <ul class="facilities-list clearfix">
                                                @if ($p->kamar>0)
                                                <li>
                                                    <i class="flaticon-bed"></i>
                                                    <span>{{$p->kamar}} Kamar</span>
                                                </li>
                                                @endif
                                                @if ($p->tv>0)
                                                <li>
                                                    <i class="flaticon-monitor"></i>
                                                    <span>{{$p->tv}} Tv</span>
                                                </li>
                                                @endif
                                                @if ($p->toilet>0)
                                                <li>
                                                    <i class="flaticon-holidays"></i>
                                                    <span>{{$p->toilet}} Toilet</span>
                                                </li>
                                                @endif
                                                @if ($p->kamar>0)
                                                <li>
                                                    <i class="flaticon-vehicle"></i>
                                                    <span>{{$p->garasi}} Garasi</span>
                                                </li>
                                                @endif
                                                @if ($p->balkon>0)
                                                <li>
                                                    <i class="flaticon-building"></i>
                                                    <span>{{$p->balkon}} Balkon</span>
                                                </li>
                                                @endif
                                            </ul>
                                            <!-- Property footer -->
                                            <div class="property-footer">
                                                <span class="left">
                                                    <a href="#"><i class="fa fa-user"></i>{{$p->pemilik}}</a>
                                                </span>
                                                <span class="right">
                                                    <i class="fa fa-calendar"></i>{{$p->diupdate_pada}}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Property end -->
                            </div>
                        @endforeach
                        
                    </div>
                    <!-- Property grid end -->

                    <!-- Page navigation start -->
                    {{-- <nav aria-label="Page navigation">
                        <ul class="pagination">
                            <li>
                                <a href="properties-grid-leftside.html" aria-label="Previous">
                                    <span aria-hidden="true">«</span>
                                </a>
                            </li>
                            <li><a href="properties-grid-rightside.html">1 <span class="sr-only">(current)</span></a></li>
                            <li><a href="properties-grid-leftside.html">2</a></li>
                            <li class="active"><a href="properties-grid-fullwidth.html">3</a></li>
                            <li >
                                <a href="properties-grid-fullwidth.html" aria-label="Next">
                                    <span aria-hidden="true">»</span>
                                </a>
                            </li>
                        </ul>
                    </nav> --}}
                    <!-- Page navigation end-->
                </div> 
                @endif
            </div>
        </div>
    </div>
@section('content')
@endsection