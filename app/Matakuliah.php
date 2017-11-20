<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Matakuliah extends Authenticatable
{
    use Notifiable;
    public $primaryKey = 'kode_mk';
    public $incrementing = false;
    //public $table = 'matakuliahs';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'kode_mk', 'nama_mk', 'sks', 'seksi', 'dosen', 'lecture_started', 'lecture_finished', 'user_nim'
    ];

    public function user(){
      return $this->belongsTo('App\User');
    }
}
