<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    //
    public $table ='kriteria';
    
    protected $fillable = [
        'id', 'name','bobot','type',
    ];

    public function NilaiKriteria()
      {
      	return $this->hasMany('App\NilaiKriteria');
      }
}
