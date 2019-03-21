

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
// ZONA PÚBLICA

Route::get('/', function () {
    return view('public.inicio');
});


//Listar los anuncios.
Route::get ('ads/listar', 'AdController@listar');


Route::get ('contacto', function(){
  return view('public.contacto');
});

Auth::routes();


// ZONA PRIVADA

/* Proteger todas las rutas de la intranet para que si no está logueado vaya a login.*/
Route::group(['middleware' => 'auth'], function () {
	Route::get('/home', 'HomeController@index')->name('home');

	Route::get('categoria', 'CategoryControlleR@listar') -> name('categorias.listar');
	Route::post ('categoria', 'CategoryControlleR@insertar') ->name ('categoria.insertar');
	Route::get('categoria_eliminar/{id}', 'CategoryControlleR@eliminar') -> name ('categorias.eliminar');
	Route::get ('categoria_actualizar/{id}', 'CategoryControlleR@actualizar') -> name ('categorias.actualizar');


	/* La versión que usábamos antes de aprender a hacer Route::resource. */
	Route::get('web', 'WebControlleR@listar')-> name('web.listar');
	Route::post('web','WebControlleR@insertar') ->name('web.insertar');
	Route::get('web_eliminar/{id}','WebControlleR@eliminar') ->name('web.eliminar');


	Route::resource ('ads','AdController');

});