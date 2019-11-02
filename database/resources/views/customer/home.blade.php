@extends('layout.customer')
@section('title',"Bukasewa")
@section('meta-desk',"Temukan hunian dengan harga termurah, terpercaya, dan berkualitas hanya disini...")
@section('meta-img',"/img/metaimg2.jpg")
@section('content')

<!-- Categories strat -->
<div style="margin-top: 50px" class="categories">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1>Tempat Terpopuler</h1>
        </div>
        <div class="clearfix"></div>
        <div class="row wow">
            @foreach ($region as $rg)                        
            <div class="col-sm-6 col-lg-6 col-xs-6 col-pad wow fadeInUp delay-04s">
                <div class="category">
                    <div onclick="window.location.href='/hunian-murah-di/{{$rg->provinsi}}'" style="background-image: url('{{$rg->img}}')" class="category_bg_box">
                        <div class="category-overlay">
                            <div class="category-content">
                                    {{-- <div class="category-subtitle">{{$rg->jumlah}}</div> --}}
                                    <h3 class="category-title"><a href="/hunian/region/{{$rg->id}}">{{$rg->provinsi}}</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Categories end-->
<div id="divrekomen" >
<center>
<button data-toggle="modal" data-target="#modalcari" id="carihunian" class="btn button-md button-theme"><i class="fa fa-map-marker"></i> Cari hunian disekitarmu</button>
</center>
<div class="clearfix"></div>

