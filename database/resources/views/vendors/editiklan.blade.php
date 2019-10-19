@extends('layout.vendor')
@section('title','Edit Hunian : '.$properti->properti)
@section('content')
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
<div class="row">
    <div class="col-lg-8 col-xs-12 col-md-12 col-sm-12">
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Info Hunian <a href="/detail/properti/{{$properti->id_properti}}"><i class="fa fa-eye"></i></a></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <form role="form">
                <!-- text input -->
                <div class="form-group">
                    <label>Nama Hunian</label>                        <a id="editnama" href="#edit_nama"><i class="fa fa-edit pull-right"> Edit</i></a>

                    <div id="e_namaku" style="display:none" class="input-group">
                            <input value="{{$properti->properti}}" id="inamaku" type="text" class="form-control">
                            <div class="input-group-btn">
                                    <button id="update_nama" type="button" class="btn btn-danger">Ubah</button>
                            </div>
                                    <!-- /btn-group -->
                    </div>
                    <p id="properti"  class="text-muted">{{$properti->properti}}
                    </p>
                    <hr>
                </div>
                <!-- phone mask -->
                  <div class="form-group">
                    <label>Whatsapp</label>                        <a id="editwa" href="#edit_wa"><i class="fa fa-edit pull-right"> Edit</i></a>

                    <div id="e_wa" style="display:none" class="input-group">
                            <input value="{{$properti->whatsapp}}" id="iwa" type="number" class="form-control">
                            <div class="input-group-btn">
                                    <button id="update_wa" type="button" class="btn btn-danger">Ubah</button>
                            </div>
                                    <!-- /btn-group -->
                    </div>
                    <p id="wa"  class="text-muted">{{$properti->whatsapp}}
                    </p>
                    <hr>
                </div>
                  <!-- /.form group -->
                <div class="form-group">
                <label>Jenis Hunian</label>
                <select class="form-control" name="" id="jenishunian">
                    @foreach ($kategori as $k)
                        @if ($k->id==$properti->kategori)
                            <option selected="selected" value="{{$k->id}}">{{$k->kategori}}</option>
                        @else
                            <option value="{{$k->id}}">{{$k->kategori}}</option>
                        @endif
                    @endforeach
                </select>
                </div>

                <!-- textarea -->
                <div class="form-group">
                <strong></i>Deskripsi</strong>
                <a id="editdesk" href="#edit_desk"><i class="fa fa-edit pull-right"> Edit</i></a>
                <br>
                <div style="display:none" id="e_deskripsiku">
                <textarea class="form-control" id="ideskripsi" cols="30" rows="8">{{$properti->deskripsi}}</textarea>
                <br>
                <button id="update_deskripsi" class="btn btn-primary small">Ubah</button>
                </div>
                <p style="margin-top:10px" id="deskripsi"><span>{{$properti->deskripsi}}</span>
                </p>
                </div>
                <hr>
                <div class="form-group">
                        <label for="">
                            Tambahkan Harga:
                        </label>
                        <div class="input-group">
                                <!-- /btn-group -->
                                <input id="nominal" type="number" class="form-control">
                                <div class="input-group-btn">
                                        <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Jangka Sewa
                                            <span class="fa fa-caret-down"></span></button>
                                        <ul class="dropdown-menu">
                                            <li id="bulan" onclick="addharga('bulan')"><a href="#">/Bulan</a></li>
                                            <li id="tahun" onclick="addharga('tahun')"><a  href="#">/Tahun</a></li>
                                            <li id="hari" onclick="addharga('hari')"><a  href="#">/Hari</a></li>
                                        </ul>
                                </div>
                            </div>
                </div>
                <div id="labelharga">
                </div>
            </form>
            </div>
            <!-- /.box-body -->
        </div>
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Info Lokasi </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <form role="form">
                <!-- text input -->
                <div class="form-group">
                    <label>Provinsi</label>
                    <select class="form-control" id="provinsi">
            	        @foreach($provinsi as $prov)
            	        @if($prov->id==$properti->region)
            	        <option selected value="{{$prov->id}}">
            	            {{$prov->provinsi}}
            	        </option>
            	        @else
            	        <option value="{{$prov->id}}">
            	            {{$prov->provinsi}}
            	        </option>
            	        @endif
            	        @endforeach
            	    </select>
                </div><div class="form-group">
                    <label>Lokasi Hunian</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-map"></i>
                      </div>
                      <input id="lokasihunian" onclick='openmap()' type="text" class="form-control" placeholder="Masukkan lokasi hunian">
                    </div>
                </div>
            </form>
            <button id="updatelokasi" class="btn btn-danger small pull-right"><i class="fa fa-save"></i> Update Lokasi</button>
            </div>
            <!-- /.box-body -->
            
        </div>
        <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Fasilitas hunian</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-6 col-lg-3">
                            <div class="input-group">
                                <span class="input-group-addon">Kamar Tidur</span>
                                <input id="bed" value="{{$properti->kamar}}" type="number" class="form-control">
                            </div>
                        </div>
                        <div style="margin-bottom: 10px" class="col-xs-6 col-lg-3">
                            <div class="input-group">
                                <span class="input-group-addon">Toilet</span>
                                <input id="toilet" value="{{$properti->toilet}}" type="number" class="form-control">
                            </div>
                        </div>
                        <div class="col-xs-6 col-lg-3">
                            <div class="input-group">
                                <span class="input-group-addon">Garasi</span>
                                <input id="garasi" value="{{$properti->garasi}}" type="number" class="form-control">
                            </div>
                        </div>
                        <div class="col-xs-6 col-lg-3">
                            <div class="input-group">
                                <span class="input-group-addon">Tv</span>
                                <input id="tv" value="{{$properti->tv}}" type="number" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div style="margin-top:20px;margin-left:20px" class=" grid-container">
                        @foreach ($allfitur as $f)
                            <div class="form-group">
                                <div class="checkbox">
                                    <input id="{{$f->id_fitur}}" class="get_value" value="{{$f->id_fitur}}" type="checkbox" />
                                    <i class="flaticon {{$f->icon}}"></i> {{$f->fitur}}
                                </div>
                            </div>
                        @endforeach                          
                    </div>
                    <button id="savefasilitas" class="pull-right btn btn-danger"><i class="fa fa-save"></i> Update fasilitas</button>

                </div>
                <!-- /.box-body -->
            </div>
    </div>
    <div class="col-lg-4 col-xs-12 col-md-12 col-sm-12">
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Gambar Hunian</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <center>
                    <button id="add_img" class="btn btn-danger small"><span class="fa fa-plus"></span> Tambah Gambar</button>
                </center>
                <input onchange="uploadimgs()" type="file" style="display:none" id="imgs">
                <!-- The grid: four columns -->
                <div id="myimg" class="row">
                    @foreach ($imgs as $img)
                        <div  id="{{$img->id_img}}" class="column">
                            <img src="/{{$img->link}}" alt="gambar propertimu" style="width:100%" onclick="clickImg(this,'{{$img->id_img}}');">
                        </div>
                    @endforeach
                    <div style="display: none" id="up-progress" style="background-color: #43480b63;
                    margin-top: 10px;" id="{{$img->id_img}}" class="column">
                        <div class="progress progress-sm active">
                            <div id="progress" class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"  style="width: 0%">
                            </div>
                        </div>
                    </div>
                      </div>
                      <div  id="expandedImg1" class="container">
                        <button style="font-size: 20px;" onclick="deleteImg()" class="btn btn-danger small closebtn"><i class="fa fa-trash-o"></i></button>
                        <img class="image_edit" id="expandedImg">
                      </div>
                        </div>
                        
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
@endsection
@section('footer')
{{-- async --}}
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCNc257lpFxxKmJxqKzdgshuSHDUdtRDmE&libraries=places"  defer></script>
<!-- Modal -->
        <div class="modal fade" id="mapmodal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <div style="height:400px;width:400px;width:100%" id="maplokasi"></div>
                        <div class="modal-footer">
                            <input class="form-control" placeholder="masukkan lokasi" type="text" id="input-lokasi">        
                            <br>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button id="pilihlokasi" type="button" class="btn btn-danger"><i class="fa fa-map-signs"></i> Pilih</button>
                        </div>
                </div>
            </div>
        </div>
