<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;
use App\Http\Requests;
use App\Alternative AS Alternative;
use App\Kriteria AS Kriteria;
use App\Profile AS Profile;
use App\NilaiKriteria AS NilaiKriteria;

class AlternativeController extends Controller
{
     public function __construct(){

        $this->middleware('auth');
    }

    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

	     $datas = Alternative::All();
         $datas->toArray();
         $Kriterias = Kriteria::All();
         $Kriterias->toArray();
         $nilais = NilaiKriteria::All();
         $nilais->toArray();

	
	  	return view('alternative', ['datas' => $datas,'nilais' => $nilais,'kriterias'=>$Kriterias]);
    }

    
    public function insert(Request $request){
    	$idAlternative = Alternative::All()->last();
    	$datas = Alternative::All();
		$Kriterias = Kriteria::All();
		$dataCount = $idAlternative['id']+1;
    	$Alternative = new Alternative();

    	$Alternative->id = $dataCount;
    	$Alternative->name = $request->input('nameAlternative');
    	$Alternative->save();
    	 $nilais = NilaiKriteria::All();
         $nilais->toArray();
		foreach ($Kriterias as $Kriteria) {
		
		$Nilai = new NilaiKriteria();
		$Nilai->kriteria_id = $Kriteria->id;
		$Nilai->Alternative_id = $dataCount;
		$Nilai->nilai = $request->input($Kriteria->id);
		$Nilai->save();
		}


	  	return view('alternative', ['datas' => $datas,'nilais' => $nilais,'kriterias'=>$Kriterias]);
	}

	public function profile()
	{
	  	$data = Alternative::all();
	  	return view('alternative', ['datas' => $datas]);
		
	}
	public function update($id){
		 
	  	$data = Alternative::find($id);
	  	$nilai = NilaiKriteria::where('alternative_id',$id)->get();
	  	return ['data'=>$data,'nilai'=>$nilai];

	}

	public function updateSimpan(Request $request){
	# code...
		$id = $request->input('id');
		
		$data = Alternative::find($id);
		$data->kodeKaryawan = $request->input('kodeKaryawan');
		$data->name = $request->input('name');
		$data->jabatan = $request->input('jabatan');
		$data->alamat = $request->input('alamat');
		$data->kontak = $request->input('kontak');
		$data->status = $request->input('status');
		$data->jk = $request->input('jk');
		$data->save();

		$kriteria = Kriteria::all();

	    $nkr = NilaiKriteria::where('alternative_id',$id);
	    $nkr->delete();

    	foreach ($kriteria as $kr) {

    			$nilaiKriteria = new NilaiKriteria;
    			$nilaiKriteria->nilai =$request->input($kr->id);
    			$nilaiKriteria->kriteria_id = $kr->id;
    			$nilaiKriteria->alternative_id = $id;
    			$nilaiKriteria->save();
	
    	}
    	 return redirect('alternative');
	}

	public function delete($id){
		 
	  	 $data = Alternative::find($id)->delete();
	  	 $nilai = NilaiKriteria::where('alternative_id',$id);
	  	 $nilai->delete();
    	 return redirect('alternative');

 	}
}
