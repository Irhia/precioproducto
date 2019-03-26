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
            <a href="{{route('ads.create')}}">Insertar anuncio </a>
            

<!-- Muestra los anuncios en la tabla -->
          <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Categoría</th>                    
                    <th scope="col">Web</th>
                    <th scope="col">Foto</th>
                    <th scope="col"></th>
                   
                  </tr>
                </thead>
               
               <tbody>
                   <!-- Si hay cosas las pinta. -->
                  @forelse ($ads as $ad)
                  
                      <tr>
                         <th scope="row">{{$ad->id}}</th>
                          <th> {{$ad->title}} </th>

                         <!-- category es la función creada en el Controllador
                         para hacer referencia a las relaciones, así podemos acceder
                         a los datos de la tabla por su relación -->   
                          <th> {{$ad->category()->first()->nombre}} </th>
                          <th>{{$ad->web()->first()->nombre}}</th>

                           <th> <img src= "{{$ad->foto}}" width="100" height="100"> </th> 
                           <th>
      <!-- Ventana modal para actualizar -->
                            <a href="#" data-toggle="modal" data-target="#editar" onclick="editarAnuncio('{{$ad->id}}','{{$ad->nombre}}');" > <img src="{{asset('image\edit.jpg')}}" height="28"> </a>&nbsp;

      <!-- Ventana modal para eliminar -->
              
                            <a href="#" data-toggle="modal" data-target="#eliminar" onclick="eliminarAnuncio('{{$ad->id}}','{{$ad->title}}');" ><img src="{{asset('image\delete.png')}}" height="28"></a>
                            

                           </th> 
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


    
    <!-- Input modal para editar una categoria -->
<div id="editar" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Editar anuncio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form_editar" method="post">
        <div class="modal-body">
          @csrf
          <input type="hidden" id="id" name="id"/>
          <input type="text" id="nombre" name="nombre" class="form-control" />
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Actualizar</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        </div>
      </form>
    </div>
  </div>
</div>




 <!-- Venta modal (de javascript) para eliminar una categoria -->
<div id="eliminar" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Eliminar anuncio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form_eliminar" method="post" >
        <div class="modal-body">
          @csrf
          <input type="hidden" name="_method" value="delete"/>
          <input type="text" id="nombre" name="nombre" class="form-control" readonly="" />
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger">Eliminar</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
    
    function editarAnuncio(anuncio_id,anuncio_nombre) {

      $('#editar #form_editar #id').val(anuncio_id);
      $('#editar #form_editar #nombre').val(anuncio_nombre);
    }

    function eliminarAnuncio(anuncio_id,anuncio_nombre) {
      $('#eliminar #form_eliminar').attr('action',"{{url('ads')}}/"+anuncio_id);
      $('#eliminar #form_eliminar #nombre').val(anuncio_nombre);
    }

</script>

@endsection
