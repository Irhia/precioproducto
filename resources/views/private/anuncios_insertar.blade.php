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


                    <form method="post" action="{{route('ads.store')}}">
                        <!-- No funciona sino el formulario sin "csrf-->
                        @csrf
                       
                        
                           
                            <label for="title" class="d-inline">
                            <input type="text" style="width: 100px" id="redondeado" name="title" class="form-control" placeholder="Samsung Note 10">
                        </label>

                    <div id="uno" class="d-inline">    
<!--  Mostramos las webs -->
                        <select name="webs" class="d-inline"> 
                                @forelse ($webs as $web)
                                
                                
                                <option value= "{{$web->id}}">  {{$web->nombre}} </option> 
                                 @empty  
                                <!-- Si está vacío -->
                                No existen productos
                            @endforelse
                        </select>
                    </div>
                
<!--  Mostramos las categorías -->
                        <div id="dos" class="d-inline">
                            <select name="categorias" >
                            
                                    @forelse ($cats as $cat) 
                                        <option value= "{{$cat->id}}">  {{$cat->nombre}} </option>
                                
                                     @empty  
                                    <!-- Si está vacío -->
                                    No existen productos
                                @endforelse
                            </select>
                        </div>
                        

                    
                        <label for="url" class="d-inline">
                            <input type="text" style="width: 100px" id="redondeado" name="url" class="form-control" placeholder="https:\\www.google.es">
                        </label>

                        <label for="foto" class="d-inline">
                            <input type="text" style="width: 100px" id="redondeado" name="foto" class="form-control" placeholder="https:\\www.google.es">
                        </label>
                       
                        <label for="precio_vta" class="d-inline">
                            <input type="text" style="width: 100px" id="redondeado" name="precio_vta" class="form-control" placeholder="https:\\www.google.es">
                        </label>
                       
                        <label for="precio_chollo" class="d-inline">
                            <input type="text" style="width: 100px" id="redondeado" name="precio_chollo" class="form-control" placeholder="https:\\www.google.es">
                        </label>
                       
                        <label for="precio_alto" class="d-inline">
                            <input type="text" style="width: 100px" id="redondeado" name="precio_alto" class="form-control" placeholder="https:\\www.google.es">
                        </label>
                       
                   


                            <input type="submit" value="Alta" id="confondo">

                        -->
                  
                    </form>

</div>





@endsection