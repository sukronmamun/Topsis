@extends('layouts.app')

@section('content')

          <h1 class="page-header">Dashboard</h1>
            <ol class="breadcrumb">
              <li><a href="{{ url('/home') }}">Beranda</a></li>
              <li><a href="#">Master Data</a></li>
              <li><a href="{{ url('/alternative') }}">Alternative</a></li>
            </ol>
            <hr>
            <div class="panel panel-default">
                <div class="panel-heading perjelas">
                Alternative
                  
                    <button class="btn btn-sm color-primary addAlternative right">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah
                    </button>
                    
                  
                </div>
                <div class="panel-body">


                  

                  <div class="col-md-12">
                   <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                            <tr class="head_panel_color">
                                <td>No</td>
                                <td>Kode Karyawan</td>
                                <td>Nama</td>
                                <td>Jabatan</td>
                                <td>Alamat</td>
                                <td>Jenis Kelamin</td>
                                <td>Kontak</td>
                                <td>Status</td>
                    
                               
                                
                                <td colspan="2">Aksi</td>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $no =1 ?>
                           @foreach($datas as $data)
                               <tr>
                                   <td>{{ $no }}</td>
                                   <td>{{ $data->kodeKaryawan }}</td>
                                   <td>{{ $data->name }}</td>
                                   <td>{{ $data->jabatan }}</td>
                                   <td>{{ $data->alamat }}</td>
                                   <td>{{ $data->jk }}</td>
                                   <td>{{ $data->kontak }}</td>
                                   <td>{{ $data->status }}</td>                                    
                                   <td colspan="2">
                                   <button class="btn btn-sm btn-warning updateAlternative" title="Ubah" data-id="{{ $data->id }}" 
                                   > <i class="icon-edit"></i>
                                   </button> 

                                   <a href="{{ url('/alternativeDelete/') }}/{{ $data->id }}" title="Hapus" class="btn btn-sm btn-danger">
                                       <i class="icon-trash"></i>
                                   </a></td>
                               </tr>
                            <?php $no++ ?>
                           @endforeach

                        </tbody>
                    </table>
                    </div>
                  </div>
                  
                </div>
            </div>
@endsection


