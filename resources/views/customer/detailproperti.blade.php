@extends('layout.customer')
@section('title',"Detail Property: $properti->properti")
@section('meta-desk',substr($properti->alamat, 0, 70) . '...')
@section('meta-img',$properti->link)
@section('header')
	<link rel="stylesheet" href="/expan_gallery/css/style.css"> <!-- Resource style -->
    <script src="js/modernizr.js"></script> <!-- Modernizr -->
    <style>
        .cd-img{
        height: 400px;
        object-fit: cover;
        }
    </style>
@endsection
@section('content')
    <div style="margin-top:50px;padding-right: 0px; 
    padding-left: 0px;" class="container">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                @if (!empty($message))                    
                    <div class="alert alert-success wow fadeInLeft delay-03s"  role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>{{Session::get('message')}}</strong> {{Session::get('message-tiny')}}
                    </div>
                @endif
                <!-- Header -->
                <div class="heading-properties clearfix sidebar-widget">
                    <div class="pull-left">
                        <h3>{{$properti->properti}}</h3>
                        <p>
                            <i class="fa fa-map-marker"></i>{{$properti->alamat}}
                        </p>
                    </div>
                </div>
                <!-- Properties details section start -->
                <div class="Properties-details-section sidebar-widget">
                    <!-- Properties detail slider start -->
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="properties-detail-slider simple-slider mb-40">
                                <section class="cd-single-item">
                                    <div class="cd-slider-wrapper">
                                        <ul class="cd-slider">
                                            {{-- load image --}}
                                            <?php $i=0; ?>
                                            @foreach ($imgs as $img)
                                            @if ($i==0)
                                            <?php $i++ ?>
                                            <li class="selected"><img class="cd-img" src="/{{$img->link}}" alt="Product Image 1"></li>             
                                            @else
                                            <li><img class="cd-img" src="/{{$img->link}}" alt="Product Image 2"></li>
                                            @endif
                                            @endforeach
                                        </ul> <!-- cd-slider -->
                            
                                        <ul class="cd-slider-navigation">
                                            <li><a href="#0" class="cd-prev inactive">Next</a></li>
                                            <li><a href="#0" class="cd-next">Prev</a></li>
                                        </ul> <!-- cd-slider-navigation -->
                            
                                        <a href="#0" class="cd-close">Close</a>
                                    </div> <!-- cd-slider-wrapper -->
                                </section> <!-- cd-single-item -->
                            </div>
                            <!-- Properties detail slider end -->
                        </div>
                        <div class="col-lg-4">
                            <div style="margin-bottom: 0px;" class="social-media sidebar-widget clearfix">
                                <!-- Main Title 2 -->
                                <div class="hidden-xs main-title-2">
                                    <h1><span>Aksi</h1>
                                </div>

                                <?php
                                    if ($properti->whatsapp[0]=="0") {
                                        $kode="62";
                                        $wa=$kode.substr($properti->whatsapp, 1);
                                    }else{
                                        $wa=$properti->whatsapp;
                                    }
                                ?>

                                <!-- Social list -->
                                <ul style="margin-left:25%" class="social-list">
                                    <li><a href="#" class="twitter-bg"><i class="fa fa-share-alt"></i></a></li>
                                    @if (Auth::check())
                                        {{-- cek apa status favorit --}}
                                        <li><a href="https://api.whatsapp.com/send?phone={{$wa}}&text=Halo%20kak%20,%20apakah%20masih%20tersedia%20huniannya?%0A%0Aaku%20mendapatkan%20informasi%20dari%20https://bukasewa.com/detail/properti/{{$properti->id_properti}}" class="linkedin-bg"><i class="fa fa-whatsapp"></i></a></li>
                                        @if (count($cek_love)>0)
                                            <li id="love"><a onclick="lovethis('{{$properti->id_properti}}','unlove')" class="loved"><i class="fa fa-heart"></i></a></li>
                                        @else
                                            <li id="love"><a onclick="lovethis('{{$properti->id_properti}}','simpan')" class="google-bg"><i class="fa fa-heart"></i></a></li>
                                        @endif
                                    @else
                                        <li><a class="google-bg sign"><i class="fa fa-heart"></i></a></li>
                                        <li><a class="linkedin-bg sign"><i class="fa fa-whatsapp"></i></a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Property description start -->
                    <div class="panel-box properties-panel-box Property-description">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-12">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab1default" data-toggle="tab" aria-expanded="true">Deskripsi</a></li>
                                    <li class=""><a href="#tab2default" data-toggle="tab" aria-expanded="false">Kondisi</a></li>
                                    <li class=""><a href="#tab3default" data-toggle="tab" aria-expanded="false">Fasilitas</a></li>
                                    <li class=""><a href="#tab4default" data-toggle="tab" aria-expanded="false">Ruangan</a></li>
                                    @if ($video->count()>0)
                                    <li><a href="#tab5default" data-toggle="tab" aria-expanded="false">Video</a></li>
                                    @endif
                                </ul>
                                <div class="panel with-nav-tabs panel-default">
                                    <div class="panel-body">
                                        <div class="tab-content">
                                            <div class="tab-pane fade active in" id="tab1default">
                                                <div class="main-title-2">
                                                    <h1><span>Deskripsi</span></h1>
                                                </div>
                                                <p>{{$properti->deskripsi}}</p>
                                            </div>
                                            <div class="tab-pane fade features" id="tab2default">
                                                <!-- Properties condition start -->
                                                <div class="properties-condition">
                                                    <div class="main-title-2">
                                                        <h1><span>Kondisi</span></h1>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                                            <ul class="condition">
                                                                @if ($properti->kamar!=0)
                                                                    <li>
                                                                            <i class="fa fa-check-square"></i>{{$properti->kamar}} Kamar Tidur
                                                                    </li>
                                                                @endif
                                                                @if ($properti->toilet!=0)
                                                                    <li>
                                                                            <i class="fa fa-check-square"></i>{{$properti->toilet}} Toilet
                                                                    </li>
                                                                @endif
                                                            </ul>
                                                        </div>
                                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                                            <ul class="condition">
                                                                @if ($properti->tv!=0)
                                                                    <li>
                                                                            <i class="fa fa-check-square"></i>{{$properti->tv}} TV
                                                                    </li>
                                                                @endif
                                                            </ul>
                                                        </div>
                                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                                            <ul class="condition">
                                                                @if ($properti->garasi!=0)
                                                                    <li>
                                                                            <i class="fa fa-check-square"></i>{{$properti->garasi}} Garasi
                                                                    </li>
                                                                @endif
                                                                @if ($properti->balkon!=0)
                                                                    <li>
                                                                            <i class="fa fa-check-square"></i>{{$properti->balkon}} Balkon
                                                                    </li>
                                                                @endif
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Properties condition end -->
                                            </div>
                                            <div class="tab-pane fade technical" id="tab3default">
                                                <!-- Properties amenities start -->
                                                <div class="properties-amenities">
                                                    <div class="main-title-2">
                                                        <h1><span>Fasilitas</span></h1>
                                                    </div>
                                                    <div style="height:100px" class="features">
                                                            <ul style="columns: 2">
                                                                @foreach ($fitur as $f)
                                                                    <li>
                                                                        <i class="{{$f->icon}}"></i> {{$f->fitur}}
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                    </div>
                                                </div>
                                                <!-- Properties amenities end -->
                                            </div>
                                            <div class="tab-pane fade" id="tab4default">
                                                <!-- Floor Plans start -->
                                                <div class="floor-plans">
                                                    <h1><span>Luas </span> lantai</h1>
                                                    <table>
                                                        <tbody><tr>
                                                            <td><strong>Luas</strong></td>
                                                            <td><strong>Kamar</strong></td>
                                                            <td><strong>Toilet</strong></td>
                                                        </tr>
                                                        <tr>
                                                            <td>{{$properti->luasruangan}}</td>
                                                            <td>{{$properti->kamar}}</td>
                                                            <td>{{$properti->toilet}}</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- Floor Plans end -->
                                            </div>
                                            <div class="tab-pane fade" id="tab5default">
                                                <!-- Inside properties start  -->
                                                <div class="inside-properties">
                                                    <!-- Main Title 2 -->
                                                    <div class="main-title-2">
                                                        <h1><span>Video</span></h1>
                                                    </div>
                                                    <div class="bs-example" data-example-id="carousel-with-captions">
                                                    <div class="carousel slide" id="properties-carousel" data-ride="carousel">
                                                        <div class="carousel-inner" role="listbox">
                                                            <?php $i=0?>
                                                            @foreach ($video as $v)
                                                                @if ($i==0)
                                                                    <div class="item active">
                                                                        <iframe class="modalIframe" src="{{$v->link}}" allowfullscreen></iframe>
                                                                    </div>
                                                                @else
                                                                    <div class="item">
                                                                        <iframe class="modalIframe" src="{{$v->link}}" allowfullscreen></iframe>
                                                                    </div> 
                                                                @endif
                                                                <?php $i++?>
                                                            @endforeach
                                                        </div>
                                                        @if (count($video)>1)
                                                            <div class="mt-20">
                                                                <a class="control control-prev" href="#properties-carousel" role="button" data-slide="prev">
                                                                    <button class="btn btn-danger"><span class="fa fa-angle-double-left"></span></button>
                                                                </a>
                                                                <a class="control control-next" href="#properties-carousel" role="button" data-slide="next">
                                                                    <button class="btn btn-danger pull-right"><span class="fa fa-angle-double-right"></span></button>
                                                                </a>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    </div>
                                                    {{-- @foreach ($video as $v)
                                                    
                                                    <iframe src="{{$v->link}}" allowfullscreen="" style="height: 433.1px;"></iframe>
                                                    @endforeach --}}
                                                </div>
                                                <!-- Inside properties end -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="sidebar-widget category-posts">
                                        <div class="main-title-2">
                                                <h1><span>Harga</span></h1>
                                        </div>
                                        <div class="alert alert-info wow fadeInRight delay-03s animated" role="alert" style="visibility: visible; animation-name: fadeInRight;">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                Harga sewaktu-waktu bisa <strong>berubah</strong>
                                            </div>
                                        @if ($properti->status=="sewa")
                                            <ul class="list-unstyled list-cat">
                                                @foreach ($harga as $h)
                                                    <li><a href="#">{{$h->harga}}</a> <span> /{{$h->durasi}} </span></li>
                                                @endforeach
                                            </ul> 
                                        @else
                                            <ul class="list-unstyled list-cat">
                                                <li><h4><a href="#">{{$properti->harga}}</a></h4></li>
                                            </ul>
                                        @endif
                                            
                                    </div>
                                    <div class="sidebar-widget helping-box clearfix">
                                            <div class="main-title-2">
                                                <h1><span>Informasi</span> Pemilik</h1>
                                            </div>
                                            <div class="helping-center">
                                                <div class="icon"><i class="fa fa-user"></i></div>
                                                <h4>Nama Pemilik</h4>
                                                <p>{{$vendor->name}}</p>
                                            </div>
                                            <div class="helping-center">
                                                <div class="icon"><i class="fa fa-map-marker"></i></div>
                                                <h4>Alamat Hunian</h4>
                                                <p>{{$properti->alamat}}</p>
                                            </div>
                                            <div class="helping-center">
                                                @if (!Auth::check())
                                                    <div id="infohide">
                                                            <div class="icon"><i class="fa fa-phone"></i></div>
                                                            <button class="btn sign button-sm" style="background: #c7c2c2;
                                                            border: 2px solid #c7c2c2;color:white"><i class="fa fa-lock"></i> Chat Pemilik</button>
                                                    </div>
                                                @else
                                                    <div id="infoshow">
                                                            <div class="icon"><i class="fa fa-phone"></i></div>
                                                            <h4>Phone</h4>
                                                            
                                                            <p>
                                                                <input id="copy_wa" value="{{$wa}}" type="hidden">
                                                                <span title="copy ke clipboard"><span id="wa_vendor">{{"+".$wa}}</span> <a id="copy_number" onclick='copyToClipboard("#wa_vendor")' href="#copy"><span style="    bottom: 5px;
                                                                position: relative;" class="fa fa-copy"></span></a>
                                                                </span>
                                                            </p>
                                                            <hr>
                                                            <center>
                                                            <p><a class="btn button-sm button-theme" href="https://api.whatsapp.com/send?phone={{$wa}}&text=Halo%20kak%20,%20apakah%20masih%20tersedia%20huniannya?%0A%0Aaku%20mendapatkan%20informasi%20dari%20https://bukasewa.com/detail/properti/{{$properti->id_properti}}"><span style="font-size: 18px" class="fa fa-whatsapp"></span> Chat dengan pemilik</a> </p>
                                                            </center>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                            </div>
                        </div>
                        
                    </div>
                    <!-- Property description end -->
                </div>
                <!-- Properties details section end -->

                <!-- Location start -->
                <div id="componen-map" class="location sidebar-widget">
                    <div class="map">
                        <!-- Main Title 2 -->
                        <div class="main-title-2">
                            <h1><span>Location</span></h1>
                        </div>
                        <div style="width:100%;height:300px" id="mymap">
                        </div>
                    </div>
                </div>
                <!-- Location end -->
            </div>
    </div>
