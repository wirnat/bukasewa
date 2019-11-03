@extends('layout.customer')
@section('title',"Detail Property: $properti->properti")
@section('meta-desk',"Hunian murah, nyaman, aman di daerah $properti->provinsi")
@section('meta-img', $properti->link)
@section('header')
<link rel="stylesheet" href="/carousel/slick-theme.css">
<link rel="stylesheet" href="/carousel/slick.css">
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
                    <div class="properties-detail-slider simple-slider mb-40">
                        <div id="carousel-custom" class="carousel slide" data-ride="carousel">
                            <div class="carousel-outer">
                                <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                        <?php $i=0?>
                                        @foreach ($img as $m)
                                        <?php $i++?>
                                            @if ($i==1)
                                                <div class="item active ">
                                                        <img src="/{{$m->link}}" class="thumb-preview"  alt="Chevrolet Impala">
                                                </div> 
                                            @else
                                                <div class="item">
                                                        <img src="/{{$m->link}}" class="thumb-preview"  alt="Chevrolet Impala">
                                                </div> 
                                            @endif                                                                              
                                        @endforeach
                                </div>
                                {{-- <!-- Controls -->
                                <a class="left carousel-control" href="#carousel-custom" role="button" data-slide="prev">
                                    <span class="slider-mover-left no-bg t-slider-r pojison" aria-hidden="true">
                                        <i class="fa fa-angle-left"></i>
                                    </span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#carousel-custom" role="button" data-slide="next">
                                    <span class="slider-mover-right no-bg t-slider-l pojison" aria-hidden="true">
                                        <i class="fa fa-angle-right"></i>
                                    </span>
                                    <span class="sr-only">Next</span>
                                </a> --}}
                            </div>
                            <!-- Indicators -->
                            <ol class="carousel-indicators thumbs visible-lg visible-md">
                                <?php $i=0?>
                                @foreach ($img as $m)
                                    @if ($i==0)
                                        <div class="active item">
                                            <li data-target="#carousel-custom" data-slide-to="{{$i}}" class="active"><img src="/{{$m->link}}" alt="Thumbnail gambar hunian"></li>
                                        </div> 
                                    @else
                                        <div class="item">
                                            <li data-target="#carousel-custom" data-slide-to="{{$i}}"><img src="/{{$m->link}}" alt="Thumbnail gambar hunian"></li>
                                        </div> 
                                    @endif
                                    <?php $i++?>                                                                              
                                @endforeach
                            </ol>
                        </div>
                    </div>
                    <!-- Properties detail slider end -->

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
                                    <li class=""><a href="#tab5default" data-toggle="tab" aria-expanded="false">Video</a></li>
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
                                                {{-- @if ($status!="in")
                                                    <div id="infohide">
                                                            <div class="icon"><i class="fa fa-phone"></i></div>
                                                            <button id="sign" style="background-color: #d20023;border-color:#d20023;" class="btn btn-primary"><i class="fa fa-eye"></i> Hubungi Pemilik</button>
                                                    </div>
                                                @else --}}
                                                    <div id="infoshow">
                                                            <div class="icon"><i class="fa fa-phone"></i></div>
                                                            <h4>Phone</h4>
                                                            <?php
                                                                if ($properti->whatsapp[0]=="0") {
                                                                   $kode="62";
                                                                   $wa=$kode.substr($properti->whatsapp, 1);
                                                                }else{
                                                                    $wa=$properti->whatsapp;
                                                                }
                                                            ?>
                                                            
                                                            <p><a href="https://api.whatsapp.com/send?phone={{$wa}}&text=Halo%20kak%20aku%20mendapatkan%20informasi%20dari%20https://bukasewa.com/detail/properti/{{$properti->id_properti}},%20apakah%20masih%20tersedia%20huniannya?">+{{$wa}}</a> </p>
                                                    </div>
                                                {{-- @endif --}}
                                            </div>
                                        </div>
                            </div>
                        </div>
                        
                    </div>
                    <!-- Property description end -->
                </div>
                <!-- Properties details section end -->
                <div class="slider slideimg">
                    @foreach ($img as $m)
                        <div>
                                <img  src="/{{$m->link}}" class="thumb-preview"  alt="gambar hunian {{$properti->properti}}">

                        </div>
                    @endforeach
                </div>


                <!-- Location start -->
                <div class="location sidebar-widget">
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

                <!-- Properties details section start -->
                {{-- <div class="Properties-details-section sidebar-widget">
                    <!-- Properties comments start -->
                    <div class="properties-comments mb-40">
                        <!-- Comments section start -->
                        <div class="comments-section">
                            <!-- Main Title 2 -->
                            <div class="main-title-2">
                                <h1><span>Comments </span> Section</h1>
                            </div>

                            <ul class="comments">
                                <li>
                                    <div class="comment">
                                        <div class="comment-author">
                                            <a href="#">
                                                <img src="/nest/img/avatar/avatar-5.png" alt="avatar-5">
                                            </a>
                                        </div>
                                        <div class="comment-content">
                                            <div class="comment-meta">
                                                <div class="comment-meta-author">
                                                    Jane Doe
                                                </div>
                                                <div class="comment-meta-reply">
                                                    <a href="#">Reply</a>
                                                </div>
                                                <div class="comment-meta-date">
                                                    <span class="hidden-xs">8:42 PM 3/3/2017</span>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="comment-body">
                                                <div class="comment-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus tincidunt aliquam. Aliquam gravida massa at sem vulputate interdum et vel eros. Maecenas eros enim, tincidunt vel turpis vel, dapibus tempus nulla. Donec vel nulla dui. Pellentesque sed ante sed ligula hendrerit condimentum. Suspendisse rhoncus fringilla ipsum quis porta.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <ul>
                                        <li>
                                            <div class="comment">
                                                <div class="comment-author">
                                                    <a href="#">
                                                        <img src="/nest/img/avatar/avatar-5.png" alt="avatar-5">
                                                    </a>
                                                </div>

                                                <div class="comment-content">
                                                    <div class="comment-meta">
                                                        <div class="comment-meta-author">
                                                            Jane Doe
                                                        </div>

                                                        <div class="comment-meta-reply">
                                                            <a href="#">Reply</a>
                                                        </div>

                                                        <div class="comment-meta-date">
                                                            <span class="hidden-xs">8:42 PM 3/3/2017</span>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="comment-body">
                                                        <div class="comment-rating">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-half-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus tincidunt aliquam. Aliquam gravida massa at sem vulputate interdum et vel eros. Maecenas eros enim, tincidunt vel turpis vel, dapibus tempus nulla. Donec vel nulla dui.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="comment">
                                        <div class="comment-author">
                                            <a href="#">
                                                <img src="/nest/img/avatar/avatar-5.png" alt="avatar-5">
                                            </a>
                                        </div>
                                        <div class="comment-content">
                                            <div class="comment-meta">
                                                <div class="comment-meta-author">
                                                    Jane Doe
                                                </div>
                                                <div class="comment-meta-reply">
                                                    <a href="#">Reply</a>
                                                </div>
                                                <div class="comment-meta-date">
                                                    <span class="hidden-xs">8:42 PM 3/3/2017</span>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="comment-body">
                                                <div class="comment-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <ul>
                                        <li>
                                            <div class="comment comment-mrg-bdr-nane">
                                                <div class="comment-author">
                                                    <a href="#">
                                                        <img src="/nest/img/avatar/avatar-5.png" alt="avatar-5">
                                                    </a>
                                                </div>

                                                <div class="comment-content">
                                                    <div class="comment-meta">
                                                        <div class="comment-meta-author">
                                                            Jane Doe
                                                        </div>

                                                        <div class="comment-meta-reply">
                                                            <a href="#">Reply</a>
                                                        </div>

                                                        <div class="comment-meta-date">
                                                            <span class="hidden-xs">8:42 PM 3/3/2017</span>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="comment-body">
                                                        <div class="comment-rating">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-half-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus tincidunt aliquam. Aliquam gravida massa at sem vulputate interdum et vel eros. Maecenas eros enim, tincidunt vel turpis vel, dapibus tempus nulla. Donec vel nulla dui.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!-- Comments section end -->
                    </div>
                    <!-- Properties comments end -->

                    <!-- Contact 1 start -->
                    <div class="contact-1">
                        <div class="contact-form">
                            <!-- Main Title 2 -->
                            <div class="main-title-2">
                                <h1><span>Contact</span> with us</h1>
                            </div>
                            <form id="contact_form" action="https://storage.googleapis.com/themevessel-products/the-nest/index.html" method="GET" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group fullname">
                                            <input type="text" name="full-name" class="input-text" placeholder="Full Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group enter-email">
                                            <input type="email" name="email" class="input-text" placeholder="Enter email">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group subject">
                                            <input type="text" name="subject" class="input-text" placeholder="Subject">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group number">
                                            <input type="text" name="phone" class="input-text" placeholder="Phone Number">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group message">
                                            <textarea class="input-text" name="message" placeholder="Write message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="form-group send-btn mb-0">
                                            <button type="submit" class="button-md button-theme">Send Message</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Contact 1 end -->
                </div> --}}
                <!-- Properties details section end -->
            </div>
    </div>
