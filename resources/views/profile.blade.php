@extends('layouts.app')
    @section('content')
        @section('content')
       <h1 class="page-header">Dashboard</h1>
            <ol class="breadcrumb">
              <li><a href="{{ url('/home') }}">Beranda</a></li>
              <li><a href="{{ url('/profile') }}">Profile</a></li>
            </ol>
            <hr>

        <!-- Normalisasi R -->
        <div class="panel panel-default">
            <div class="panel-heading head_panel_color">
                Profile
            </div>
            <div class="panel-body">
               <div class="main-form">
                    <div class="col-md-6">
                    <form action="" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }} col-md-12">
                            <div class="col-md-12">
                            <label for="nama" class="control-label">Nama</label>
                                <input  type="text" class="form-control" name="nama"  value="{{ Auth::user()->name }}" required >

                                @if ($errors->has('nama'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} col-md-12">
                            <div class="col-md-12">
                            <label for="email" class="control-label">email</label>
                                <input  type="email" class="form-control" name="email"  value="{{ Auth::user()->email }}" required >

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} col-md-12">
                            <div class="col-md-12">
                            <label for="password" class="control-label">password</label>
                                <input  type="password" class="form-control" name="password"   required >

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }} col-md-12">
                            <div class="col-md-12">
                            <label for="file" class="control-label">Status</label>
                                <input  type="file" class="form-control" name="photo"  required >

                                @if ($errors->has('file'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('file') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }} col-md-12">
                            <div class="col-md-12">
                            <input type="submit" value="Simpan" name="simpan" class="btn btn-primary">
                            </div>
                        </div>
                </form>
                </div>
                <div class="col-md-6">
                    <img src="/images/{{ Auth::user()->avatar }}" class="form-profile ">
                </div>
               </div>
            </div>
        </div>
        
    @endsection
