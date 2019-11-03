@extends('layout.customer')
@section('title','Bukasewa Partnership')
@section('content')
<div class="container">
    <div class="row">
        <br>
        <center>
        <div style="max-width:600px">
          @if (empty($message))
            <div class="col-lg-12 col-xs-12">
                <div class="notification-box">
                    <h3>Ingin bergabung menjadi agen bukasewa?</h3>
                    <p>Visi kami yaitu menjadi penyewaan utama di Indonesia, selain mempermudah masyarakat dalam penyewaan, bukasewa memiliki tujuan untuk membuka lapangan pekerjaan bagi teman-teman yang ingin bergabung menjadi divisi surveyor bukasewa.</p>
                    <p>Ayo daftar sekarang!</p>
                </div>
                <div class="submit-address">
                    <form action="/join/surveyor/save" method="POST">
                        <div class="main-title-2">
                            <h1><span>Formulir Datadiri</span></h1>
                        </div>
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="search-contents-sidebar mb-30">
                            <div class="form-group">
                                <label>Nama Lengkap Kamu</label>
                                <input required type="text" class="input-text" name="name" placeholder="Nama Kamu">
                            </div>
                            <div class="form-group">
                                <label>Alamat </label>
                                <input required type="text" class="input-text" name="address" placeholder="Alamat lengkap">
                            </div>
                            <div class="form-group">
                                @if (!empty($error))
                                    <div class="alert alert-danger wow fadeInRight delay-03s" role="alert" style="visibility: visible; animation-name: fadeInRight;">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        <strong>{{Session::get('error-message')}}</strong> {{Session::get('message-tiny')}}
                                    </div>
                                @endif
                                <label>Email </label>
                                <input required type="text" class="input-text" name="email" placeholder="wira@xxx.com">
                            </div>
                            <div class="form-group">
                                <label>Telp </label>
                                <input required type="text" class="input-text" name="telp" placeholder="6289xxxxxxxx">
                            </div>
                            <div class="form-group">
                                <label> Umur</label>
                                <input required type="number" class="input-text" name="umur" placeholder="Mis. 21">
                            </div>
                            <div class="form-group">
                                <label> Pendidikan Terakhir</label>
                                <select name="pendidikan" required style="max-width:120px"  class="form-control" name="" id="">
                                    <option value="sd">SD</option>
                                    <option value="smp">SMP</option>
                                    <option value="sma">SMA</option>
                                    <option value="s1">S1</option>
                                    <option value="etc">Lainnya</option>
                                </select>
                            </div>
                            <img style="display: none;width:200px;margin-bottom:20px" src="" id="temp_img" alt="gambarku">
                            <div onclick="bukaktp()" required class="dropzone dropzone-design mb-50">
                                <div class="dz-default dz-message"><span>Upload Photo selfie dengan KTP
                                </span>
                                </div>
                            </div>
                            <input style="display:none" id="photo_ktp" type="file" name="photo_ktpz">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-archive"></i> Daftar Sekarang!</button>
                        </div>
                    </form>
                </div>
            </div>
          @else
            <div class="col-lg 12 col-xs-12">
                <div style="background-color: #b9ffc8" class="notification-box notification-success">
                    <h3>{{Session::get('message')}}</h3>
                    <p>{{Session::get('message-tiny')}}</p>
                    <center>
                        <a href="/"><button class="btn btn-primary"><span class="fa fa-backward"></span> Kembali</button></a>
                    </center>
                </div>
            </div>
          @endif
        </div>
        </center>
    </div>
</div>
@endsection
@section('footer')
    <script src="/js/app.js"></script>
    <script>
        function bukaktp() {
           $("#photo_ktp").click(); 
        }

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                $('#temp_img').attr('src', e.target.result);
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#photo_ktp").change(function() {
            readURL(this);
            $("#temp_img").show();
        });
    </script>
@endsection