@endsection
@section('footer')
<!-- Modal -->
<div class="modal fade" id="modalSign" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                <h5 class="modal-title">Masukkan Data Diri Anda</h5>
            </div>
            <div class="modal-body">
                    <div class="row">
                    <form action="/signing" method="post">
                        <div class="col-md-4 col-sm-4">
                            <div class="form-group">
                                <label><i class="flaticon-people"></i> Nama</label>
                                <input required type="text" class="form-control input-text" name="name" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="form-group">
                                <label><i class="fa fa-envelope"></i> Email</label>
                                <input required type="email" class="form-control input-text" name="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="form-group">
                                <label><i class="fa fa-whatsapp"></i> Whatsapp</label>
                                <input required type="text" class="input-text form-control" name="phone" placeholder="Phone">
                            </div>
                        </div>
                        <input type="hidden" value="{{csrf_token()}}" name="_token">
                        <div class="col-md-12">
                            <button type="submit" id="signing" class="btn button-sm button-theme">Submit</button>
                        </div>
                    </form>
                    </div>
            </div>
            <div class="modal-footer">
                <small>NB: Untuk menghubungi pemilik hunian, kamu harus memasukkan data diri terlebih dahulu</small>
            </div>
        </div>
    </div>
</div>
    <script src="/carousel/slick.js"></script>
    <script>

        $(document).ready(function () {
            $('.slideimg').slick();

             // The location
            var lokasi = {lat: {{$properti->lat}}, lng: {{$properti->lng}} };
            // The map, centered at location
            var map = new google.maps.Map(
                document.getElementById('mymap'), {zoom: 10, center: lokasi});
            // The marker, positioned at location
            var marker = new google.maps.Marker({position: lokasi, map: map});
            //tombol tampilkan nomor
            $("#sign").click(function (e) { 
                Swal.fire({
                    title: 'Silahkan lakukan session login terlebih dahulu',
                    text: "Lanjutkan?",
                    type: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',  
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Batal',
                    confirmButtonText: 'Lanjutkan'
                    }).then((result) => {
                    if (result.value) {
                        $('#modalSign').modal('show');
                    }
                })
            });
        });

        //stop auto slider
        $('.carousel').carousel({
            interval: false,
        })

    </script>
@endsection