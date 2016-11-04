@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">

                  <div class="col-md-12 ">
                  	<h2>Data Sementara</h2>
                  </div>
				
                  <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <td rowspan="2">No</td>
                                <td rowspan="2">Nama Alternative</td>
                                <td colspan="{{ $CountKriteria }}">Kriteria</td>
                                <td rowspan="2">action</td>
                            </tr>
                            


                            <tr>
                            	@foreach($Kriterias as $kriteria)
									<td>{{ $kriteria->name }}</td>
                            	@endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($Alternatives as $Alternative)
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $Alternative->name }}</td>
									
									@foreach($Kriterias as $kriteria)
										<td>{{ $kriteria->bobot }}</td>
                            		@endforeach
                                    
                                    <td colspan="2"><button class="btn btn-warning updateAlternative" data-id="{{ $Alternative->id }}" 
                                    >Ubah</button> <a href="{{ url('/alternativeDelete/') }}/{{ $Alternative->id }}" class="btn btn-danger">Hapus</a></td>
                                </tr>
                                
								<?php $no++ ?>
                            @endforeach

             
                                <tr>
                                    <td colspan="2">Bobot</td>
                                    @foreach($Kriterias as $kriteria)
										<td>{{ $kriteria->bobot }}</td>
                            		@endforeach
                                    <td colspan="2"></td>
                                </tr>

             
                        </tbody>
                    </table>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection