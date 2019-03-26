<?php

namespace App\Http\Controllers;

use App\Ad;
use App\Category;
use App\Web;
use App\User;

use Illuminate\Http\Request;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function listar(Request $request) {
        //Listar para la zona pública.
        //Separamos las rutas luego de public o private.

        if (!isset($request->cats))
            //obtener de la bbdd la lista de anuncios
            $ads=Ad::paginate(4);
                     

        else {
           //Sólo quiero los ads de la category_id indicada
            $category = Category::find($request->cats);
            $ads = $category -> ads()->paginate(2);
        }

        //dd($ads);

        $cats = Category::all();


        return view ('public.anuncios')
      -> with ('cats', $cats)
      -> with ('ads', $ads);

    }
    
    public function index()
    {
      
        //Listar para la zona privada
         //obtener de la bbdd la lista de anuncios
            $ads=Ad::paginate(3);
        

        return view ('private.anuncios')
              -> with ('ads', $ads);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //Mandar la lista de anuncios para poder
        //llamar a las funciones de relación de tablas
        

        //Listar para la zona privada
         //obtener de la bbdd la lista de anuncios
            $cats = Category::all();
            $webs = Web::all();

        return view ('private.anuncios_insertar')
              -> with ('cats', $cats)
              -> with ('webs', $webs);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //La función INSERT
            //dd($request->nombre);

          //Alta de una nueva anuncio:
      //Comprobar que vienen los campos y con el formato adecuado:
      $reglas=['title' => 'required|unique:ads|max:255'];
     
      $msgs=[
        'required' => 'Nombre requerido',
        'unique' => 'Ya existe la categoría',
        'max' => 'Máximo 255 chars'];
     
      //Si algo no se cumple vuelve al formulario y lleva lista de errores ($errors)
    $this->validate($request,$reglas,$msgs);
    //$this->validate($request,$reglas,$msgs);
    
    //Alta de un nuevo anuncio

    //Crear el objeto
    $anuncio = new Ad();
    $anuncio->title = $request->title;
    $anuncio->url = $request->url;
    $anuncio->foto = $request->foto;
    $anuncio->precio_vta = $request->precio_vta;
    $anuncio->precio_chollo = $request->precio_chollo;
    $anuncio->precio_alto = $request->precio_alto;

    $anuncio->category_id = $request->categorias;
    $anuncio->web_id = $request->webs;
    $anuncio->user_id = auth()->id();

    $anuncio->save();

  return redirect()-> route ('ads.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function show(Ad $ad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function edit(Ad $ad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ad $ad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ad $ad)
    {
        //Elimina el anuncio
        $ad->delete();
        return redirect()-> route('ads.index');
    }
}
