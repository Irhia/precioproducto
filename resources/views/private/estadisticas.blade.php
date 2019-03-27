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

El total de anuncios es: {{$ads_total}}

El total de chollos es: {{$chollos}}