<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	/* Le decimos los datos que guardará o enseñará*/
   protected $fillable = [
        'nombre'
    ];

    public function ads (){
		return $this->hasMany('App\Ad');
	}
}
