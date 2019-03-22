<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    	/* Le decimos los datos que guardará o enseñará*/
   protected $fillable = [

   	/* Se ponen sólo los campos que serán rellenables. */
        'category_id', 'web_id', 'user_id', 'title', 'url', 'foto', 'precio_vta',
        'precio_chollo', 'precio_alto'
    ];

    public function web() {
		return $this->belongsTo('App\Web');
	}

	public function category() {
		return $this->belongsTo('App\Category');
	}

	public function user() {
		return $this->belongsTo('App\User');
	}
}
