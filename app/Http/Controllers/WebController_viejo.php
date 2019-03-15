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
  	

    //Alta de una nueva categoria:
      //Comprobar que vienen los campos y con el formato adecuado:
      $reglas=['nombre' => 'required|unique:categories|max:255',
                'url' => 'required|unique:webs|max:255'
                ];
     
      $msgs=[
        'nombre.required' => 'Nombre requerido',
        'nombre.unique' => 'Ya existe la categoría',
        'nombre.max' => 'Máximo 255 chars',
        'url.required' => 'Url requerida',
        'url.unique' => 'Ya existe la url',
        'url.max' => 'Máximo 255 chars'
      ];

      
     
      //Si algo no se cumple vuelve al formulario y lleva lista de errores ($errors)
    $this->validate($request,$reglas,$msgs);
    //$this->validate($request,$reglas,$msgs);
    

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

  public function eliminar ($id) {

    $web = Web::find($id);
    $web->delete();
    return redirect()-> route ('web.listar');
  }
}
