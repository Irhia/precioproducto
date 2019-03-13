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
  	//Alta de una nueva categoría

  	$categoria = new Category();
  	$categoria->nombre = $request->nombre;
  	$categoria->save();

  return redirect()-> route ('categorias.listar');
  }

}
