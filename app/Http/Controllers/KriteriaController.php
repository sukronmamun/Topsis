<?php

namespace App\Http\Controllers;

use App;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Kriteria as Kriteria;
use App\NilaiKriteria as NilaiKriteria;


class KriteriaController extends Controller
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
    	
        
        $data = Kriteria::All();

	  	return view('kriteria', ['data' => $data]);
    }

    
    public function insert(Request $request){
    	

         $dataStore = new Kriteria();
         $dataStore->name  =  $request->input('name');
         $dataStore->bobot = $request->input('bobot');
         $dataStore->type = $request->input('type');
         $dataStore->save(); 
	  	 
	  	 $data = Kriteria::All();

	  	return view('kriteria',['data' => $data]);
	}

	public function update($id){
		 
	  	 $data = Kriteria::find($id);
	  	 return $data['bobot'];
	}

	public function resetBobot($id){
		$kriteria = Kriteria::find($id);
		$kriteria->bobot = 0;
		$kriteria->save();

		return redirect('kriteria');
 
	}

	public function update2(Request $request)
	{
		 $id = $request->input('idKriteria');
		
		$data = Kriteria::find($id);
		$data->name = $request->input('name');
		$data->bobot = $request->input('bobot');
		$data->type = $request->input('type');
		$data->save();
    	
    	
	  	 $data = Kriteria::All();

	  	return view('kriteria',['data' => $data]);
	}
	
	public function delete($id){
		 
		 $data = Kriteria::find($id)->delete();
	  	 $nilai = NilaiKriteria::where('kriteria_id',$id)->delete();
    	 
    	 return redirect('kriteria');

 	}
}