@extends('layout.customer')
@section('title',$title)
@section('meta-desk','Temukan hunian dengan harga termurah, terpercaya, dan berkualitas hanya disini...')
@section('meta-img','/img/metaimg2.jpg')
@section('content')
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
                @if(!empty($pencarian))
                <div style="text-align:center;height:auto" class="option-bar">
                    <h4><i class="fa fa-search"></i>
                     Ditemukan {{$pencarian}}</h4>
               </div>
               @endif
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
                                                <h5 style="color: #ffffff;">{{intval($p->distance*1000)}}m</h5> dari
                                                    @if (!empty($tag))
                                                        @if ($tag=="kampus")
                                                        {{$tag."mu"}}
                                                        @else
                                                        tujuanmu
                                                        @endif
                                                    @else
                                                        lokasimu
                                                    @endif 
                                                @else
                                                    <h5 style="color: #ffffff;">{{intval($p->distance)}}km</h5> dari 
                                                    @if (!empty($tag))
                                                        @if ($tag=="kampus")
                                                        {{$tag."mu"}}
                                                        @else
                                                        tujuanmu
                                                        @endif
                                                    @else
                                                        lokasimu
                                                    @endif
                                                @endif
                                            </div>
                                        @endif
                                        <div class="property-tag button sale"> {{$p->kat}}</div>
                                        <div class="property-price">{{$p->harga}}</div>
                                        <img style="object-fit: cover;width: 360px;height: 270px" src="/{{$p->link}}" alt="Gambar {{$p->properti}}" class="img-responsive">
                                        <div class="property-overlay">
                                            <a onclick="showmap('{{$p->properti}}','{{$p->alamat}}',{{$p->lat}},{{$p->lng}})" href="#showmap" class="overlay-link">
                                                <i style="padding-top: 30%;" class="fa fa-map-o"></i>
                                            </a>
                                            <a onclick="loadmodal('{{$p->id_properti}}')" class="overlay-link property-video" title="Lihat gambar">
                                                <i style="padding-top: 30%;" class="fa fa-eye"></i>
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
                                        <h1 style="height: 30px;" class="title">
                                            <a href="/detail/properti/{{$p->id_properti}}">{{$p->properti}}</a>
                                        </h1>
                                        <!-- Property address -->
                                        <h3 class="property-address">
                                            <a href="/detail/properti/{{$p->id_properti}}">
                                                <i class="fa fa-map-marker"></i>{{substr($p->alamat, 0, 70) . '...'}}<a style="color:#d20023" href="/detail/properti/{{$p->id_properti}}">lihat detail.</a>
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
@endsection
@section('footer')
    <!-- Properti Modal -->
    <div class="modal property-modal fade" id="propertyModal" tabindex="-1" role="dialog" aria-labelledby="carModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="nama">
                    </h5>
                    <p id="lokasi">
                    </p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row modal-raw">
                        <div class="col-lg-5 modal-left">
                            <div class="modal-left-content">
                                <div class="bs-example" data-example-id="carousel-with-captions">
                                    <div class="carousel slide" id="properties-carousel" data-ride="carousel">
                                        <div id="imgcarausel" class="carousel-inner" role="listbox">
                                        </div>
                                        <a class="control control-prev" href="#properties-carousel" role="button" data-slide="prev">
                                            <i class="fa fa-angle-left"></i>
                                        </a>
                                        <a class="control control-next" href="#properties-carousel" role="button" data-slide="next">
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-7 modal-right">
                            <div class="modal-right-content bg-white">
                                <strong class="price">
                                </strong>
                                <section>
                                    <h3>Fitur</h3>
                                    <div class="features">
                                        <ul class="bullets">
                                        </ul>
                                    </div>
                                </section>
                                <section>
                                    <h3>Detail harga</h3>
                                    <dl id="detailharga">
                                    </dl>
                                </section>
                                <section>
                                    <h3>Deskripsi</h3>
                                    <p id="desk"></p>
                                </section>
                                <a id="lihatdetail" class="btn button-sm button-theme">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- map Modal --}}

    <div class="modal property-modal fade" id="mapModal" tabindex="-1" role="dialog" aria-labelledby="carModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="nama-prop">
                    </h5>
                    <p id="lokasi-prop">
                    </p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div style="display:block" class="row modal-raw">
                        <div id="prop-map" style="height:400px"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    {{-- <div class="modal fade" id="mapModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <div style="width:300px;height:300px" id="prop-map">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div> --}}

    <script>
    var token='{{csrf_token()}}';
    var map;
    var pos;
    function showmap(nama,lokasi,lat,lng) {
        $("#nama-prop").text(nama);
        $("#lokasi-prop").text(lokasi);
        $("#mapModal").modal("show");
        pos={
            lat:lat,
            lng:lng
        }
    }

    $("#mapModal").on("shown.bs.modal", function () {
        map = new google.maps.Map(document.getElementById('prop-map'), {zoom: 14, center: pos});
        $("#mapModal").css("width", "100%");
        google.maps.event.trigger(map, "resize");
        var marker = new google.maps.Marker({
          position: pos,
          map: map,
          title: 'Lokasi hunian'
        });
        map.setCenter({pos});
    });

    function loadmodal(id) {
        $(".new").remove();
        $('#propertyModal').modal('show');
        $("#lihatdetail").attr("href", "/detail/properti/"+id);
        console.log("id:"+id);
        $.ajax({
            type: "POST",
            url: "/detail/properti",
            data: {
                id:id,
                _token:token
            },
            dataType: "JSON",
            success: function (response) {
                console.log("hasil:"+response);
                $("h5#nama").text(response.properti.properti);
                $("p#lokasi").text(response.properti.alamat);
                $("p#desk").text(response.properti.deskripsi.slice(0, 250)+'...')+"<a href='/detail/properti/"+response.properti.id+"'>lihat detail</a>";
                $("strong.price").text(response.properti.harga);

                //fitur
                for (i=0;i<response.fitur.length;i++) {
                    $("ul.bullets").append("<li class='new'><i class='"+response.fitur[i].icon+"'></i>"+response.fitur[i].fitur+"</li>");
                }
                //detail harga
                if (response.properti.status=="sewa") {
                    for (i=0;i<response.harga.length;i++) {
                    $("dl#detailharga").append("<dl class='new'><dt>/"+response.harga[i].durasi+"</dt><dd>"+response.harga[i].harga+"</dd></dl>");
                }
                } else {
                    $("dl#detailharga").append("<dl class='new'><dt>Harga Jual</dt><dd>"+response.hargajual+"</dd></dl>");
                }
                
                //img
                for (i=0;i<response.img.length;i++) {
                    if (response.img[i].tipe=="img") {
                        if (i==0) {
                            $("#imgcarausel").append("<div class='active new item'><img style='height: 504px;object-fit: cover;' src='/"+response.img[i].link+"'></div>");
                        } else {
                            $("#imgcarausel").append("<div class='new item'><img style='height: 504px;object-fit: cover;' src='/"+response.img[i].link+"'></div>");
                        }
                    } else {
                        if (i==0) {
                            $("#imgcarausel").append("<div class='active new item'><iframe class='modalIframe' style='min-height:300px' src='"+response.img[i].link+"' allowfullscreen></iframe></div>");
                        } else {
                            $("#imgcarausel").append("<div class='new item'><iframe class='modalIframe' style='min-height:300px' src='"+response.img[i].link+"' allowfullscreen></iframe></div>");
                        }
                    }
                }

            }
        });
    }

    function magnify (id) {
        $(".new").remove();
        $.ajax({
            type: "POST",
            url: "/load/magnify",
            data: {
                id:id,
                _token:token
            },
            dataType: "JSON",
            success: function (response) {
                for (let index = 0; index < response.length; index++) {
                    if (index==1) {
                        $("#imgmagnify").append('<a  href="'+response[index].link+'"><i style="padding-top: 30%;" class="fa fa-expand"></i></a>');
                    } else {
                        $("#imgmagnify").append('<a href="'+response[index].link+'" class="hidden new"></a>'); 
                    }

                }
            }
        });
    }
    </script>
@endsection