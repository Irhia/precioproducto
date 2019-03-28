<!-- Heredar de master.blade.php-->
@extends('master_user')


<!-- Para confifurar el título de nuestra página-->
@section('title','Anuncios')


@section('enlace')
    <link rel="stylesheet" type="text/css" href="css/my_css.css" />
@endsection


<!-- Para incluir el contenido. 
  @yield ('content') se lo indicamos en master.blade.php -->
@section('content')
<ul>
	
		<li>Anuncios {{$ads_total}}</li>
		<li>Chollos {{$chollos}}</li>
		<li>Correcto {{$correcto}}</li>
		<li>Excesivo {{$alto}}</li>
</ul>


@endsection