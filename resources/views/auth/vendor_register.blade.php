@extends('layout.auth')
@section('title',"Register penyedia hunian")
@section('content')
<style>
    label {
        font-weight: 700;
        color: black
    }
    </style>
<div class="container">
    <div class="row">
        <div style="margin-top:30px" class="col-md-8 col-md-offset-2">
            <div style="background-color: #ffffffa8" class="panel panel-default">
                <div class="panel-heading"><h4>Daftar Penyedia Hunian</h4></div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nama</label>

                            <div class="col-md-6">
                                <input placeholder="Masukkan nama" id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nohp') ? ' has-error' : '' }}">
                            <label for="nohp" class="col-md-4 control-label">Telp/No HP</label>

                            <div class="col-md-6">
                                <input placeholder="contoh: 6289219301xxx" id="nohp" type="text" class="form-control" name="nohp" value="{{ old('nohp') }}" required >

                                @if ($errors->has('nohp'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nohp') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                <input placeholder="Masukkan email" id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
                            <label for="alamat" class="col-md-4 control-label">Alamat</label>

                            <div class="col-md-6">
                                <textarea placeholder="Masukkan alamat" class="form-control" name="alamat" id="alamat" cols="30" rows="10" required minlength="10">{{old('alamat')}}</textarea>
                                @if ($errors->has('alamat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('alamat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input placeholder="Masukkan password" id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Ulangi Password</label>

                            <div class="col-md-6">
                                <input placeholder="Masukkan password lagi" id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-danger">
                                    Daftar
                                </button>
                            </div>
                        </div>
                        
                        <div class="registration">
                            Sudah memiliki akun ?<br/>
                            <a style="margin-top:20px" href="/login"><button class="btn btn-facebook"  type="button"><i class="fa fa-user"></i> Login</button></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
