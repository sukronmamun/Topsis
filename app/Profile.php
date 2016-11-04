<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public $table = 'nilaikriteria';
    protected $fillable = [
        'id', 'alternative_id', 'kodeKaryawan', 'nama', 'jabatan', 'alamat', 'jenisKelamin', 'kontak', 'status',
    ];

    //For Get Data many To 1
    public function Alternative(){
    	return $this->belongsTo('App\Alternative');
    }

}