<script>
var myname;
var fasilitas=[];
var clickedImg="";
var lokasi={lat:{{$properti->lat}},lng:{{$properti->lng}}}
var geolat;
var geolng;
var endaddress;

$(document).ready(function () {

    $("#lokasihunian").val('{{$properti->alamat}}');
    
    $("#pilihlokasi").click(function () { 
            $("#lokasihunian").val(endaddress);
            $("#mapmodal").modal("hide");
		});
		
    $.ajax({
        type: "post",
        url: "/api/getfitur/detail",
        data: {
            id:"{{$properti->id_properti}}",
            _token:"{{csrf_token()}}"
        },
        dataType: "JSON",
        success: function (response) {
            for (let index = 0; index < response.length; index++) {
                var fitur=response[index].id_fitur;
                $("#"+fitur).attr("checked", "checked");
            }
        }
    });

    $("#add_img").click(function (e) { 
        document.getElementById('imgs').click();
    });

    $("#editnama").click(function (e) {  
            $("#properti").toggle('hide');
            $("#e_namaku").toggle('show');
    });
    
    $("#editwa").click(function (e) {  
            $("#wa").toggle('hide');
            $("#e_wa").toggle('show');
    });
    
    $("#editdesk").click(function (e) {  
            $("#deskripsi").toggle('hide');
            $("#e_deskripsiku").toggle('show');
            $(this).toggle('show');
    });
    $("#update_nama").click(function (e) {
            myname= $("#inamaku").val();
            updatedata("properti",myname);
            $("#properti").toggle('show');
            $("#e_namaku").toggle('show');
            $("#editnama").show();
    });
    
    $("#update_wa").click(function (e) {
            mywa= $("#iwa").val();
            updatedata("wa",mywa);
            $("#wa").toggle('show');
            $("#e_wa").toggle('show');
            $("#editwa").show();
    });
    
    $("#updatelokasi").click(function (e) {
        $.ajax({
            type: "POST",
            url: "/api/update/hunian/lokasi",
            data: {
                _token:"{{csrf_token()}}",
                id:'{{$properti->id_properti}}',
                coordinate:lokasi,
                alamat:$('#lokasihunian').val(),
                provinsi:$('#provinsi').val()
            },
            dataType: "JSON",
            success: function (response) {
                toast("Sukses mengupdate lokasi","success")
            },
            error:function(){
                toast("Maaf, terjadi kesalahan","error")
            }
        });
    });
    
    $("#update_deskripsi").click(function (e) {
        $("#deskripsi").toggle('hide');
        $("#e_deskripsiku").toggle('show'); 
        $("#editdesk").show();
        updatedata("deskripsi",$("#ideskripsi").val())
    });
    $("#jenishunian").change(function (e) {
        Swal.fire({
        title: 'Ubah kategori ini?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Iya, saya ingin mengubah!'
        }).then((result) => {
        if (result.value) {
            updatedata("kategori",$(this).val());
        }
        }) 
    });
    $("#savefasilitas").click(function (e) { 
        $('.get_value').each(function() {
            if ($(this).is(":checked")) {
                fasilitas.push($(this).val());
            }
        });
        $.ajax({
            type: "POST",
            url: "/api/update/hunian/fasilitas",
            data: {
                _token:"{{csrf_token()}}",
                bed:$("#bed").val(),
                toilet:$("#toilet").val(),
                garasi:$("#garasi").val(),
                tv:$("#tv").val(),
                fasilitas:fasilitas,
                id:"{{$properti->id_properti}}"
            },
            dataType: "JSON",
            success: function (response) {
                toast("Sukses mengupdate fasilitas","success")
            },
            error:function(){
                toast("Maaf, terjadi kesalahan","error")
            }
        });
    });
    //load map
    $("#mapmodal").on("shown.bs.modal", function () {
        
        init();
        mark(lokasi);
        //autocomplete
        var card = document.getElementById('pac-card');
        map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);
        autocomplete = new google.maps.places.Autocomplete(document.getElementById('input-lokasi'),
                { types: ['geocode'] });
                google.maps.event.addListener(autocomplete, 'place_changed', function() {
                lokasi={lat:autocomplete.getPlace().geometry.location.lat(),lng:autocomplete.getPlace().geometry.location.lng()}
                marker.setMap(null);
                mark(lokasi);
            });
        
        
        
        
        $("#maplokasi").css("width", "100%");
        google.maps.event.trigger(map, "resize");
        console.log('modal loaded');
        
        

    });
    loadharga();
});
//semua fungsi

