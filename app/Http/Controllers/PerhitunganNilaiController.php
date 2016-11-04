<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Kriteria as Kriteria;
use App\Alternative as Alternative;
use App\NilaiKriteria as NilaiKriteria;
class PerhitunganNilaiController extends Controller
{
public function __construct(){
$this->middleware('auth');
}


public function normalisasiR(){

		$keriterias = Kriteria::all();
		$totalKriteria = count(Kriteria::all());
		$totalAlternative = count(Alternative::all());
		
		foreach ($keriterias as $keriteria) {
			$y[$keriteria->id] = array();
			$xx = 0;

			foreach ($keriteria->NilaiKriteria as $nilai) {
				$xx +=  ($nilai->nilai * $nilai->nilai);
			}

			$totalrR = sqrt($xx);
			array_push($y[$keriteria->id],round($totalrR,2));


		}

		foreach ($keriterias as $keriteriax) {
			$x[$keriteriax->id] = array();

			foreach ($keriteriax->NilaiKriteria as $nilaix) {
				array_push( $x[$keriteriax->id], round(($nilaix->nilai / $y[$keriteriax->id][0]) ,2 ,PHP_ROUND_HALF_UP) );
			}

		}

		foreach ($keriterias as $keriteriax) {
			$matrix[$keriteriax->id] = array();

			for ($m=0; $m < count($x[$keriteriax->id]) ; $m++) {
				array_push($matrix[$keriteriax->id], round(( $keriteriax->bobot * $x[$keriteriax->id][$m] ),2));
			}

		}
					/*Mencari Nilai Positif Dan Negatif (A+)(A-)*/
		$indexI = 0;

		foreach ($keriterias as $keriteriax) {
			$max[$indexI] = array();
			$min[$indexI] = array();
			
			if ($keriteriax->type == "benefit") {
				array_push($max[$indexI], max($matrix[$keriteriax->id]));
				array_push($min[$indexI], min($matrix[$keriteriax->id]));
			
			}else{
			
				array_push($max[$indexI], min($matrix[$keriteriax->id]));
				array_push($min[$indexI], max($matrix[$keriteriax->id]));
			}

				
		$indexI++;
		}

	/**
	 * Mencari S+
	 */

		$sxx = 0 ;
		foreach ($keriterias as $keriteriaSp) {
				if ($sxx < count($max) ) {
					$perpangkatan[$sxx] = array();
					
					for ($sp=0; $sp < count($matrix[$keriteriaSp->id]); $sp++) {
						# code...
						$xx = $max[$sxx][0] - $matrix[$keriteriaSp->id][$sp];
						$hxx = pow($xx, 2);
						
						array_push($perpangkatan[$sxx],$hxx);
					}
					
					$sxx++;
				}
			
			}

		$hasilsP = array();
		for ($h=0; $h < count($perpangkatan[0]) ; $h++) {
				$kmax = 0;
				for ($k=0; $k < count($perpangkatan) ; $k++) {
					$kmax += $perpangkatan[$k][$h];
				}
				
				array_push($hasilsP, round(sqrt($kmax),2));
		}


		/* Mencari S-*/
		$sxxm = 0 ;
		foreach ($keriterias as $keriteriaSp) {
				if ($sxxm < count($min) ) {
					$perpangkatansm[$sxxm] = array();
					
					for ($ns=0; $ns < count($matrix[$keriteriaSp->id]); $ns++) {
						# code...
						$nxx = $min[$sxxm][0] - $matrix[$keriteriaSp->id][$ns];
						$hnxx = pow($nxx, 2);
						array_push($perpangkatansm[$sxxm],$hnxx);
					}
				$sxxm++;
				}
			
			}

		$hasilsN = array();
		for ($u=0; $u < count($perpangkatansm[0]) ; $u++) {
			$kmmin = 0;
			
			for ($y=0; $y < count($perpangkatansm) ; $y++) {
				$kmmin += $perpangkatansm[$y][$u];
				}
			
			array_push($hasilsN, round(sqrt($kmmin),2));
		}

		$final = array();
		$hfinal = 0;
		for ($q=0; $q < count($hasilsN) ; $q++) {
			$hfinal = $hasilsN[$q]/($hasilsN[$q]+$hasilsP[$q]);
			array_push($final, round($hfinal,2));
		
		}

		$datas = Alternative::All();
		$datas->toArray();
		$keriterias->toArray();
		$nilais = NilaiKriteria::All();
		$nilais->toArray();
		return view('normalisasiR', ['datas' => $datas,'nilais' => $nilais,'kriterias'=>$keriterias,'nilaiR' => $x,'matrixs' => $matrix,'maxs' => $max, 'mins' => $min,'spositifs' => $hasilsP,'snegatives' => $hasilsN,'finals' => $final ] );
}

public function matrix(){
	$datas = Alternative::All();
	$datas->toArray();
	$Kriterias = Kriteria::All();
	$Kriterias->toArray();
	$nilais = NilaiKriteria::All();
	$nilais->toArray();

	return view('matrix', ['datas' => $datas,'nilais' => $nilais,'kriterias'=>$Kriterias]);
	
}
public function analisa()
{
	$datas = Alternative::All();
	$datas->toArray();
	$Kriterias = Kriteria::All();
	$Kriterias->toArray();
	$nilais = NilaiKriteria::All();
	$nilais->toArray();
	
	return view('normalisasiR', ['datas' => $datas,'nilais' => $nilais,'kriterias'=>$Kriterias]);
}
}