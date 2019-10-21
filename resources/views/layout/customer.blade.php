
<!DOCTYPE html>
<html lang="zxx">
<head>
    
        {{-- async --}}
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCNc257lpFxxKmJxqKzdgshuSHDUdtRDmE&libraries=places"  defer></script> --}}
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCi64IHKUBeVAy0Jga2TRzEdO33klFX5p0&libraries=places"  defer></script>
    <!-- Google Tag Manager -->
    {{-- <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        '../../../www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-P5MJCCG');</script> --}}
    <!-- End Google Tag Manager -->

    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta-desk')">
    <meta property="og:image" content="@yield('meta-img')">
    <meta charset="utf-8">
    {{-- api gmap --}}
    <!-- External CSS libraries -->
    <link rel="stylesheet" type="text/css" href="/nest/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/nest/css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="/nest/css/bootstrap-submenu.css">
    <link rel="stylesheet" type="text/css" href="/nest/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="/nest/css/leaflet.css" type="text/css">
    <link rel="stylesheet" href="/nest/css/map.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="/nest/fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/nest/fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" type="text/css" href="/nest/fonts/linearicons/style.css">
    <link rel="stylesheet" type="text/css"  href="/nest/css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" type="text/css"  href="/nest/css/dropzone.css">
    <link rel="stylesheet" type="text/css"  href="/nest/css/magnific-popup.css">

    <link rel="stylesheet" type="text/css" href="/nest/css/style.css">
    <link rel="stylesheet" type="text/css" id="style_sheet" href="/nest/css/skins/default.css">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="/favicon.png" type="image/x-icon" >

    <!-- Google fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800%7CPlayfair+Display:400,700%7CRoboto:100,300,400,400i,500,700">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link rel="stylesheet" type="text/css" href="/nest/css/ie10-viewport-bug-workaround.css">
    {{-- custom css --}}
    <link rel="stylesheet" type="text/css" href="/css/cst.css">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script type="text/javascript" src="/nest/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="/nest/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="/nest/js/html5shiv.min.js"></script>
    <script type="text/javascript" src="/nest/js/respond.min.js"></script>
    <![endif]-->
    {{-- swal 2 size --}}
    <style>
        .swal2-popup {
            font-size: 1.6rem !important;
        }
        .property-content .facilities-list {
            padding: 0;
            margin: 0;
            min-height: 60px;
        }
        .property-content .property-address {
            margin: 0 0 15px;
            min-height: 50px;
        }
        .carauseleye{
            height: 500px;
            object-fit: cover;
        }
        .visible-lg, .visible-md, .visible-sm, .visible-xs {
            display: block;
        }
    </style>
    @yield('header')
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P5MJCCG"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div class="page_loader"></div>

{{-- <!-- Option Panel -->
<div class="option-panel option-panel-collased">
    <h2>Change Color</h2>
    <div class="color-plate default-plate" data-color="default"></div>
    <div class="color-plate blue-plate" data-color="blue"></div>
    <div class="color-plate yellow-plate" data-color="yellow"></div>
    <div class="color-plate red-plate" data-color="red"></div>
    <div class="color-plate green-light-plate" data-color="green-light"></div>
    <div class="color-plate orange-plate" data-color="orange"></div>
    <div class="color-plate yellow-light-plate" data-color="yellow-light"></div>
    <div class="color-plate green-light-2-plate" data-color="green-light-2"></div>
    <div class="color-plate olive-plate" data-color="olive"></div>
    <div class="color-plate purple-plate" data-color="purple"></div>
    <div class="color-plate blue-light-plate" data-color="blue-light"></div>
    <div class="color-plate brown-plate" data-color="brown"></div>
    <div class="setting-button">
        <i class="fa fa-gear"></i>
    </div>
</div>
<!-- /Option Panel --> --}}

<!-- Top header start -->
<header class="top-header hidden-xs" id="top">
    <div class="container">
        <div class="list-inline pull-right">
            <a href=""><i class="fa fa-phone"></i>08987139216</a>
            <a href="tel:info@bukasewa.com"><i class="fa fa-envelope"></i>info@bukasewa.com</a>
        </div>
    </div>
