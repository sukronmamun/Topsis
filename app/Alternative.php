<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alternative extends Model
{
	public $table = 'alternative';
     protected $fillable = [
        'id', 'name', 'kodeKaryawan', 'alamat', 'jk', 'kontak', 'status', 'jabatan',
    ];

      public function NilaiAlternative()
      {
      	return $this->hasMany('App\NilaiKriteria');
      }

       public function profile()
      {
      	return $this->hasMany('App\Profile');
      }

}
