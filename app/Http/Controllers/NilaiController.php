<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Kriteria as Kriteria;
use App\Alternative as Alternative;
use App\NilaiKriteria as NilaiKriteria;

class NilaiController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){

        $this->middleware('auth');
    }
    
    public function index(){

    	$NilaiKriteria = NilaiKriteria::All();
	    echo	$NilaiKriteria->alternative->name;
    	

    	/*$CountKriteria = count(Kriteria::all());
    	$Kriterias = Kriteria::all();
    	$no = 1;
    	return view( 'nilaiInput', ['no'=>$no,'Alternatives' => $Alternatives,'CountKriteria'=>$CountKriteria,'Kriterias'=>$Kriterias] );
		*/
    }
    
    public function bobot(){
    	$bobots = Kriteria::all();
    	return view('bobot',['bobots'=>$bobots]);
    }
    
    public function inputNilai(){
    	

    	echo "<table border='1'>";
    	echo "
			<tr>
				<td rowspan='2'>Alternative</td>
				<td colspan='",$CountKriteria,"'>Kriteria</td>
			</tr>
			";

			echo "<tr>";
			foreach ($Kriterias as $Kriteria) {
				echo "<td>",$Kriteria->name,"</td>";
	    	}

	    	echo "</tr>";
	    		
	    	foreach ($Alternatives as $Alternative) {
	    		echo "<tr><td>",$Alternative->name,"</td>";
	    		echo "</tr>";
	    	}

    	echo "</table>";

    }
}
