<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class File extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'ext', 'size', 'status', 'user_nim', 'kode_mk'
    ];

    public function user(){
      return $this->belongsTo('App\User');
    }
}
