@extends('layout.auth')
@section('title',"Login penyedia hunian")
@section('content')
<div style="background: #ffffffb8" class="form-login">
        <div style="text-align: center" class="form-login-heading">
            <img style="width:200px;margin-top:10px" src="/img/resize.png" alt="logo">
        </div>
        <div class="login-wrap">
            <form method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input placeholder="Email" id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                <br>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <input placeholder="Password" id="password" type="password" class="form-control" name="password" required>
                @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                @endif
                <label class="checkbox">
                    {{-- <span class="pull-right">
                        <a data-toggle="modal" href="login.html#myModal"> Lupa Password ?</a>
    
                    </span> --}}
                    <input style="margin-left:70px" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Ingat saya

                </label>
                <button style="background-color: #d20023;border-color: #d20023;" class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> Masuk</button>
                <hr>
            </form>
            <div class="registration">
                Belum memiliki akun ?<br/>
                <a style="margin-top:20px" href="/register"><button class="btn btn-facebook"  type="button"><i class="fa fa-user"></i> Buat akun dan daftarkan hunian</button></a>
            </div>

        </div>


          <!-- Modal forget-->
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title">Lupa password ?</h4>
                      </div>
                      <div class="modal-body">
                          <p>Masukkan emailmu dan kami akan memberitahu password akunmu</p>
                          <input type="text" name="cemail" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

                      </div>
                      <div class="modal-footer">
                          <button data-dismiss="modal" class="btn btn-default" type="button">Batal</button>
                          <button class="btn btn-theme" type="button">Minta</button>
                      </div>
                  </div>
              </div>
          </div>
          <!-- modal -->

      </div>	
@endsection
