@extends('layout.vendor')
@section('title','Kelola Iklan')
@section('content')
<div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Hunian</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
          <table class="table table-striped">
            <tbody><tr>
              <th style="width: 10px">#</th>
              <th>Nama Hunian</th>
              <th>Kategori</th>
              <th>Tipe Iklan</th>
              <th>Status Iklan</th>
              <th>Aksi</th>
            </tr>
            <?php $i=0; ?>
            @foreach ($properti as $p)
            <?php $i++?>
            <tr>
                <td>{{$i}}</td>
                <td>{{$p->properti}}</td>
                <td>{{$p->kat}}</td>
                <td>{{$p->status}}</td>
                <td>
                    @if ($p->aktif=="aktif")                        
                    <label class="switch">
                        <input id="status" onchange="swix('{{$p->id_properti}}')" checked type="checkbox">
                        <span class="slider"></span>
                    </label>
                    @else
                    <label class="switch">
                        <input id="status" onchange="swix('{{$p->id_properti}}')" type="checkbox">
                        <span class="slider"></span>
                    </label>
                    @endif
                </td>
                <td><a href="/vendor/iklan/edit/{{$p->id_properti}}" class="fa fa-pencil"> Edit</a> </td>
            </tr> 
            @endforeach
          </tbody></table>
        </div>
        <!-- /.box-body -->
      </div>
@endsection
@section('footer')
    <script>
        function swix(id){
            if ($("#status").is(":checked")) {
               console.log("on:"+id);
               set(id,'aktif')
            }else{
               console.log("off:"+id);
               set(id,'nonaktif')
            }
        }
        
        function set(id,status){
            $.ajax({
            type: "POST",
            url: "/api/update/hunian/status",
            data: {
                _token:"{{csrf_token()}}",
                aktif:status,
                id:id
            },
            dataType: "JSON",
            success: function (response) {
                toast(response,"success")
            },
            error:function(){
                toast("Maaf, terjadi kesalahan","error")
            }
        });
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
    </script>
@endsection