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
                            <input type="text" style="width: 100px" id="redondeado" name="nombre" class="form-control" placeholder="Usuario">
                        </label>
                            <input type="submit" value="Alta" id="confondo">
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

 <div id="tabla_cat">              
          <table class="table table-responsive table-bordered" >
              <thead>
                  <tr>
                      <th>Nombre</th>
                      <th></th>
                      
                  </tr>
              </thead>
              <tbody>
                 @foreach ($lista_categoria as $categoria)
                  <tr>
                      <td> {{$categoria->nombre}}</td>
                      <td> <a href="#" data-toggle="modal" data-target="#editar" onclick="editarCategoria('{{$categoria->id}}','{{$categoria->nombre}}');" > <img src="image\edit.jpg" height="28"> </a>&nbsp;
                                        <a href="#" data-toggle="modal" data-target="#eliminar" onclick="eliminarCategoria('{{$categoria->id}}','{{$categoria->nombre}}');" ><img src="image\delete.png" height="28"></a>
                        </td>
                     
                  </tr>
                    @endforeach
              </tbody>
          </table>
</div>

</div>


    <div class="container">
        <div class="banner">
            <div class="col-md-12">
                <h4 class="text">Construyendo aplicaciones </h4>

            </div>
        </div>
    </div>

    
    <!-- Input modal para editar una categoria -->
<div id="editar" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Editar categoría</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form_editar" method="post" action="{{url('categoria_actualizar')}}">
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
        <h5 class="modal-title">Eliminar categoría</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form_eliminar" method="post" action="{{url('categoria_eliminar')}}">
        <div class="modal-body">
          @csrf
          <input type="hidden" id="id" name="id"/>
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
function editarCategoria(cat_id,cat_nombre) {
  $('#editar #form_editar #id').val(cat_id);
  $('#editar #form_editar #nombre').val(cat_nombre);
}
function eliminarCategoria(cat_id,cat_nombre) {
  $('#eliminar #form_eliminar #id').val(cat_id);
  $('#eliminar #form_eliminar #nombre').val(cat_nombre);
}
</script>

@endsection
