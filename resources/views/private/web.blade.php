<!-- Heredar de master.blade.php-->
@extends('master_user')


<!-- Para confifurar el título de nuestra página-->
@section('title','Webs')


@section('enlace')
    <link rel="stylesheet" type="text/css" href="css/my_css.css" />
@endsection


<!-- Para incluir el contenido. 
  @yield ('content') se lo indicamos en master.blade.php -->
@section('content')
<div id="titulo">
    
        <h1>Estás en la página Webs</h1>
        
        <div id="caja_crud">
                <form method="post" action="{{url('web')}}">
                    <!-- No funciona sino el formulario sin "csrf-->
                    @csrf
                    <div class="row">
                        
                        <label for="nombre">
                        <input type="text" name="nombre" style="width: 100px" class="form-control" placeholder="mediamarkt">
                        </label>
                        
                        <label for="url"></label>
                        <input type="text" name="url"  style="width: 100px" class="form-control" placeholder="www.mediamarkt.es">
                        
                        <input type="submit" value="Alta">

                    </div>
                </form>
         
		
		
        <div id="tabla">

            <table class="table">
                <thead class="thead-dark">
                
                    <tr>
                      <th scope="col">Id</th>
                      <th scope="col">Nombre</th>
                      <th scope="col">Url</th>
                     
                    </tr>
              </thead>

              <tbody>
                
                 @isset($errors)
                    <div class="text-center">
                      <div class="row">
                        <div class="col-2"></div>
                        <div class="col-6">
                          <ul>
                          @foreach($errors->all() as $error) 
                            <li>{{$error}}</li>
                          @endforeach
                          </ul>
                        </div>
                      </div>
                    </div>
                  @endisset
                   @foreach ($lista_webs as $webs)
                    <tr>
                        <th scope="{{$webs->id}}"></th>
                          
                        <td><input type="text" value="{{$webs->nombre}}"> </td>
                        <td>{{$webs->url}}</td>
                        <td>
                          <a href="{{url('web_editar/'.$webs->id)}}"> 
                                    <img src="{{url('image/edit.jpg')}}" height="25px;">
                                  </a> 
                          <a href="{{url('web_eliminar/'.$webs->id)}}"> 
                                    <img src="{{url('image/delete.png')}}" height="25px;">
                                  </a> 
                        </a>
                      </td>
                    </tr>
                  @endforeach
               
             </tbody>
        </table>
    </div>

</div>


<div class="container">
    <div class="banner">
        <div class="col-md-12">
            <h4 class="text">Construyendo aplicaciones </h4>

        </div>
    </div>
</div>

@endsection