@extends('layouts.app')
    @section('content')
        <h1 class="page-header">Dashboard</h1>
            <ol class="breadcrumb">
              <li><a href="{{ url('/home') }}">Beranda</a></li>
              <li><a href="#">Analisa Data </a></li>
              <li><a href="{{ url('/perhitungan') }}">Analisa</a></li>
            </ol>
            <hr>


        <!-- Normalisasi R -->
        <div class="panel panel-default">
            <div class="panel-heading perjelas ">
                Normalisasi R
            </div>
            <div class="panel-body">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr class=" head_panel_color">
                                    <td>No</td>
                                    <td>Nama Alternative</td>
                                
                                    @foreach($kriterias as $kriteria)
                                        <td>{{ $kriteria['name'] }}</td>
                                    @endforeach
                                
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php $no =1;$nidex = 0 ?>
                                @foreach($datas as $data)
                                
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $data['name'] }}</td>
                                    
                                    @foreach($nilaiR as $nilaix)
                                        <td>{{ $nilaix[$nidex] }}</td>
                                    @endforeach
                                    
                                </tr>
                                
                                <?php $no++;$nidex++ ?>
                                @endforeach                    
                                <tr class=" head_panel_color">
                                    <td colspan="2">Type</td>
            
                                    @foreach($kriterias as $kriteria)
                                        <td>{{ $kriteria['type'] }}</td>
                                    @endforeach
            
                                </tr>
                                <tr class=" head_panel_color">
                                    <td colspan="2">Bobot</td>
            
                                    @foreach($kriterias as $kriteria)
                                        <td>{{ $kriteria['bobot'] }}</td>
                                    @endforeach
            
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        

        <!-- Matrik Ternormalisasi Terbobot, Y -->
        <div class="panel panel-default">
            <div class="panel-heading perjelas">
                Matrik Ternormalisasi Terbobot, Y
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
                                        <td>{{ $kriteria['name'] }}</td>
                                    @endforeach
                        
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no =1;$nidex = 0 ?>
                                @foreach($datas as $data)
                        
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $data['name'] }}</td>
                                    
                                    @foreach($matrixs as $matrix)
                                        <td>{{ $matrix[$nidex] }}</td>
                                    @endforeach
                                    
                                </tr>
                        
                                <?php $no++;$nidex++ ?>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        

        <!-- Solusi Ideal Positif dan Negatif -->
        <div class="panel panel-default">
            <div class="panel-heading perjelas">
                Solusi Ideal Positif dan Negatif
            </div>
            <div class="panel-body">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tbody>
                                
                                @for($c = 0; $c < 1; $c++)
                                <tr>
                                    <td colspan="2">A+</td>
                                    
                                    @foreach($maxs as $max)
                                        <td>{{ $max[0] }}</td>
                                    @endforeach
                                    
                                </tr>
                                
                                @endfor
                                @for($v = 0; $v < 1; $v++)
                                <tr>
                                    <td colspan="2">A-</td>
                                    
                                    @foreach($mins as $min)
                                        <td>{{ $min[0] }}</td>
                                    @endforeach
                                    
                                </tr>
                                
                                @endfor
        
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
        </div>
        

        <!-- Jarak antara nilai terbobot setiap alternatif terhadap solusi ideal negatif, Si+ -->
        <div class="panel panel-default">
            <div class="panel-heading perjelas">
                Jarak antara nilai terbobot setiap alternatif terhadap solusi ideal negatif, Si+
            </div>
            <div class="panel-body">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            
                            @for($c = 0; $c < 1; $c++)
                            <tr>
                                @foreach($spositifs as $spositif)
                                <td>{{ $spositif }}</td>
                                @endforeach
                                
                            </tr>
                            
                            @endfor
                            
                        </table>
                    </div>
                </div>
                
            </div>
        </div>

        
        <!-- Jarak antara nilai terbobot setiap alternatif terhadap solusi ideal negatif, Si- -->
        <div class="panel panel-default">
            <div class="panel-heading perjelas">
                Jarak antara nilai terbobot setiap alternatif terhadap solusi ideal negatif, Si-
            </div>
            <div class="panel-body">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            
                            @for($v = 0; $v < 1; $v++)
                            <tr>
                                @foreach($snegatives as $snegative)
                                <td>{{ $snegative }}</td>
                                @endforeach
                                
                            </tr>
                            
                            @endfor
                        
                        </table>
                    </div>
                </div>
                
            </div>
        </div>
        

        <!-- Kedekatan Setiap Alternatif Terhadap Solusi Ideal Dihitung Sebagai Berikut -->
        <div class="panel panel-default">
            <div class="panel-heading perjelas">
                Kedekatan Setiap Alternatif Terhadap Solusi Ideal Dihitung Sebagai Berikut
            </div>
            <div class="panel-body">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped">
                                                    
                            @for($v = 0; $v < 1; $v++)
                            <tr>
                                @foreach($finals as $final)
                                <td>{{ $final }}</td>
                                @endforeach
                                
                            </tr>
                            
                            @endfor
                        
                        </table>
                    </div>
                </div>
                
            </div>
        </div>
    
    @endsection