</header>
<!-- Top header end -->
<!-- Main header start -->
<header class="main-header">
    <div class="container">
        <nav class="navbar navbar-default">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navigation" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a style="padding:10px" href="/" class="logo">
                    <img src="/img/logo.png" alt="logo buka sewa">
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="navbar-collapse collapse" role="navigation" aria-expanded="true" id="app-navigation">
                <ul class="nav navbar-nav">
                    <li class="mega-dropdown" >
                        <a onmouseenter="shownav()" tabindex="0"  data-toggle="dropdown" data-submenu="" aria-expanded="false">
                            Lokasi  <span class="caret"></span>
                        </a>
                        <ul  class="dropdown-menu mega-dropdown-menu row">
                            <li class="col-lg-6 col-xs-6 col-sm-6">
                                <ul id="listkampus">
                                    <li class="dropdown-header">Dekat kampus</li>
                                </ul>
                            </li>
                            <li class="col-lg-6 col-xs-6 col-sm-6">
                                <ul id="listwisata">
                                    <li class="dropdown-header">Paling dicari</li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li onclick="window.location.href='/hunian'">
                        <a  tabindex="0" data-toggle="dropdown" data-submenu="" aria-expanded="false">
                            List Hunian
                        </a>
                    </li>
                    <li onclick="window.location.href='/hunian'">
                        <a  tabindex="0" data-toggle="dropdown" data-submenu="" aria-expanded="false">
                            Bandingkan
                        </a>
                    </li>
                    <li onclick="window.location.href='/hunian'">
                        <a  tabindex="0" data-toggle="dropdown" data-submenu="" aria-expanded="false">
                            Promo
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right rightside-navbar">
                    <li>
                        <a href="/register" class="button">
                            <i class="fa fa-camera">   PASANG IKLAN</i>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
<!-- Main header end -->

<!-- Banner start -->
@if (empty($banner))
@else

<!-- Banner start -->
<div class="banner">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item banner-max-height">
                <img src="/nest/img/banner/banner-slider-1.jpg" alt="banner-slider-1">
                <div class="carousel-caption banner-slider-inner">
                    <div class="banner-content">
                        <h1 data-animation="animated fadeInDown delay-05s"><span>Temukan Hunian </span> Impianmu</h1>
                        <p data-animation="animated fadeInUp delay-1s">BukaSewa membantu anda dalam menentukan Harga,dengan Hunian yang nyaman,bersahabat,solusi tepat hunian anda</p>
                    </div>
                </div>
            </div>
            <div class="item banner-max-height">
                <img src="/img/2.jpg" alt="banner-slider-2">
                <div class="carousel-caption banner-slider-inner">
                    <div class="banner-content">
                        <h1 data-animation="animated fadeInDown delay-1s"><span>Rasakan kebahagiaan</span> bersama keluarga</h1>
                        <p data-animation="animated fadeInUp delay-05s">Bersama keluarga</span> Berkumpul ria bahagia karena BukaSewa menjamin kualitas tempat tinggal anda,berbagai fasilitas kami hadir dalam pilihan hunian yang lengkap</p>
                    </div>
                </div>
            </div>
            <div class="item banner-max-height">
                <img src="/nest/img/banner/banner-slider-3.jpg" alt="banner-slider-3">
                <div class="carousel-caption banner-slider-inner">
                    <div class="banner-content">
                        <h1 data-animation="animated fadeInLeft delay-05s"><span>Dunia digenggam dengan BukaSewa </h1>
                        <p data-animation="animated fadeInLeft delay-1s">BukaSewa membangun masa depan dan </span>merubah gaya hidup anda dengan Hunian</p>
                        <a href="#" class="btn button-md border-button-theme" data-animation="animated fadeInLeft delay-20s">Pelajari</a>
                    </div>
                </div>
            </div>
            <div class="item banner-max-height active">
                <img src="/img/properties/properties-5.jpg" alt="banner-slider-3">
                <div class="carousel-caption banner-slider-inner">
                    <div class="banner-content">
                        <h1 data-animation="animated fadeInLeft delay-05s"><span>Pasang hunianmu sekarang </h1>
                        <p data-animation="animated fadeInLeft delay-1s">BukaSewa membantu kamu untuk mempromosikan hunianmu</span>, pelanggan akan sangat mudah menemukan hunianmu</p>
                        <a href="/register" class="btn button-md button-theme" data-animation="animated fadeInLeft delay-15s">Daftar sekarang, Gratis!</a>
                        <a href="#" class="btn button-md border-button-theme" data-animation="animated fadeInLeft delay-20s">Pelajari lebih lanjut</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="slider-mover-left" aria-hidden="true">
                <i class="fa fa-angle-left"></i>
            </span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="slider-mover-right" aria-hidden="true">
                <i class="fa fa-angle-right"></i>
            </span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
    <!-- Banner end -->
@endif


<!-- Banner end -->

