<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Web;

class WebController extends Controller
{
    public function listar () {
  	/* Como antes hacer un select * from categories*/
  	$web=Web::all();

  	return view ('web')
  		-> with ('lista_webs', $web); 
  }

  public function insertar (Request $request) {
  	//Alta de una nueva categoría

  	/* Creamos una 'clase'nueva*/
  	$web = new Web();

  	/* La rellenamos con datos request (que vienen
  		del formulario. */
  	$web->nombre = $request->nombre;
  	$web->url = $request->url;

  	/* Insertar en la bbdd */
  	$web->save();

  return redirect()-> route ('web.listar');
  }
}
