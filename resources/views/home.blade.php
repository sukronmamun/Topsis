@extends('layouts.app')
    @section('content')
       <h1 class="page-header">Dashboard</h1>
            <ol class="breadcrumb">
              <li><a href="{{ url('/home') }}">Beranda</a></li>
            </ol>
            <hr>

        <!-- Normalisasi R -->
        @if(Session::has('status'))
           <div class="alert alert-success {{ Session::has('flash-message-important') ? 'alert-important' :'' }}" role="alert">

           {{ Session::get('status')}}</div>
        @endif
        <div class="panel panel-default">
            <div class="panel-heading perjelas">
                Normalisasi R
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
                                    
                                    @foreach($nilaiR as $nilaix)
                                        <td>{{ $nilaix[$nidex] }}</td>
                                    @endforeach
                                    
                                </tr>
                                
                                <?php $no++;$nidex++ ?>
                                @endforeach                    
                                <tr class="head_panel_color">
                                    <td colspan="2">Type</td>
            
                                    @foreach($kriterias as $kriteria)
                                        <td>{{ $kriteria['type'] }}</td>
                                    @endforeach
            
                                </tr>
                                <tr class="head_panel_color">
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
        
        <!-- Normalisasi R -->
        <div class="panel panel-default">
            <div class="panel-heading perjelas">
                Graph Penilaian
            </div>
            <div class="panel-body">
                <div class="col-md-12">
                    
                    <div id="canvas-holder" style="width:75%">
                        <canvas id="chart-area"></canvas>
                    </div>
                </div>

                <?php $dataCrt = '';?>
                <?php $colors = '';?>
                @foreach($finals as $dataChart)
                    <?php   $dataCrt .= "\"".($dataChart*100)."\","; ?>  
                    <?php 
                        $rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
                        $color = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];
                        $colors .= "\"". $color ."\",";
                    ?>
                @endforeach
                <?php $datacolor = '['. $colors .']';?>
                <?php $dataCrtx = '['. $dataCrt .']';?>
                
                <?php $namaAl = '';?>
                @foreach($datas as $Anama)
                    <?php   $namaAl .= "\"".$Anama->name."\","; ?>  
               @endforeach
               <?php $dataCrtA = '['. $namaAl .']';?>
            
            </div>
        </div>

      

        <!-- Kedekatan Setiap Alternatif Terhadap Solusi Ideal Dihitung Sebagai Berikut -->
    
    @endsection

 <script>

    var config = {
        data: {
            datasets: [{
                data: <?php echo $dataCrtx ?>,
                backgroundColor: <?php echo $datacolor ?>,
                label: 'My dataset' // for legend
            }],
            labels: <?php echo $dataCrtA ?>, 
        },
        options: {
            responsive: true,
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'Chart.js Polar Area Chart'
            },
            scale: {
              ticks: {
                beginAtZero: true
              },
              reverse: false
            },
            animation: {
                animateRotate: false,
                animateScale: true
            }
        }
    };



    </script>