<!-- Search area start -->
@if (empty($search))
    <div class="search-area">
        <div class="container">
            <div class="search-area-inner">
                <div class="search-contents ">
                    <form method="get" action="/find/">
                        <input type="hidden" name="lat" id="lat">
                        <input type="hidden" name="lng" id="lng">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <input required id="searchlokasi" class="form-control search-fields" name="lokasi"  placeholder="Cari Lokasi Hunian">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <select required class="selectpicker search-fields" name="kategori">
                                        @foreach ($kategori as $kat)
                                            <option value="{{$kat->id}}">{{$kat->kategori}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 ">
                                <div class="form-group">
                                    <button class="search-button" id="cari"><i class="fa fa-search"></i> Cari</button>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <a class="show-more-options" data-toggle="collapse" data-target="#options-content">
                                <i class="fa fa-plus-circle"></i> Pilihan lainnya
                            </a>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <a style="" class="show-more-options pull-right" data-toggle="collapse" data-target="#options-price">
                                <i class="fa fa-plus-circle"></i> Tentukan harga
                            </a>
                            </div>
                        </div>
                        <div  id="options-content" class="collapse">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                        <select required class="selectpicker search-fields" type="number" name="radius" >
                                            <option value="20">Dalam radius 20 km</option>
                                            <option value="100"> 100 km</option>
                                            <option value="50">50 km</option>
                                            <option value="10">10 km</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                        <select class="selectpicker search-fields" name="toilet">
                                            <option value="dalam">Toilet</option>
                                            <option value="dalam">Dalam</option>
                                            <option value="luar">Luar</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                        <select class="selectpicker search-fields" name="kamar" >
                                            <option value="">Kamar Tidur</option>
                                            <option value="1">>1</option>
                                            <option value="4">>4</option>
                                            <option value="8">>8</option>
                                        </select>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="collapse" id="options-price">
                            <div class="row">
                                <div class="col-lg-7 col-xs-12">
                                    <div class="form-group">
                                        <div class="range-slider">
                                            <div data-min="400000" data-max="100000000" data-unit="Rp." data-min-name="min_price" data-max-name="max_price" class="range-slider-ui ui-slider" aria-disabled="false"></div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-xs-12">
                                    <div class="form-group">
                                    <select name="durasi" class="selectpicker search-fields" name="area-from">   <option value="">Durasi</option>
                                        <option value="bulan">/Bulan</option>
                                        <option value="tahun">/Tahun</option>
                                        <option value='hari'>/Hari</option>
                                    </select>
                                </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@else
    
@endif

<!-- Search area start -->

{{-- content --}}
@yield('content')
<!-- Footer start -->
<footer class="main-footer clearfix">
    <div class="container">
        <!-- Footer info-->
        <div class="footer-info">
            <div class="row">
                <!-- About us -->
                <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                    <div class="footer-item">
                        <div class="main-title-2">
                            <h1>Tentang Kami</h1>
                        </div>
                        <p>
                            BukaSewa didirikan oleh para pemuda bangsa,
                            Untuk membantu mahasiswa,traveler,dan setiap orang
                            dalam mencari hunian terbaik.
                        </p>
                        <ul class="personal-info">
                            <li>
                                <i class="fa fa-map-marker"></i>
                                Address: Jl.Muding Batu Sangian II ,no 23,Mudingsari,Kerobokan,Badung,Bali 80111
                            </li>
                            <li>
                                <i class="fa fa-envelope"></i>
                                Email:<a href="mailto:sales@hotelempire.com">info@bukasewa.com</a>
                            </li>
                            <li>
                                <i class="fa fa-phone"></i>
                                Phone: <a href="tel:+628987139216">+628987139216</a>
                            </li>
                            <li>
                                
                        </ul>
                    </div>
                </div>
                <!-- Links -->
                <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
                    <div class="footer-item">
                        <div class="main-title-2">
                            <h1></h1>
                        </div>
                        <ul class="links">
                           
                        </ul>
                    </div>
                </div>
                <!-- Recent cars -->
               
                <!-- Subscribe -->
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="footer-item">
                        <div class="main-title-2">
                            <h1>Subscribe</h1>
                        </div>
                        <div class="newsletter clearfix">
                            <p>
                               Beritahu saya kabar terbaru dan iklan terbaru
                            </p>

                            <form action="#" method="post">
                                <div class="form-group">
                                    <input class="nsu-field btn-block" id="nsu-email-0" type="text" name="email" placeholder="Enter your Email Address" required="">
                                </div>
                                <div class="form-group mb-0">
                                    <button type="submit" class="button-sm button-theme btn-block">
                                        Subscribe
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer end -->

<!-- Copy right start -->
<div class="copy-right">
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-8 col-sm-12">
                &copy;  2019 <a href="http://bukasewa.com/" target="_blank">BukaSewa</a>. Karya Pemuda Bangsa
            </div>
            <div class="col-md-4 col-sm-12">
                <ul class="social-list clearfix">
                    <li>
                        <a href="#" class="facebook">
                            <i class="fa fa-facebook"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="twitter">
                            <i class="fa fa-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="linkedin">
                            <i class="fa fa-linkedin"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="google">
                            <i class="fa fa-google-plus"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="rss">
                            <i class="fa fa-rss"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Copy end right-->


<script src="/nest/js/jquery-2.2.0.min.js"></script>
<script src="/nest/js/bootstrap.min.js"></script>
<script src="/nest/js/bootstrap-submenu.js"></script>
<script src="/nest/js/rangeslider.js"></script>
<script src="/nest/js/jquery.mb.YTPlayer.js"></script>
<script src="/nest/js/wow.min.js"></script>
<script src="/nest/js/bootstrap-select.min.js"></script>
<script src="/nest/js/jquery.easing.1.3.js"></script>
<script src="/nest/js/jquery.scrollUp.js"></script>
<script src="/nest/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="/nest/js/leaflet.js"></script>
<script src="/nest/js/leaflet-providers.js"></script>
<script src="/nest/js/leaflet.markercluster.js"></script>
<script src="/nest/js/dropzone.js"></script>
<script src="/nest/js/jquery.filterizr.js"></script>
<script src="/nest/js/jquery.magnific-popup.min.js"></script>
<script src="/nest/js/maps.js"></script>
<script src="/nest/js/app.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="/nest/js/ie10-viewport-bug-workaround.js"></script>
<!-- Custom javascript -->
<script src="/nest/js/ie10-viewport-bug-workaround.js"></script>
{{-- swal2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
{{-- cari button --}}

<script>
    var show="false";
    $(document).ready(function () {
        autocomplete = new google.maps.places.Autocomplete(document.getElementById('searchlokasi'),
                { types: ['geocode'] });
                google.maps.event.addListener(autocomplete, 'place_changed', function() {
                console.log(autocomplete.getPlace().geometry.location.lat());
                console.log(autocomplete.getPlace().geometry.location.lng());
                $("input#lat").val(autocomplete.getPlace().geometry.location.lat());
                $("input#lng").val(autocomplete.getPlace().geometry.location.lng());
            });
           
    });
    
    // Range sliders initialization
    $(".range-slider-ui").each(function () {
        var unit = $(this).attr('data-unit');

        $(this).append("" +
            "<input class='min-value form-control' name='vmin'>" +
            "<input class='max-value form-control' name='vmax'>"
        );
        $(this).slider({
            range: true,
            min: 400000,
            max: 50000000,
            values: [400000,50000000],
            slide: function (event, ui) {
                event = event;
                var currentMin = parseInt(ui.values[0]);
                var currentMax = parseFloat(ui.values[1]);
                $(this).children(".min-value").val(formatRupiah(currentMin+'', 'Rp.'));
                $(this).children(".max-value").val(formatRupiah(currentMax+'', 'Rp.'));
            }
        });

        var currentMin = parseInt($(this).slider("values", 0));
        var currentMax = parseFloat($(this).slider("values", 1));
        $(this).children(".min-value").val( formatRupiah(currentMin+'', 'Rp.'));
        $(this).children(".max-value").val(formatRupiah(currentMax+'', 'Rp.'));
    });
    /* Fungsi formatRupiah */
		function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
 
			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
		}
        function shownav() {
            if (show=="true") {
                
            } else {
                $.ajax({
                    type: "post",
                    url: "/get/detail/region/all",
                    data: {
                        _token:"{{csrf_token()}}"
                    },
                    dataType: "json",
                    success: function (response) {
                        $.each(response, function (index, tempat) { 
                             switch (tempat.tag) {
                                 case 'rated':
                                    $("#listwisata").append('<li><a href="/hunian-murah-disekitar/'+tempat.nama+'">'+tempat.nama+'</a></li>');
                                     break;
                                case 'kampus':
                                    $("#listkampus").append('<li><a href="/hunian-murah-disekitar/'+tempat.nama+'">'+tempat.nama+'</a></li>');
                                     break; 
                                 default:
                                     break;
                             }
                        });
                    }
                });
                show="true";
            }
            
        }
</script>
<script src="/js/loadnav.js"></script>
@yield('footer')
</body>

</html>