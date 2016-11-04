@extends('layouts.app')

@section('content')

    
            <div class="panel panel-default">
                <div class="panel-heading">
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
                            <tr>
                                <td>No</td>
                                <td>Bobot</td>
                                <td colspan="2">Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bobots as $bobot)
                                <tr>
                                    <td>1</td>
                                    <td>{{ $bobot->bobot }}</td>
                                    <td colspan="2">
                                    <button class="btn btn-sm btn-warning updateAlternative" data-id="{{ $bobot->id }}" 
                                    > <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Ubah
                                    </button> 
                                    <a href="{{ url('/bobotDelete/') }}/{{ $bobot->id }}" class="btn btn-sm btn-danger">
                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Hapus
                                    </a></td>
                                </tr>

                            @endforeach
                        </tbody>
                    </table>
                    </div>
                  </div>
                  
                </div>
            </div>
 
@endsection
