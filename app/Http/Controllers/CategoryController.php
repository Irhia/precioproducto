<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

class CategoryController extends Controller
{
  public function listar () {
  	/* Como antes hacer un select * from categories*/
  	$categorias=Category::all();

  	return view ('categoria')
  		-> with ('lista_categoria', $categorias); 
  }

  public function insertar (Request $request) {


    //Alta de una nueva categoria:
      //Comprobar que vienen los campos y con el formato adecuado:
      $reglas=['nombre' => 'required|unique:categories|max:255'];
     
      $msgs=[
        'required' => 'Nombre requerido',
        'unique' => 'Ya existe la categoría',
        'max' => 'Máximo 255 chars'];
     
      //Si algo no se cumple vuelve al formulario y lleva lista de errores ($errors)
    $this->validate($request,$reglas,$msgs);
    //$this->validate($request,$reglas,$msgs);
  	
    //Alta de una nueva categoría

    //Crear el objeto
  	$categoria = new Category();
  	$categoria->nombre = $request->nombre;
  	$categoria->save();

  return redirect()-> route ('categorias.listar');
  }


  public function eliminar ($id) {

    $categoria = Category::find($id);
    $categoria->delete();
    return redirect()-> route ('categorias.listar');
  }
}
