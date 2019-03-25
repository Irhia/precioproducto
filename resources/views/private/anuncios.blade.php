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
    <div id="titulo">
        
            <h1>Anuncios</h1>
    </div>
          
    <div id="caja_crud">
            <a href="{{url('anuncios')}}">Insertar anuncio </a>
            

                            

          <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Categoría</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Foto</th>
                   
                  </tr>
                </thead>
               
               <tbody>
                   <!-- Si hay cosas las pinta. -->
                  @forelse ($ads as $ad)
                  
                      <tr>
                         <th scope="row">{{$ad->id}}</th>
                            
                         <!-- category es la función creada en el Controllador
                         para hacer referencia alas relaciones, así podemos acceder
                         a los datos de la tabla por su relación -->   
                          <th> {{$ad->category()->first()->nombre}} </th>
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

 </div>


</div>


 
  


@endsection
