<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Tambahkan Iklan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="colorlib.com">
    <link rel="stylesheet" href="/adminlte/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/nest/fonts/flaticon/font/flaticon.css">

    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link rel="stylesheet" href="/mywizard/fonts/material-design-iconic-font/css/material-design-iconic-font.css">

    <!-- DATE-PICKER -->
    <link rel="stylesheet" href="/mywizard/vendor/date-picker/css/datepicker.min.css">

    <!-- STYLE CSS -->
	<link rel="stylesheet" href="/mywizard/css/style.css">
	<link rel="stylesheet" type="text/css" href="/css/mycss.css">
	<div class="overlays">  
	<div id="overlay">
		<img src="/loading.gif" alt="Loading" />
	</div>
	</div>
	<style>
		.swal2-popup {
			font-size: 1.6rem !important;
		}
		.form-control{
			color: #fdfdfd;
		}
		.actions li:last-child a {
			width: 200px;
		}
		textarea.form-control {
			padding: 18px;
			background: rgba(255, 255, 255, 0.2); 
		}
		#description {
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
      }

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
      
        .modal{
            z-index: 20;   
        }
        .modal-backdrop{
            z-index: 10;        
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
</head>
<body>
		<div class="wrapper">
			<div class="image-holder">
				<img style="margin-bottom: 150px;" src="/mywizard/images/form-wizard.png" alt="">
			</div>
            <form >
            	<div class="form-header">
            		<a href="/vendor">BUKASEWA.COM</a>
            		<h3>Daftarkan dan iklankan propertimu sekarang</h3>
            	</div>
            	<div id="wizard">
            		<!-- SECTION 1 -->
	                <h4></h4>
	                <section>
	                    <div class="form-row" style="margin-bottom: 26px;">
	                    	<label for="">
	                    		<i class="fa fa-map-signs"></i> Provinsi
	                    	</label>
	                    	<div class="form-holder">
	                    	    <select class="form-control" id="provinsi">
	                    	        @foreach($provinsi as $prov)
	                    	        <option style="background-color:#dd1c1c" value="{{$prov->id}}">
	                    	            {{$prov->provinsi}}
	                    	        </option>
	                    	        @endforeach
	                    	    </select>
							</div>
						</div>
	                    <div class="form-row" style="margin-bottom: 26px;">
	                    	<label for="">
	                    		<i class="fa fa-map"></i> Lokasi Hunian kamu
	                    	</label>
	                    	<div class="form-holder">
                                <i class="fa fa-map-marker"></i>
                                <input id="lokasi" onclick="openmap()" type="text" class="form-control">
							</div>
						</div>
						<div class="form-row" style="margin-bottom: 26px;">
	                    	<label for="">
                                <i class="fa fa-whatsapp"></i> Nomor Whatsapp
	                    	</label>
	                    	<div class="form-holder">
                                <input id="hp" type="text" placeholder="Contoh: 6281xxxxxx" class="form-control">
                                <small>NB: Awali dengan kode negara dan pastikan nomor terintegrasi dengan whatsapp</small>
							</div>
						</div>	
	                </section>
	                
					<!-- SECTION 2 -->
	                <h4></h4>
	                <section>
	                    <div class="form-row">
	                    	<label for="">
	                    		Nama Hunian* :
	                    	</label>
	                    	<div class="form-holder">
	                    		<input type="text" class="form-control" id="nama_hunian">
	                    	</div>
	                    </div>	
	                    <div class="form-row">
	                    	<label for="">
	                    		Jenis Hunian* :
	                    	</label>
	                    	<div class="form-holder">
	                    		<select name="" id="kategori" class="form-control">
									@foreach ($kategori as $kat)
										<option value="{{$kat->id}}" class="option">{{$kat->kategori}}</option>
									@endforeach
								</select>
								<i class="zmdi zmdi-caret-down"></i>
	                    	</div>
						</div>
						<div class="row" style="margin-bottom: 3.4vh">
							<div style="margin-bottom: 3.4vh" class="col-lg-6 col-xs-12 col-sm-12">
								<label for="">
									Gambar* :
								</label>
								<div class="form-holder">
									<input id="gambar" accept="jpg||png" type="file" multiple name="myimg" id="myimg">
									<small><span class="fa fa-info-circle"></span> Tahan <span style="color:yellow">ctrl</span> dan klik gambar untuk multiselect</small>
								</div>
							</div>
							<div class="col-lg-6 col-xs-12 col-sm-12">
								<label for="">
									Video:
								</label>
								<div class="form-holder">
									<input id="video" type="text" class="form-control" placeholder="Link video youtube anda" name="myimg" id="myimg">
								</div>
							</div>
						</div>	
	                    <div style="margin-bottom: 3.4vh">
	                    	<label for="">
	                    		Deskripsi hunian* :
	                    	</label>
	                    	<div class="form-holder">
								<textarea placeholder="TIPS: Deskripsikan hunianmu, seperti lingkungan dan kamu juga bisa menyertakan kelebihan. Sabar, untuk fitur dapat ditambahkan pada slide selanjutnya." class="form-control" name="" id="desk" cols="30" rows="10"></textarea>
							</div>
						</div>		
	                </section>

	                <!-- SECTION 3 -->
	                <h4></h4>
	                <section>
						<div class="form-row" style="margin-bottom: 3.4vh">
							<label for="">
								Status Hunian:
							</label>
							<div class="form-holder">
								<div class="checkbox-circle">
									<label class="male">
										<input id="rsewa" type="radio" name="gender" value="male" checked="">Disewakan<br>
										<span class="checkmark"></span>
									</label>
									<label class="female">
										<input id="rjual" type="radio" name="gender" value="female">Dijual<br>
										<span class="checkmark"></span>
									</label>
								</div>
							</div>
						</div>
						<div id="divsewa">
							<div class="form-row" style="margin-bottom: 3.4vh">
								<label for="">
									Tambahkan Harga:
								</label>
								<div class="input-group">
										<!-- /btn-group -->
										<input id="nominal" type="number" class="form-control">
										<div class="input-group-btn">
												<button style="height:41px" type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Jangka Sewa
													<span class="fa fa-caret-down"></span></button>
												<ul class="dropdown-menu">
													<li id="bulan" onclick="addharga('bulan')"><a href="#">/Bulan</a></li>
													<li id="tahun" onclick="addharga('tahun')"><a  href="#">/Tahun</a></li>
													<li id="hari" onclick="addharga('hari')"><a  href="#">/Hari</a></li>
												</ul>
										</div>
									</div>
							</div>
							<div id="labelharga" class="form-row">
							</div>
						</div>
						<div style="display:none;margin-bottom:20px" id="divjual" class="form-row" style="margin-bottom: 3.4vh">
	                    	<label for="">
	                    		Harga:
	                    	</label>
	                    	<div class="input-group">
								<span class="input-group-addon">Rp.</span>
								<input id="hargajual" type="number" class="form-control">
								<span class="input-group-addon">.00</span>
							</div>
	                    </div>		
					</section>
					
					<!-- SECTION 4 -->
					<h4></h4>
					<section>
						<div class="row">
							<div class="col-lg-8 col-xs-12 col-sm-12 col-md-8">
								<label>Ruangan dan properti</label>
								<div style="margin-top:10px" class="form-row">
									<label for="">
										Kamar tidur
									</label>
									<input type="number" value="0" placeholder="Jumlah kamar tidur" class="form-control" name="" id="bed">
								</div>
								<div class="form-row">
									<label for="">
										Toilet
									</label>
									<input type="number" value="0" placeholder="Jumlah toilet" class="form-control" name="" id="wc">
								</div>
								<div class="form-row">
									<label for="">
										TV
									</label>
									<input type="number" value="0" placeholder="Jumlah tv" class="form-control" name="" id="tv">
								</div>
								<div class="form-row">
									<label for="">
										Garasi
									</label>
									<input type="number" value="0" placeholder="Jumlah tv" class="form-control" name="" id="garasi">
								</div>
								<div class="form-row">
									<label for="">
										Luas Ruangan
									</label>
									<input type="text" placeholder="Contoh: 15x10" class="form-control" name="" id="luas">
								</div>
							</div>
							<div class="col-lg-4 col-xs-12 col-sm-12 col-md-4">
								<div class="form-group">
									<label>Fitur</label>
									@foreach ($fitur as $f)
										<div class="checkbox">
											<label>
												<input class="get_value" value="{{$f->id_fitur}}" type="checkbox" /><i class="flaticon {{$f->icon}}"></i> {{$f->fitur}}
											</label>
										</div>
									@endforeach
								</div>
							</div>
						</div>
					</section>
					
            	</div>
            </form>
		</div>
        <!-- Modal -->
        <div class="modal fade" id="mapmodal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <div style="width:60%" class="pac-card" id="pac-card">
                          <div>
                            <div id="title">
                              <i class="fa fa-marker"></i> Drag penanda atau masukkan lokasi pada form
                            </div>
                          </div>
                          <div id="pac-container">
                            <input style="background:rgba(0, 0, 0, 0.28);" class="form-control" id="input-lokasi" type="text"
                                placeholder="Enter a location">
                          </div>
                        </div>
                        <div style="height:400px;width:400px;width:100%" id="maplokasi"></div>
                    <div class="modal-footer">
                        
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button id="pilihlokasi" type="button" class="btn btn-danger"><i class="fa fa-map-signs"></i> Pilih</button>
                    </div>
                </div>
            </div>
        </div>
		<script src="/mywizard/js/jquery-3.3.1.min.js"></script>
		
		<!-- JQUERY STEP -->
		<script src="/mywizard/js/jquery.steps.js"></script>
		<script src="node_modules/blueimp-file-upload/js/jquery.fileupload.js"></script>

		<!-- DATE-PICKER -->
		<script src="/mywizard/vendor/date-picker/js/datepicker.js"></script>
		<script src="/mywizard/vendor/date-picker/js/datepicker.en.js"></script>
        <script src="/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="/mywizard/js/main.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCNc257lpFxxKmJxqKzdgshuSHDUdtRDmE&libraries=places" async defer></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<!-- Template created and distributed by Colorlib -->
</body>
<script>
	var l = {lat: -25.344, lng: 131.235};
	var mystatus="sewa";
	var endaddress="";
	var geolat,geolng; 
	var $bulan=0;
	var $hari=0;
	var $tahun=0;
	var $hargajual=0;
	var totalfiles=0;
	var marker=null;
	var pos;
    $(document).ready(function () {
        $("#pilihlokasi").click(function () { 
            $("#lokasi").val(endaddress);
            $("#mapmodal").modal("hide");
		});
		$("#rsewa").click(function (e) {
			mystatus="sewa";
			$("#divjual").hide(); 
			$("#divsewa").show();
		});
		$("#rjual").click(function (e) {
			mystatus="jual";
			$("#divsewa").hide(); 
			$("#divjual").show();
		});
    });

	function xx(waktu) {
		$("#"+waktu).show();
		switch (waktu) {
				case 'hari':
					$hari="0";
				break;
				case 'tahun':
					$tahun="0";
				break;
				default:
					$bulan="0";
				break;
		}
		console.log("x"+waktu)
	}

	function addharga(waktu) {
		if ($("#nominal").val()!="") {
			nominal=formatRupiah($("#nominal").val(), "Rp.");
			$("#nominal").val("")
			$("#"+waktu).hide();
			$("#labelharga").append('<div style="margin-right:5px" class="alert alert-info alert-dismissible"><button type="button" class="close" onclick=xx("'+waktu+'") data-dismiss="alert" aria-hidden="true">×</button><span class="nominal">'+nominal+'</span><b>/'+waktu+'</b></div>');
			switch (waktu) {
				case 'hari':
					$hari=nominal;
				break;
				case 'tahun':
					$tahun=nominal;
				break;
				default:
					$bulan=nominal;
				break;
			}
		} else {
			toast("Masukkan harga terlebih dahulu","error");
		}
	}

    function openmap(param) {
        console.log("map open");
        $("#mapmodal").modal("show");
    }

    $("#mapmodal").on("shown.bs.modal", function () {
        
        init();
        //autocomplete
        var card = document.getElementById('pac-card');
        map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);
        autocomplete = new google.maps.places.Autocomplete(document.getElementById('input-lokasi'),
                { types: ['geocode'] });
                google.maps.event.addListener(autocomplete, 'place_changed', function() {
                pos={lat:autocomplete.getPlace().geometry.location.lat(),lng:autocomplete.getPlace().geometry.location.lng()}
                marker.setMap(null);
                mark(pos);
            });
        
        $("#maplokasi").css("width", "100%");
        google.maps.event.trigger(map, "resize");
        map.setCenter(l);
        console.log('modal loaded');
    });

    function init() {
         // The map, centered at L
         map = new google.maps.Map(document.getElementById('maplokasi'), {zoom: 15, center: l});
         geocoder=new google.maps.Geocoder();
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                function (position) {
                    pos={
                        lat:position.coords.latitude,
                        lng:position.coords.longitude
                    };
                    mark(pos)
                    map.setCenter(pos);
                },
                function () {
                    handleLocationError(true,infoWindow,map.getCenter());
                }
            );
        } else {
            handleLocationError(false,infoWindow,map.getCenter());
        }
    }
    
    function mark(loc){
        marker=new google.maps.Marker({
            position:loc,
            map:map,
            title:"Drag untuk memindahkan penentu lokasi",
            draggable: true
        });

        geolat=marker.position.lat();
        geolng=marker.position.lng();
        geocode(geocoder,map);
        map.setCenter(loc);
        //ketika marker di drag
        google.maps.event.addListener(marker,'dragend',function() {
            pos={lat:marker.position.lat(),lng:marker.position.lng()}
            geolat=marker.position.lat();
            geolng=marker.position.lng();
            geocode(geocoder,map);
            
        });
    }

    function geocode(geocoder,map) {
            console.log(pos);
            var lokasi=pos;
            geocoder.geocode(
                {location:lokasi},
                function (results,status) {
                    if (status=="OK") {
                        if (results[0]) {
                            console.log("endaddress: "+results[0].formatted_address);
                            endaddress=results[0].formatted_address;
                        }
                        else{
                            window.alert("Error:Tidak Dapat Data Lokasi");
                        }
                    }
                    else{
                        window.alert("Error:Geocode, "+status);
                    }
                });
	}
	
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

	function toast(teks,tipe) {
		const Toast = Swal.mixin({
		toast: true,
		position: 'top-end',
		showConfirmButton: false,
		timer: 3000
		})
		
		Toast.fire({
		type: tipe,
		title: teks
		})
	}

</script>
</html>