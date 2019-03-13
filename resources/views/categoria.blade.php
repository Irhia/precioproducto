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

                        
                        @foreach ($lista_categoria as $categorias)
                        	<li> {{$categorias->nombre}} </li>
                		
                		@endforeach
     </div>


    <div class="container">
        <div class="banner">
            <div class="col-md-12">
                <h4 class="text">Construyendo aplicaciones </h4>

            </div>
        </div>
    </div>

@endsection
