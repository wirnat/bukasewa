@extends('layout.customer')
@section('title',"Bukasewa-Penyewaan utama di Indonesia")
@section('meta-desk','Temukan hunian dengan harga termurah, terpercaya, dan berkualitas hanya disini...')
@section('meta-img','/img/metaimg2.jpg')
@section('header')
 <style>
 #infowindow-content .title {
        font-weight: bold;
      }
      #infowindow-content {
        display: none;
      }
      #map #infowindow-content {
        display: inline;
      }
      .pac-card {
        margin: 10px 10px 0 0;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        background-color: #fff;
        font-family: Roboto;
      }
      #pac-container {
        padding-bottom: 12px;
        margin-right: 12px;
        z-index: 20;
        margin:5px;
      }
      
        
      .pac-controls {
        display: inline-block;
        padding: 5px 11px;
      }
      .pac-controls label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }
      #pac-input {
        background-color: #bdb9b9;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        margin:5px;
      }
      #pac-input:focus {
        border-color: #4d90fe;
      }
      #title {
        color: #fff;
        background-color: #ff5159;
        font-size: 15px;
        font-weight: 500; 
        padding: 6px 12px;
      }
 </style>   
@endsection
@section('content')

<div class="container">
    <a href="/join/surveyor"><img class="banner-join" src="/img/banner-web-2.jpg" alt="join us">
</div>

<!-- Categories strat -->
<div id="div-tempat" style="margin-top: 50px;padding-bottom:20px" class="categories">
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
                        <div onclick="loadmodal_region('{{$rg->id}}')" style="background-image: url('{{$rg->img}}')" class="category_bg_box">
                            <div class="category-overlay">
                                <div class="category-content">
                                        {{-- <div class="category-subtitle">{{$rg->jumlah}}</div> --}}
                                        <h3 class="category-title"><a href="/hunian-murah-di/{{$rg->provinsi}}">{{$rg->provinsi}}</a></h3>
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
{{-- <div id="div-mapz" style="margin-top:50px;margin-bottom:50px;display:none" class="container">
    <br>
    <div class="main-title">
            <h1>Cari hunian dan Ayo jelajahi dunia !</h1>
        </div>
    <div class="container">
        <div class="pac-card" id="pac-card">
                <div>
                    <div id="title">
                    <i class="fa fa-marker"></i> Cari lokasi disekitar tempat yang kamu prioritaskan
                    </div>
                </div>
                <div id="pac-container">
                    <div class="col-lg-4 col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <select id="select-kabupaten" class="form-control">
                                <option>Kabupaten</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <select id="select-kampus" class="form-control">
                                <option>Kampus</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <select id="select-populer" class="form-control">
                                <option>Paling dicari</option>
                            </select>
                        </div>
                    </div>
                    
                </div>
        </div>
        <div id="map"></div>
    </div>
</div> --}}

<div id="divrekomen" >
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
<!-- Counters strat -->
<div class="counters overview-bgi">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4 bordered-right">
                <div class="counter-box">
                    <i class="flaticon-symbol-1"></i>
                    <h1 class="counter">1276</h1>
                    <p>List hunian yang disewakan</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 bordered-right">
                <div class="counter-box">
                    <i class="flaticon-people"></i>
                    <h1 class="counter">396</h1>
                    <p>Agents</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="counter-box">
                    <i class="flaticon-old-telephone-ringing"></i>
                    <h1 class="counter">177</h1>
                    <p>Jumlah interaksi</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Counters end -->
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

{{-- pilih kategori --}}
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
{{-- modal quick show --}}
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

