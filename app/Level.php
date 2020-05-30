<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Level;

class Level extends Model
{
    protected $table = 'levels';
    protected $guarded = [];
    protected $primaryKey = 'id';

    public function petugas(){
    	return $this->hasMany('App\User');
    }
}
