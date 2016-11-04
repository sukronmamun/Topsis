@extends('layouts.app')
    @section('content')
       <h1 class="page-header">Dashboard</h1>
            <ol class="breadcrumb">
              <li><a href="{{ url('/home') }}">Beranda</a></li>
              <li><a href="#">Master Data</a></li>
              <li><a href="{{ url('/matrix') }}">Matrix</a></li>
            </ol>
            <hr>

        <!-- Normalisasi R -->
        <div class="panel panel-default">
            <div class="panel-heading perjelas">
                Tabel Matrix
            </div>
            <div class="panel-body">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr class="head_panel_color">
                                    <td>No</td>
                                    <td>Nama Alternative</td>
                                
                                    @foreach($kriterias as $kriteria)
                                        <td>{{ $kriteria->name }}</td>
                                    @endforeach
                                    <!-- <td colspan="2">Aksi</td> -->
                                
                                </tr>
                            </thead>
                            <tbody>
                                
                                 <?php $no =1 ?>
                           @foreach($datas as $data)
                               <tr>
                                   <td>{{ $no }}</td>
                                   <td>{{ $data->name }}</td>
                                        @foreach($nilais as $nilai)
                                            @if($nilai->alternative_id == $data->id)
                                                <td>{{ $nilai->nilai }}</td>
                                            @endif
                                        @endforeach
                                  <!-- <td colspan="2">
                                    <button class="btn btn-sm btn-warning updateAlternative"  title="ubah" data-id="{{ $data->id }}" 
                                  > <i class="icon-edit"></i></span>
                                  </button> 
                                  <a href="{{ url('/alternativeDelete/') }}/{{ $data->id }}" title="hapus"  class="btn btn-sm btn-danger">
                                      <i class="icon-trash"></i></span>
                                  </a></td> 
                               </tr>-->
                            <?php $no++ ?>
                           @endforeach

                                <tr class="head_panel_color">
                                    <td colspan="2">Type</td>
            
                                    @foreach($kriterias as $kriteria)
                                        <td>{{ $kriteria->type }}</td>
                                    @endforeach
                                     {{-- <td colspan="2"></td> --}}
            
                                </tr>
                                <tr class="head_panel_color">
                                    <td colspan="2">Bobot</td>
            
                                    @foreach($kriterias as $kriteria)
                                        <td>{{ $kriteria->bobot }}</td>
                                    @endforeach
                                     {{-- <td colspan="2"></td> --}}
            
                                </tr>
                              
                             
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
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Isi Identitas</h4>
                </div>
                <div class="modal-body" id="modal-body">
                    <input type="hidden" name="alternative" >
                    
                    <div class="form-group{{ $errors->has('nameAlternative') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Name</label>
                        
                        <div class="col-md-6">
                            <input id="nameAlternative" type="text" class="form-control" name="nameAlternative"  required >

                            @if ($errors->has('nameAlternative'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nameAlternative') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    @foreach($kriterias as $kriteriaU)
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">{{ $kriteriaU->name }}</label>
                            
                            <div class="col-md-6">
                                <input id="nameAlternative" type="text" class="form-control" name="{{ $kriteriaU->id }}"  required >

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    @endforeach

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
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">Isi Identitas</h4>
                    </div>
                    <div class="modal-body" id="modal-body">
                        
                        <input type="hidden" name="id" id="id">
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

                        @foreach($kriterias as $kriteriaUn)
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
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