{{-- modal region --}}
<div class="modal property-modal fade" id="regionModal" tabindex="-1" role="dialog" aria-labelledby="carModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" >
                        <i class='fa fa-map-marker'></i> <span id="nama-region"></span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row modal-raw">
                    <div id="data_region">
                        <div class="col-lg-5 modal-left">
                                    <div class="modal-left-content">
                                       <img id="imgregion" src="" alt="">
                                       <div class="description">
                                           <h3 id="title-deskripsi"></h3>
                                            <p id="region-deskripsi"></p>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-lg-7 modal-right">
                                    <div class="modal-right-content bg-white">
                                        <strong>
                                            <div class="row">
                                                <div class="col-lg-6 col-xs-6 col-md-6 col-6">
                                                    <a onclick="toggle('kabupaten')" href="#kabupaten">
                                                        <div class="form-group">
                                                            <span  ><i class="fa fa-map-signs"></i> Kabupaten<span class="fa fa-arrows-v pull-right"></span></span>
                                                                <ul id="kabupaten" style="margin-left:20px;display:none" class="list-1">
                                                                </ul>
                                                            <hr>
                                                        </div>
                                                    </a>
                                                    <a onclick="toggle('favorit')" href="#populer">
                                                        <div class="form-group">
                                                            <span  ><i class="fa fa-star"></i> Paling Dicari<span class="fa fa-arrows-v pull-right"></span></span>
                                                                <ul id="favorit" style="margin-left:20px;display:none" class="list-1">
                                                                    
                                                                </ul>
                                                            <hr>
                                                        </div>
                                                    </a>
                                                    <a onclick="toggle('pantai')" href="#pantai">
                                                        <div class="form-group">
                                                            <span  ><i class="flaticon flaticon-summer"></i> Pantai<span class="fa fa-arrows-v pull-right"></span></span>
                                                                <ul id="pantai" style="margin-left:20px;display:none" class="list-1">
                                                                    
                                                                </ul>
                                                            <hr>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-6 col-xs-6 col-md-6 col-6">
                                                    <a onclick="toggle('kampus')" href="#kampus">
                                                        <div class="form-group">
                                                            <span  ><i class="lnr lnr-graduation-hat"></i> Kampus<span class="fa fa-arrows-v pull-right"></span></span>
                                                                <ul id="kampus" style="margin-left:20px;display:none" class="list-1">
                                                                
                                                                </ul>
                                                            <hr>
                                                        </div>
                                                    </a>
                                                    <a onclick="toggle('kantor')" href="#kantor">
                                                        <div class="form-group">
                                                            <span  ><i class="flaticon flaticon-people-1"></i> Kantor<span class="fa fa-arrows-v pull-right"></span></span>
                                                                <ul id="kantor" style="margin-left:20px;display:none" class="list-1">
                                                                
                                                                </ul>
                                                            <hr>
                                                        </div>
                                                    </a>
                                                    <a onclick="toggle('airport')" href="#airport">
                                                        <div class="form-group">
                                                            <span  ><i class="glyphicon glyphicon-plane"></i> Airport<span class="fa fa-arrows-v pull-right"></span></span>
                                                                <ul id="airport" style="margin-left:20px;display:none" class="list-1">
                                                                
                                                                </ul>
                                                            <hr>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            
                                            
                                            
                                    </div>
                                </div>
                    </div>
                </div>
                <div id="region-loading" style="height:200px;display:none;">
                    <button style="top:50%;left:50%; transform: translate(-50%, -50%);position:absolute" type="button" class="btn btn-default btn-lrg ajax" title="Ajax Request">
                        <i class="fa fa-spin fa-refresh"></i>&nbsp; Meminta data ...
                      </button>
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


