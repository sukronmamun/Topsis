<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NilaiKriteria extends Model
{
    //For insert many record
    public $table = 'nilaikriteria';
    protected $fillable = [
        'id', 'name',
    ];

    //For Get Data many To 1
    public function Alternative(){
    	return $this->belongsTo('App\Alternative');
    }

    public function kriteria(){
    	return $this->belongsTo('App\Kriteria');
    }
}