function openmap() {
    console.log("map open");
    $("#mapmodal").modal("show");
}

var uploadPercentage=0;
function uploadimgs() {
    var fd=new FormData();
    totalfiles = document.getElementById('imgs').files.length;
    for (var index = 0; index < totalfiles; index++) {
        fd.append("img[]", document.getElementById('imgs').files[index]);
    }
    fd.append("_token","{{csrf_token()}}");
    fd.append("id","{{$properti->id_properti}}");

    axios.post("/api/insert/image",fd,
        {
            headers: {
                'Content-Type': 'multipart/form-data'
            },
            onUploadProgress: function( progressEvent ) {
                $("#up-progress").show();
                uploadPercentage = parseInt( Math.round( ( progressEvent.loaded * 100 ) / progressEvent.total ) );
                console.log(uploadPercentage);
                $("div#progress").css("width", uploadPercentage+'%');
            }.bind(this)
        }
        )
        .then(res => {
            $("#up-progress").hide();
            $("#myimg").append('<div id="'+res.data.id+'" class="column"><img src="/'+res.data.link+'" alt="gambar propertimu" style="width:100%" onclick="clickImg(this,'+res.data.id+');"></div>');
            toast("Gambar berhasil ditambahkan","success")
            $("#expandedImg").attr("src","/"+res.data.link);
        })
        .catch(err => {
            console.error(err); 
        })
}
function insertharga(durasi,harga) {
    $.ajax({
        type: "POST",
        url: "/api/update/hunian/sewa",
        data: {
            _token:"{{csrf_token()}}",
            harga:harga,
            durasi:durasi,
            id:'{{$properti->id_properti}}',
            index:"addsewa"
        },
        dataType: "JSON",
        success: function (response) {
            toast("Harga berhasil ditambahkan","success");
        },
        error:function(){
            toast("Terjadi kesalahan, coba lagi nanti","error");
        }
    });
}
function removeharga(durasi) {
    $.ajax({
        type: "POST",
        url: "/api/update/hunian/sewa",
        data: {
            _token:"{{csrf_token()}}",
            durasi:durasi,
            id:'{{$properti->id_properti}}',
            index:"removesewa"
        },
        dataType: "JSON",
        success: function (response) {
            toast("Harga berhasil dihapus","success");
        },
        error:function(){
            toast("Terjadi kesalahan, coba lagi nanti","error");
        }
    });
}
function updatedata(index,value) {
    $.ajax({
        type: "post",
        url: "/api/update/hunian",
        data: {
            id:'{{$properti->id_properti}}',
            index:index,
            value:value,
            _token:"{{csrf_token()}}"
        },
        dataType: "JSON",
        success: function (response) {
            $("#"+index).text(value);

            if (index=="properti") {
                $(".namahunian").text("Edit: "+value);
            }

            toast(index+" berhasil diubah","success");
        },
        error:function(){
            toast("Terjadi kesalahan coba lagi nanati","error");
        }
    });
}
function loadharga() {
    $.ajax({
        type: "POST",
        url: "/api/load/hargasewa",
        data: {
            _token:'{{csrf_token()}}',
            id:'{{$properti->id_properti}}'
        },
        dataType: "JSON",
        success: function (response) {
            for (let index = 0; index < response.length; index++) {
                console.log(response[index].harga);
                nominal=formatRupiah(response[index].harga, "Rp.");
                waktu=response[index].durasi;
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
            }
        }
    });
}
function addharga(waktu) {
		if ($("#nominal").val()!="") {
			nominal=formatRupiah($("#nominal").val(), "Rp.");
            insertharga(waktu,nominal);
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
			toast("Masukkan harga dulu","error");
		}
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
function xx(waktu) {
    removeharga(waktu);
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
function toast(a,b) {
    const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
    })

    Toast.fire({
    type: b,
    title: a
    })
}

