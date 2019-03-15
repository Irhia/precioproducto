<!-- Heredar de master.blade.php-->
@extends('master_user')


<!-- Para confifurar el título de nuestra página-->
@section('title','Categoría')


@section('enlace')
    <link rel="stylesheet" type="text/css" href="css/my_css.css" />
@endsection


<!-- Para incluir el contenido. 
  @yield ('content') se lo indicamos en master.blade.php -->
@section('content')
    <div id="titulo">
        
            <h1>Estás en la página Categoría</h1>

            <div id="caja_crud">
                    <form method="post" action="{{url('categoria')}}">
                        <!-- No funciona sino el formulario sin "csrf-->
                        @csrf
                        <div class="row">
                            <label for="nombre">
                            <input type="text" style="width: 100px" name="nombre" class="form-control" placeholder="Usuario">
                        </label>
                            <input type="submit" value="Alta">
                        </div>
                    </form>
                
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
                       
                        @foreach ($lista_categoria as $categorias)
                        	<li> <input type="text" value=" {{$categorias->nombre}}" name="nombre">

                                 <a href="{{url('categoria_editar/'.$categorias->id)}} ">
                                    <img src="{{url('image/edit.jpg')}}" height="25px;">
                                  </a>
                                  <a href="{{url('categoria_eliminar/'.$categorias->id)}}"> 
                                    <img src="{{url('image/delete.png')}}" height="25px;">
                                  </a> 
                              </li>
                		
                		@endforeach
     </div>


    <div class="container">
        <div class="banner">
            <div class="col-md-12">
                <h4 class="text">Construyendo aplicaciones </h4>

            </div>
        </div>
    </div>

<script type="text/javascript">
    /* Son las funciones que sacarán las ventanas modales. */

    function editarCategoria (cat_id, cat_nombre) {
        $('#editar #form_editar #id').val(cat_id);
        $('#editar #form_editar #nombre').val(cat_nombre);
    }

     function eliminarCategoria (cat_id, cat_nombre) {
        $('#eliminar #form_eliminar #id').val(cat_id);
        $('#eliminar #form_eliminar #nombre').val(cat_nombre);
    }

</script>

@endsection
