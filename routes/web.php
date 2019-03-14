

<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('inicio');
});

Route::get ('productos', function(){
  return view('productos');
});

Route::get ('contacto', function(){
  return view('contacto');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('categoria', 'CategoryControlleR@listar') -> name('categorias.listar');
Route::post ('categoria', 'CategoryControlleR@insertar') ->name ('categoria.insertar');
Route::get('categoria_eliminar/{id}', 'CategoryControlleR@eliminar') -> name ('categorias.eliminar');



Route::get('web', 'WebControlleR@listar')-> name('web.listar');
Route::post('web','WebControlleR@insertar') ->name('web.insertar');
Route::get('web_eliminar/{id}','WebControlleR@eliminar') ->name('web.eliminar');