function clickImg(imgs,id) {
  // Get the expanded image
  $("#expandedImg1").slideDown();
  var expandImg = document.getElementById("expandedImg");
  clickedImg=id;
  // Use the same src in the expanded image as the image being clicked on from the grid
  expandImg.src = imgs.src;
  // Show the container element (hidden with CSS)
  expandImg.parentElement.style.display = "block";
}

function deleteImg() {
    Swal.fire({
    title: 'Hapus gambar ini?',
    type: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Yap, Hapus!',
    cancelButtonText: "Batal"
    }).then((result) => {
    if (result.value) {
        if (clickedImg!="") {
            $.ajax({
                type: "POST",
                url: "/api/delete/img",
                data: {
                    _token:"{{csrf_token()}}",
                    id:clickedImg
                },
                dataType: "JSON",
                success: function (response) {
                    toast(response,"success");
                    $("#"+clickedImg).remove();
                    $("#expandedImg1").hide();
                }
            });
        }
    }
    })
    

    function geocode(geocoder,map) {
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

}
//map dan api

function init() {
     // The map, centered at L
     map = new google.maps.Map(document.getElementById('maplokasi'), {
          center: lokasi,
          zoom: 13
        });
     geocoder=new google.maps.Geocoder();
}
function mark(loc){
        console.log("mark")
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
            lokasi={lat:marker.position.lat(),lng:marker.position.lng()}
            geolat=marker.position.lat();
            geolng=marker.position.lng();
            geocode(geocoder,map);
        });
    }
function geocode(geocoder,map) {
        console.log(lokasi);
        geocoder.geocode(
            {location:lokasi},
            function (results,status) {
                if (status=="OK") {
                    if (results[0]) {
                        console.log("endaddress: "+results[0].formatted_address);
                        endaddress=results[0].formatted_address;
                        $("#input-lokasi").val(endaddress);
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
</script>
@endsection