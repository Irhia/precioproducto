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
                       
                        
                           
                            <label for="title">
                            <input type="text" style="width: 100px" id="redondeado" name="title" class="form-control" placeholder="Samsung Note 10">
                        </label>


                        <label for="url">
                            <input type="text" style="width: 100px" id="redondeado" name="url" class="form-control" placeholder="https:\\www.google.es">
                        </label>

                        <label for="foto">
                            <input type="text" style="width: 100px" id="redondeado" name="foto" class="form-control" placeholder="https:\\www.google.es">
                        </label>
                       
                        <label for="precio_vta">
                            <input type="text" style="width: 100px" id="redondeado" name="precio_vta" class="form-control" placeholder="https:\\www.google.es">
                        </label>
                       
                        <label for="precio_chollo">
                            <input type="text" style="width: 100px" id="redondeado" name="precio_chollo" class="form-control" placeholder="https:\\www.google.es">
                        </label>
                       
                        <label for="precio_alto">
                            <input type="text" style="width: 100px" id="redondeado" name="precio_alto" class="form-control" placeholder="https:\\www.google.es">
                        </label>
                       

                        <select name="categoria"> 
                            @foreach 

                            <opt-ion >  {{$ad->category()->nombre}} </th>
                        </select>
                            <input type="submit" value="Alta" id="confondo">
                  
                    </form>

</div>





@endsection