<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myAdd" aria-hidden="true">
    <form form class="form-horizontal" role="form" method="POST" action="{{ url('/alternativeAdd') }}">
     {{ csrf_field() }}
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Isi Identitas dan Data Kriteria Alternative</h4>
                </div>
                <div class="modal-body" id="modal-body">
                    <input type="hidden" name="alternative" >
                    
                    
                   <div class="row">
                   <div class="col-md-6">
                   <h2 class="page-header">Profile</h2>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="kodeKaryawan" class="col-md-4 control-label">Kode Karyawan</label>
                            
                            <div class="col-md-6">
                                <input  type="text" class="form-control" name="kodeKaryawan"  required >

                                @if ($errors->has('kodeKaryawan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kodeKaryawan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>
                            
                            <div class="col-md-6">
                                <input  type="text" class="form-control" name="nameAlternative"  required >

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>   
                        <div class="form-group{{ $errors->has('jabatan') ? ' has-error' : '' }}">
                            <label for="jabatan" class="col-md-4 control-label">Jabatan</label>
                            
                            <div class="col-md-6">
                                <input  type="text" class="form-control" name="abatan"  required >

                                @if ($errors->has('jabatan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jabatan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
                            <label for="alamat" class="col-md-4 control-label">Alamat</label>
                            
                            <div class="col-md-6">
                            <textarea name="alamat" required class="form-control"  cols="20" rows="2"></textarea>

                                @if ($errors->has('alamat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('alamat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('jk') ? ' has-error' : '' }}">
                            <label for="jk" class="col-md-4 control-label">Jenis Kelamin</label>
                            
                            <div class="col-md-6">
                                <input  type="text" class="form-control" name="jk"  required >

                                @if ($errors->has('jk'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jk') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('kontak') ? ' has-error' : '' }}">
                            <label for="kontak" class="col-md-4 control-label">Kontak</label>
                            
                            <div class="col-md-6">
                                <input  type="text" class="form-control" name="kontak"  required >

                                @if ($errors->has('kontak'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kontak') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            <label for="status" class="col-md-4 control-label">Status</label>
                            
                            <div class="col-md-6">
                                <input  type="text" class="form-control" name="status"  required >

                                @if ($errors->has('status'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                   </div>
                   <div class="col-md-6">
                   <h2 class="page-header">Data kriteria</h2>
                    @foreach($kriterias as $kriteriaU)
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} col-md-6">
                            <label for="name" class="col-md-4 control-label">{{ $kriteriaU['name'] }}</label>
                            
                            <div class="col-md-6">
                                <input id="nameAlternative" type="text" class="form-control" name="{{ $kriteriaU['id'] }}"  required >

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    @endforeach
                   </div>
    
                   </div>

                </div>
                <div class="modal-footer">
                    <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn color-primary">
                                    Simpan
                                </button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </form>
</div>


    <!-- ============================Update=======================================================  -->
        

        <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="myUpdate" aria-hidden="true">
            <form form class="form-horizontal" role="form" method="POST" action="{{ url('/alternativeUpdate') }}">
                        {{ csrf_field() }}
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">Identitas dan Data Kriteria Alternative</h4>
                    </div>
                    <div class="modal-body" id="modal-body">
                        <input type="hidden" name="id" id="id">
                        <div class="row">
                   <div class="col-md-6">
                   <h2 class="page-header">Profile</h2>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="kodeKaryawan" class="col-md-4 control-label">Kode Karyawan</label>
                            
                            <div class="col-md-6">
                                <input id="kodeKaryawan" type="text" class="form-control" name="kodeKaryawan"  required >

                                @if ($errors->has('kodeKaryawan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kodeKaryawan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>
                            
                            <div class="col-md-6">
                                <input id="nameUpdate" type="text" class="form-control" name="name"  required >

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>   
                        <div class="form-group{{ $errors->has('jabatan') ? ' has-error' : '' }}">
                            <label for="jabatan" class="col-md-4 control-label">Jabatan</label>
                            
                            <div class="col-md-6">
                                <input id="jabatan" type="text" class="form-control" name="jabatan"  required >

                                @if ($errors->has('jabatan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jabatan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
                            <label for="alamat" class="col-md-4 control-label">Alamat</label>
                            
                            <div class="col-md-6">
                            <textarea name="alamat" required class="form-control" id="alamat" cols="20" rows="2"></textarea>


                                @if ($errors->has('alamat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('alamat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('jk') ? ' has-error' : '' }}">
                            <label for="jk" class="col-md-4 control-label">Jenis Kelamin</label>
                            
                            <div class="col-md-6">
                                <input id="jk" type="text" class="form-control" name="jk"  required >

                                @if ($errors->has('jk'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jk') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('kontak') ? ' has-error' : '' }}">
                            <label for="kontak" class="col-md-4 control-label">Kontak</label>
                            
                            <div class="col-md-6">
                                <input id="kontak" type="text" class="form-control" name="kontak"  required >

                                @if ($errors->has('kontak'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kontak') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            <label for="status" class="col-md-4 control-label">Status</label>
                            
                            <div class="col-md-6">
                                <input id="status" type="text" class="form-control" name="status"  required >

                                @if ($errors->has('status'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                   </div>
                   <div class="col-md-6">
                   <h2 class="page-header">Data kriteria</h2>
                    @foreach($kriterias as $kriteriaUn)
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} col-md-6">
                            <label for="" class="col-md-4 control-label">{{ $kriteriaUn['name'] }}</label>
                            
                            <div class="col-md-6">
                                <input  type="text" class="form-control {{ $kriteriaUn['id'] }}" name="{{ $kriteriaUn['id'] }}" value=""  required >

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    @endforeach
                   </div>
    
                   </div>
                 </div>
                    <div class="modal-footer">
                        <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn color-primary">
                                        Simpan
                                    </button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            </form>
        </div>