<!-- Rekomendasi -->
<div style="margin-top: 50px" class="mt-50 recently-properties chevron-icon">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1><span>Rekomendasi</span> Kami</h1>
        </div>
        <div class="row">
            <div class="carousel our-partners slide" id="ourPartners2">
                <div class="col-lg-12 mrg-btm-30">
                    <a class="right carousel-control" href="#ourPartners2" data-slide="prev"><i class="fa fa-chevron-left icon-prev"></i></a>
                    <a class="right carousel-control" href="#ourPartners2" data-slide="next"><i class="fa fa-chevron-right icon-next"></i></a>
                </div>
                <div id="rekomen_section" class="carousel-inner">
                    
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Cari Apa Section -->
{{-- <div style="margin-top: 50px" class="mb-100 our-service">
    <div class="container">
        @if (!empty($message))                    
            <div class="alert alert-danger wow fadeInLeft delay-03s"  role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>{{Session::get('message')}}</strong> {{Session::get('message-tiny')}}
            </div>
        @endif
        <!-- Main title -->
        <div class="main-title">
            <h1><span>Apa yang kamu cari ?</span></h1>
        </div>

        <div class="row mgn-btm wow">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 wow fadeInLeft delay-04s">
                <div class="content">
                    <i class="flaticon-apartment"></i>
                    <h4>Apartemen</h4>
                    <p>Apartemen Harga pas,fasilitas nyaman,mewah dan terbaik,cuma bisa kamu dapatkan di bukasewa</P>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 wow fadeInLeft delay-04s">
                <div class="content">
                    <i class="flaticon-internet"></i>
                    <h4>Rumah</h4>
                    <p>Kontrakan kamu udah habis masa kontrak ? ingin cari rumah lagi atau beli rumah ,ga perlu ribet ada bukasewa</P>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 wow fadeInRight delay-04s">
                <div class="content">
                    <i class="fa fa-bed"></i>
                    <h4>Indekos</h4>
                    <p>Cari kost ga perlu ribet lagi,ajakin saudara,teman kamu untuk cari kost di bukasewa</P>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 wow fadeInRight delay-04s">
                <div class="content">
                    <i class="flaticon-symbol"></i>
                    <h4>Villa</h4>
                    <p>Sulit cari villa ? cari budget yang berapa nih,pasti mau yang fasilitas oke,harga terbaik,cari aja di bukasewa,bandingkan harga villa diseluruh indonesia</P>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- Cari Apa end -->

<div class="modal fade" id="modalcari" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form action="/find" method="get">
                    <center>
                    <div style="margin:20px">
                        <h1 style="display:inline" class="flaticon-apartment"></h1>
                        <h1 style="display:inline" class="lnr lnr-map-marker"></h1>
                        <h1 style="display:inline" class="flaticon-internet"></h1>
                        <select required class="mt-20 form-control" name="kategori" id="">
                            <option value="">Pilih Hunian</option>
                        @foreach ($kategori as $k)
                            <option value="{{$k->id}}">{{$k->kategori}}</option>
                        @endforeach
                        </select>
                        <input id="clat" name="lat" type="hidden">
                        <input id="clng" name="lng" type="hidden">
                        <input type="hidden" id="myLokasi" name="lokasi">
                        <input id="jarak" name="jarak" value="show" type="hidden">
                        <div style="display:inline;margin-top:20px">
                                <button type="submit" id="carikategori" class="mt-20 button-theme button-sm"><i class="fa fa-search"></i> Cari Hunian Disekitarmu</button>
                        </div>
                        <p>
                    </div>
                    </center>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('footer')
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
    <script>
        
        var token='{{csrf_token()}}';
        var pos="";
        $(function () {
            var geocoder = new google.maps.Geocoder;
           // Try HTML5 geolocation.
            if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                 pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
                };
                $("input#clat").val(pos.lat);
                $("input#clng").val(pos.lng);
                latLng={lat:pos.lat,lng:pos.lng};
                geocoder.geocode({'location': latLng}, function(results, status){
                    console.log("alamat anda:"+results[0].formatted_address);
                    $("#myLokasi").val(results[0].formatted_address);
                });
                // get rekomendasi
                $.ajax({
                    type: "POST",
                    url: "/rekomen",
                    data: {
                        lat:pos.lat,
                        lng:pos.lng,
                        _token:'{{csrf_token()}}'
                    },
                    dataType: "JSON",
                    success: function (response) {
                    var aktiv="";
                    console.log(response);
                    for (let index = 0; index < response.length; index++) {
                     if (index==1) {
                      aktiv="active";   
                     }else{
                         aktiv="";
                     }   
                        html='<div class="item '+aktiv+'">';
                        html+='<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">';
                        html+='<div class="property-2">';
                        html+='<div class="property-img">';
                        if (response[index].paket=="3A") {
                            html+='<div class="platinum">Hot</div>';
                        }else{
                            html+='<div class="featured">Rekomendasi</div>';
                        }
                        html+='<div class="price-ratings"><div class="price">'+response[index].harga+'</div></div>';
                        html+='<img style="object-fit:cover;width: 360px;height: 270px;" src="/'+response[index].link+'" alt="Image Rekomen" class="img-responsive">';
                        html+='<div class="property-overlay">';
                        html+='<a href="/detail/properti/'+response[index].id_properti+'" class="overlay-link"><i class="fa fa-link"></i></a>';
                        html+='<a onclick=loadmodal("'+response[index].id_properti+'") class="overlay-link property-video" title="Look detail"><i class="fa fa-eye"></i></a>';
                        html+='<div class="property-magnify-gallery">';
                        html+='<a href="/'+response[index].link+'" class="overlay-link"><i class="fa fa-expand"></i></a>';
                        html+='</div></div></div>';
                        html+='<div class="content">';
                        html+='<h4 class="title">';
                        html+='<a  href="/detail/properti/'+response[index].id_properti+'">'+response[index].properti+'</a></h4>';
                        html+='<h3 class="property-address">';
                        html+='<a href="/detail/properti/'+response[index].id_properti+'"><i class="fa fa-map-marker"></i> '+response[index].alamat+'</a>';
                        html+='</h3></div>';
                        html+='</div><!-- Property 2 end --></div></div>';
                        
                        $("#rekomen_section").append(html);
                    }
                    $('.our-partners .item').each(function () {
                            var itemToClone = $(this);
                            for (var i = 1; i < 4; i++) {
                                itemToClone = itemToClone.next();
                                if (!itemToClone.length) {
                                    itemToClone = $(this).siblings(':first');
                                }
                                itemToClone.children(':first-child').clone()
                                    .addClass("cloneditem-" + (i))
                                    .appendTo($(this));
                            }
                        }); 
                    }
                });
                console.log(pos);
            }, function() {
                // Swal.fire("Lokasimu tidak terdeteksi, pastikan mengizinkan pengambilan lokasi","","error");
                $("#divrekomen").hide();
            });
            } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());
                Swal.fire("Terjadi kesalahan pada geolokasi, coba reload halaman ini","","error")
                // Swal.fire("Lokasimu tidak terdeteksi, pastikan mengizinkan pengambilan lokasi","","error");
                $("#divrekomen").hide();
            }

            //modal
            
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
                    for (i=0;i<response.harga.length;i++) {
                        $("dl#detailharga").append("<dl class='new'><dt>/"+response.harga[i].durasi+"</dt><dd>"+response.harga[i].harga+"</dd></dl>");
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