<script src="/nest/js/maps.js"></script>

    <script>
        var latitude = 51.541216;
        var longitude = -0.095678;
        var providerName = 'Hydda.Full';
        var token='{{csrf_token()}}';
        var pos="";
        var id_prov=null;
        var data_tempat=[];
        var map;

        //load map region
        function loadregion(lat,lng,prov,id) {
            $("#div-tempat").slideUp();
            $("#div-map").slideDown();
            latitude=lat;
            longitude=lng;
            id_prov=prov;

            axios.post("/get/kampus",{
                id:id
            })
            .then(res => {
                console.log(res);
                $.each(res.data, function (index, kampus) { 
                     $("#select-kampus").append("<option value='"+kampus.id+"' id='"+kampus.id+"'>"+kampus.nama+"</option>");
                });
            })
            .catch(err => {
                console.error(err); 
            })

            //get tempat populer
            axios.post('/get/tempat')
            .then(res => {
                console.log(res)
                generateMap(res,latitude, longitude, providerName);
                
            })


        }

        function toggle(kode) {

            $(".list-1").hide();
            $("#"+kode).slideToggle();
        }
        
        var loaded=null;
        //load modal
        function loadmodal_region(prov) {
            $("#regionModal").modal("show");

            if (loaded!=prov) {
                //load data region
                $("#data_region").toggle();
                $("#region-loading").toggle();
                axios.post("/get/detail/region",{
                    prov:prov
                })
                .then(res => {
                    loaded=prov;
                    $("#data_region").toggle();
                    $("#region-loading").toggle();
                    
                    $(".list-1 li").remove();
                    $("#nama-region").text(res.data[0].prov_name);
                    $("#title-deskripsi").text(res.data[0].title_deskripsi);
                    $("#region-deskripsi").text(res.data[0].deskripsi);

                    $("#imgregion").attr("src", res.data[0].img);

                    $.each(res.data, function (index, data) { 
                        switch (data.tag) {
                            case "kabupaten":
                                var content="<a href='/hunian-murah-di-kabupaten/"+data.nama+"'><li  class='removeable'>"+data.nama+"</li></a>";
                                $("ul#kabupaten").append(content);
                                break;
                            case "rated":
                                var content="<a href='/hunian-murah-disekitar/"+data.nama+"'><li  class='removeable'>"+data.nama+"</li></a>";
                                $("ul#favorit").append(content);
                                break;
                            case "kampus":
                                var content="<a href='/hunian-murah-disekitar/"+data.nama+"'><li class='removeable'>"+data.nama+"</li></a>";
                                $("ul#kampus").append(content);
                                break;
                            case "kantor":
                                var content="<a href='/hunian-murah-disekitar/"+data.nama+"'><li class='removeable'>"+data.nama+"</li></a>";
                                $("ul#kantor").append(content);
                                break;
                            case "pantai":
                                var content="<a href='/hunian-murah-disekitar/"+data.nama+"'><li class='removeable'>"+data.nama+"</li></a>";
                                $("ul#pantai").append(content);
                                break;
                            case "airport":
                                var content="<a href='/hunian-murah-disekitar/"+data.nama+"'><li class='removeable'>"+data.nama+"</li></a>";
                                $("ul#airport").append(content);
                                break;
                        } 
                    });
                    
                    console.log(res)
                })
                .catch(err => {
                    console.error(err); 
                })   
            } 
            
        }

        //clear draw
        function clearMap() {
            for(i in map._layers) {
                if(map._layers[i]._path != undefined) {
                    try {
                        map.removeLayer(map._layers[i]);
                    }
                    catch(e) {
                        console.log("problem with " + e + map._layers[i]);
                    }
                }
            }
        }

        //cari sekitar mark
        function cari_sekitar(id,tempat,lt,lg) {

            axios.post("/get/cari_disekitar",{
                id:id,
                kategori:$("#mark-kategori").val()
            })
            .then(res => {
                console.log(res)
                Swal.fire({
                title: 'Ditemukan '+res.data.length+' hunian, disekitar '+tempat,
                text: "You won't be able to revert this!",
                type: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#ff5159',
                confirmButtonText: 'Tampilkan di map',
                cancelButtonText: 'Tampilkan di list'
                }).then((result) => {
                    if (result.value) {

                    clearMap();
                    map.setZoom(14,true)
                    map.panTo([lt,lg]);
                    var direction=1;
                    var rMin=100, rMax=2500;
                    var circle=L.circle([lt,lg], 2500,{color: '#ff5159', opacity:.5}).addTo(map);
                    
                    setInterval(function() {
                        var radius = 1500;
                        if ((radius > rMax) || (radius < rMin)) {
                            direction *= -1;
                            circle.setRadius(radius+direction*100)
                        }
                        
                    }, 50);
                    } else {
                        window.location.href="/hunian-murah-disekitar/"+tempat 
                        }
                })
                map.closePopup();

            })
            .catch(err => {
                console.error(err); 
            })
        }

        $("#back").click(function (e) {
            // $("#div-map").slideUp(); 
            // $("#div-tempat").slideDown();

            window.location.href="/";
            
        });

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
                            html+='<div class="platinum">Promo</div>';
                        }else{
                            html+='<div class="featured">Rekomendasi</div>';
                        }
                        html+='<div class="price-ratings"><div class="price">'+response[index].harga+'</div></div>';
                        html+='<img style="object-fit:cover;width: 360px;height: 270px;" src="/'+response[index].link+'" alt="Image Rekomen" class="img-responsive">';
                        html+='<div class="property-overlay">';
                        html+='<a onclick="showmap(`'+response[index].properti+'`,`'+response[index].alamat+'`,'+response[index].lat+','+response[index].lng+')" class="overlay-link"><i class="fa fa-map"></i></a>';
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
                    //rekomen section
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

                    $('.our-partner .item').each(function () {
                            var itemToClone = $(this);
                            for (var i = 1; i < 3; i++) {
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

        function showmap(nama,lokasi,lat,lng) {
            $("#nama-prop").text(nama);
            $("#lokasi-prop").text(lokasi);
            $("#mapModal").modal("show");
            pos={
                lat:lat,
                lng:lng
            }
            console.log(pos)
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
    <script src="/js/app.js"></script>
@endsection