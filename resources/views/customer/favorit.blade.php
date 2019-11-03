@extends('layout.customer')
@section('title','Penyewaan Favoritku')
@section('content')
    <!-- My Propertiess start -->
    <div class="content-area-7 my-properties">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <!-- User account box start -->
                    <div class="user-account-box">
                        <div class="header clearfix">
                            <div class="edit-profile-photo">
                                <?php
                                    $photo;
                                    if(auth()->user()->img[0]=="/"||auth()->user()->img[0]=="h"){
                                        $photo=auth()->user()->img;
                                    }else{
                                        $photo="/".auth()->user()->img;
                                    }
                                ?>
                                <img src="{{$photo}}" alt="agent-1" class="img-responsive">
                            </div>
                            <h3>{{$me->name}}</h3>
                            <p>{{$me->email}}</p>
    
                            <ul class="social-list clearfix">
                                <li>
                                    <a href="#" class="{{$me->provider}}">
                                        Login dari <i class="fa fa-{{$me->provider}}"></i>
                                    </a>
                                </li>
                            </ul>
    
                        </div>
                    </div>
                    <!-- User account box end -->
                </div>
                
                <div class="col-lg-8 col-md-8 col-sm-12">
                    <div class="main-title-2">
                        <h1><span>Penyewaan</span> yang disimpan</h1>
                    </div>
                    <!-- table start -->
                    <table class="manage-table responsive-table">
                        <tbody>
                            @foreach ($favorits as $favorit)
                            <tr id="{{$favorit->id_iklan}}">
                                <td class="title-container">
                                    <img src="/{{$favorit->link}}" alt="{{'Gambar '.$favorit->properti}}" class="img-responsive hidden-xs">
                                    <div class="title">
                                        <h4><a href="#">{{$favorit->properti}}</a></h4>
                                        <span><i class="fa fa-map-marker"></i> {{$favorit->alamat}} </span>
                                        <span class="table-property-price">{{$favorit->harga}}</span>
                                    </div>
                                </td>
                                <td class="expire-date hidden-xs">{{$favorit->kategori}}</td>
                                <td class="action">
                                    <a href="/detail/properti/{{$favorit->id_iklan}}"><i class="fa fa-eye"></i> Lihat</a>
                                    <a href="#delete"  onclick="delete_iklan('{{$favorit->id_iklan}}')" class="delete"><i class="fa fa-remove"></i> Hapus</a>
                                </td>
                            </tr>
                            @endforeach
                            @if ($favorits->count()<1)
                                <div class="alert alert-info wow fadeInRight delay-03s" role="alert" style="visibility: visible; animation-name: fadeInRight;">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <strong>Kamu belum ada menyimpan iklan ke daftar favoritmu</strong> 
                                </div>
                            @endif
                        </tbody>
                    </table>
                    <!-- table end -->
                </div>
            </div>
        </div>
    </div>
    <!-- My Propertiess end -->
@endsection
<script>
function delete_iklan(id) {
            $.ajax({
                type: "POST",
                url: "/api/delete/favorit",
                data: {
                    _token:"{{csrf_token()}}",
                    id:id
                },
                dataType: "JSON",
                success: function (response) {

                    $("#"+id).remove();
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
                }
            });            
        }
</script>
@section('footer')
    <script>
        
    </script>
@endsection