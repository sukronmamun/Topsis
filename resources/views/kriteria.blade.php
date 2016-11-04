@extends('layouts.app')
@section('content')
<h1 class="page-header">Dashboard</h1>
            <ol class="breadcrumb">
              <li><a href="{{ url('/home') }}">Beranda</a></li>
              <li><a href="#">Master Data</a></li>
              <li><a href="{{ url('/kriteria') }}">Kriteria Dan Bobot</a></li>
            </ol>
            <hr>


<div class="col-md-10 col-md-offset-1">
<div class="panel panel-default">
	<div class="panel-heading perjelas ">
		Kriteria
		
		<button class="btn btn-sm color-primary addKriteria right">
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
							<td>Nama Kriteria</td>
							<td>Bobot</td>
							<td>Type</td>
							<td colspan="3">Aksi</td>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; ?>
						@foreach($data as $d)
						<tr>
							<td>{{$no}}</td>
							<td>{{ $d->name }}</td>
							<td>{{ $d->bobot }}</td>
							<td>{{ $d->type }}</td>
							<td colspan="2">

								<button class="btn btn-sm btn-success updateKriteria" data-id="{{ $d->id }}" data-name="{{ $d->name }}">
								<i class="icon-edit"></i> Ubah
								</button>
								
								<a href="{{ url('/resetBobot/') }}/{{ $d->id }}" class="btn btn-sm btn-warning">
									<i class="icon-refresh"></i> Reset Bobot
								</a>

								<a href="{{ url('/kriteriaDelete/') }}/{{ $d->id }}" class="btn btn-sm btn-danger">
									<i class="icon-trash"></i> Hapus
								</a>

							</td>
						</tr>
						<?php $no++ ?>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
				
	</div>
</div>
</div>







<!-- ============================Create=======================================================  -->
<div class="modal fade" id="myAddKriteria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<form form class="form-horizontal" role="form" method="POST" action="{{ url('/kriteria') }}">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title" id="myModalLabel">Kriteria</h4>
				</div>
				<div class="modal-body">
					{{ csrf_field() }}
					
					<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
						<label for="name" class="col-md-4 control-label">Name</label>
						<div class="col-md-6">
							<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
							@if ($errors->has('name'))
							<span class="help-block">
								<strong>{{ $errors->first('name') }}</strong>
							</span>
							@endif
						</div>
					</div>
					<div class="form-group{{ $errors->has('bobot') ? ' has-error' : '' }}">
						<label for="bobot" class="col-md-4 control-label">Bobot</label>
						<div class="col-md-6">
							<input id="name" type="text" class="form-control" name="bobot" value="{{ old('bobot') }}" required autofocus>
							@if ($errors->has('bobot'))
							<span class="help-block">
								<strong>{{ $errors->first('bobot') }}</strong>
							</span>
							@endif
						</div>
					</div>
					<div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
						<label for="type" class="col-md-4 control-label">Type</label>
						<div class="col-md-6">
							<select name="type" class="form-control" required>
								<option value="">--Type--</option>
								<option value="benefit">Benefit</option>
								<option value="cost">Cost</option>
							</select>
							@if ($errors->has('type'))
							<span class="help-block">
								<strong>{{ $errors->first('type') }}</strong>
							</span>
							@endif
						</div>
					</div>
					
					
				</div>
				<div class="modal-footer">
					<div class="form-group">
						<div class="col-md-6 col-md-offset-4">
							<button type="submit" class="btn btn-primary">
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
<div class="modal fade" id="updateKriteria" tabindex="-1" role="dialog" aria-labelledby="myUpdate" aria-hidden="true">
	<form form class="form-horizontal" role="form" method="POST" action="{{ url('/kriteriaUpdate') }}">
		{{ csrf_field() }}
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title" id="myModalLabel">Kriteria</h4>
				</div>
				<div class="modal-body" id="modal-body">
					{{ csrf_field() }}
					<input type="hidden" name="idKriteria" id="id">
					<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
						<label for="name" class="col-md-4 control-label">Name</label>
						<div class="col-md-6">
							<input id="nameKriteria" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
							@if ($errors->has('name'))
							<span class="help-block">
								<strong>{{ $errors->first('name') }}</strong>
							</span>
							@endif
						</div>
					</div>
					
					<div class="form-group{{ $errors->has('bobot') ? ' has-error' : '' }}">
						<label for="bobot" class="col-md-4 control-label">Bobot</label>
						<div class="col-md-6">
							<input id="bobotKriteria" type="text" class="form-control" name="bobot" value="{{ old('bobot') }}" required autofocus>
							@if ($errors->has('bobot'))
							<span class="help-block">
								<strong>{{ $errors->first('bobot') }}</strong>
							</span>
							@endif
						</div>
					</div>
					<div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
						<label for="type" class="col-md-4 control-label">Type</label>
						<div class="col-md-6">
							<select name="type" class="form-control" required>
								<option value="">--Type--</option>
								<option value="benefit">Benefit</option>
								<option value="cost">Cost</option>
							</select>
							@if ($errors->has('type'))
							<span class="help-block">
								<strong>{{ $errors->first('type') }}</strong>
							</span>
							@endif
						</div>
					</div>
					
				</div>
				<div class="modal-footer">
					<div class="form-group">
						<div class="col-md-6 col-md-offset-4">
							<button type="submit" class="btn btn-primary">
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
@endsection