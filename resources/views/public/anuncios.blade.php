@extends('layouts.public')
@section('titulo')
Listado productos
@endsection

@section('seleccionado2')
selected
@endsection

@section('content')
  
  <h1> Anuncios </h1>

    <form  method="post" action="{{url('ads/listar')}}">
        @csrf
      <select name="cats">
          @forelse($cats as $cat)
            <option value="{{$cat->id}}">{{$cat->nombre}}</option>
          @empty  
            <!-- Si está vacío -->
            <option> No hay </option>
          @endforelse
      </select> 
      
      <input type="submit" >
      </form>

      <table style="width:100%">
          
             <!-- Si hay cosas las pinta. -->
          @forelse ($ads as $ad)
           <tr>
            <td> {{$ad->title}} </td>
            <td> <img src= "{{$ad->foto}}" width="100" height="100"> </td> 
          </tr>
          @empty  
              <!-- Si está vacío -->
              No existen productos
          @endforelse
         
        </table>

        {{ $ads->links() }}
  

  @endsection