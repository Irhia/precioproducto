<!-- Heredar de master.blade.php-->
@extends('master')


<!-- Para confifurar el título de nuestra página-->
@section('title','Home_User')


@section('enlace')
	<link rel="stylesheet" type="text/css" href="css/my_css.css" />
@endsection


<!-- Para incluir el contenido. 
  @yield ('content') se lo indicamos en master.blade.php -->
@section('content')
<div id="titulo">
	
		<h1>Estás en la página home</h1>

</div>


<div class="container">
    <div class="banner">
    	<div class="col-md-12">
    		<h4 class="text">Construyendo aplicaciones </h4>

    		<div class="text-center">
    			<i class="fas fa-home fa-9x" id="home"></i>
    		</div>
    	</div>
    </div>
</div>

@endsection