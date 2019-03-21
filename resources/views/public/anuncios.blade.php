@extends('layouts.public')
@section('titulo')
Listado productos
@endsection

@section('seleccionado2')
selected
@endsection

@section('content')
  
  <h1> Anuncios </h1>

     <ul> 
        <!-- Si hay cosas las pinta. -->
        @forelse ($ads as $ad)
            
            <li> {{$ad->title}} </li>

            <!-- Si está vacío -->
          @empty
            No existen productos

        @endforelse
    
    </ul>

  @endsection