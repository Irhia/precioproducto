<?php

namespace App\Http\Controllers;

use App\Ad;
use App\Category;
use App\Web;
use App\User;

use DB;

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
        
            $cats = Category::all();
            $webs = Web::all();
        return view ('private.anuncios')
              -> with ('cats', $cats)
              -> with ('webs', $webs)
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
    public function edit(Request $request)
    {
        
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
       $ad->title = $request->title;
       $ad->category_id = $request->category_id;
       $ad->web_id = $request->web_id;


       $ad->url = $request->url;
       $ad->foto = $request->foto;
       $ad->precio_vta = $request->precio_vta;
       $ad->precio_chollo = $request->precio_chollo;
       $ad->precio_alto = $request->precio_alto;

       $ad->update();

    return redirect()->route('ads.index');
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

    public function estadisticas(){

        //Sacar el listado de estadíticas

        //Obtenemos cuántos anuncios hay.
        

        $ads_total = DB::table('ads')->count();

        $chollos = DB::table('ads')
            ->whereColumn('precio_chollo', '>', 'precio_vta')
             ->count();

        $alto = DB::table('ads')
                ->whereColumn('precio_alto', '<', 'precio_vta')
                ->count();

        $correcto = DB::table('ads')
                ->whereColumn('precio_vta','<=','precio_alto')
                ->whereColumn('precio_vta', '>','precio_chollo')
                ->count();

        return view ('private.estadisticas')
            ->with('ads_total', $ads_total)
            ->with('chollos', $chollos)
            ->with('alto', $alto)
            ->with('correcto', $correcto);

    }
}
