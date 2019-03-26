

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
Route::post('ads/listar', 'AdController@listar');



Route::get ('contacto', function(){
  return view('public.contacto');
});

Auth::routes();


// ZONA PRIVADA

/* Proteger todas las rutas de la intranet para que si no está logueado vaya a login.*/
Route::group(['middleware' => 'auth'], function () {
	Route::get('/home', 'HomeController@index')->name('home');

	Route::get('categoria', 'CategoryController@listar') -> name('categorias.listar');
	Route::post ('categoria', 'CategoryController@insertar') ->name ('categoria.insertar');
	Route::get('categoria_eliminar/{id}', 'CategoryController@eliminar') -> name ('categorias.eliminar');
	Route::get ('categoria_actualizar/{id}', 'CategoryController@actualizar') -> name ('categorias.actualizar');


	/* La versión que usábamos antes de aprender a hacer Route::resource. */
	Route::get('web', 'WebController@listar')-> name('web.listar');
	Route::post('web','WebController@insertar') ->name('web.insertar');
	Route::get('web_eliminar/{id}','WebController@eliminar') ->name('web.eliminar');


	Route::resource ('ads','AdController');

	
});