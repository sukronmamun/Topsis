<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		table{
			border:1px;
		}
	</style>
</head>
<body>
	
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
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no =1 ?>
                           @foreach($Alternatives as $data)
                               <tr>
                                   <td>{{ $no }}</td>
                                   <td>{{ $data->kodeKaryawan }}</td>
                                   <td>{{ $data->name }}</td>
                                   <td>{{ $data->jabatan }}</td>
                                   <td>{{ $data->alamat }}</td>
                                   <td>{{ $data->jk }}</td>
                                   <td>{{ $data->kontak }}</td>
                                   <td>{{ $data->status }}</td>
                               </tr>
                            <?php $no++ ?>
                           @endforeach

                        </tbody>
                    </table>

</body>
</html>