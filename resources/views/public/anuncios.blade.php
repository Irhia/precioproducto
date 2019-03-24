@extends('layouts.public')
@section('titulo')
    Listado productos
@endsection

@section('seleccionado2')
selected
@endsection

@section('content')
 
<div id="caja_anuncio"> 

     <h1 class="display-3"> Anuncios  </h1>

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
        
         <button type="submit" class="btn btn-warning" > <i class="fas fa-dna"> Filtrar </i> </button>
      </form>

<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Dropdown button
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#">Action</a>
    <a class="dropdown-item" href="#">Another action</a>
    <a class="dropdown-item" href="#">Something else here</a>
  </div>
</div>


      
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Foto</th>
                   
                  </tr>
                </thead>
               
               <tbody>
                   <!-- Si hay cosas las pinta. -->
                  @forelse ($ads as $ad)
                  
                      <tr>
                         <th scope="row">{{$ad->id}}</th>
                           <td> {{$ad->title}} </td>
                           <td> <img src= "{{$ad->foto}}" width="100" height="100"> </td> 
                      </tr>
                                      
                      @empty  
                        <!-- Si está vacío -->
                        No existen productos
                 @endforelse
               
              </tbody>
            </table>
  
  <!-- Paginar los resultados-->
  {{ $ads->links() }}
 

@endsection