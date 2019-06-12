<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
	protected $fillable = ['nro_cliente', 'fecha', 'servicio'];


	/*public function clients(){
        return $this->hasMany('App\Clients');
    }*/
}