@endsection
@section('footer')

<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                
            </div>
        </div>
    </div>
</div>

<script src="/expan_gallery/js/main.js"></script> <!-- Resource jQuery -->
<script>
    var ceklat="{{$properti->lat}}";
    $(document).ready(function () {

            // The location
        if (ceklat!="") {
            var lokasi = {lat: {{$properti->lat}}, lng: {{$properti->lng}} };
            // The map, centered at location
            var map = new google.maps.Map(
                document.getElementById('mymap'), {zoom: 10, center: lokasi});
            // The marker, positioned at location
            var marker = new google.maps.Marker({position: lokasi, map: map});
        } else {
            $("#componen-map").remove();
        }
        
        //tombol tampilkan nomor
        $(".sign").click(function (e) { 
            $("#modalSign").modal("show");
        });
    });

    //stop auto slider
    $('.carousel').carousel({
        interval: false,
    })

    function copyToClipboard(element) {
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($(element).text()).select();
        document.execCommand("copy");
        $temp.remove();

        const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
        })

        Toast.fire({
        type: 'success',
        title: 'Nomor disalin ke clipboard'
        })
    }

    function lovethis(id_prop,status) {
        console.log("love this")
        if (status=="simpan") {
            $.ajax({
                type: "post",
                url: "/api/rekam_jejak",
                data: {
                    id:id_prop,
                    aksi:'simpan',
                    _token:'{{csrf_token()}}'
                },
                dataType: "JSON",
                success: function (response) {

                    $("#love").remove();
                    var html="<li id='love'><a onclick=lovethis('{{$properti->id_properti}}','unlove') class='loved'><i class='fa fa-heart'></i></a></li>";
                    $(".social-list").append(html);

                    const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                    })

                    Toast.fire({
                    type: 'success',
                    title: response
                    })

                },error: function () {
                    const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                    })

                    Toast.fire({
                    type: 'error',
                    title: 'Wah, ada kesalahan, coba nanti ya'
                    })
                }
            });
        } else {
            $.ajax({
                type: "post",
                url: "/api/delete/favorit",
                data: {
                    id:id_prop,
                    _token:'{{csrf_token()}}'
                },
                dataType: "JSON",
                success: function (response) {

                    $("#love").remove();
                    var html="<li id='love'><a onclick=lovethis('{{$properti->id_properti}}','simpan') class='google-bg'><i class='fa fa-heart'></i></a></li>";
                    $(".social-list").append(html);

                    const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                    })

                    Toast.fire({
                    type: 'success',
                    title: response
                    })
                    
                },error: function () {
                    const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                    })

                    Toast.fire({
                    type: 'error',
                    title: 'Wah, ada kesalahan, coba nanti ya'
                    })
                }
            });
        }
    }
    
    
</script>
@endsection