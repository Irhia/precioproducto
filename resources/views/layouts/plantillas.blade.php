 <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
     <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="{{url('home')}}">Homne <span class="sr-only">(current)</span></a>
          </li>

 <!-- Si es usuario SuperAdmin podrá ver sino no verá esta sección -->

  @if(Auth::user()->hasRole('superadmin'))
              <li class="nav-item">
                <a class="nav-link" href="{{url('categoria')}}">Categoría</a>
              </li>
               <li class="nav-item">
                <a class="nav-link" href="{{url('web')}}">Web</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('estadisticas')}}">Estadíticas</a>
              </li>

  @endif


          <li class="nav-item">
            <a class="nav-link" href="{{route('ads.index')}}">Anuncios</a>

        </ul>
 
 

       <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
   
      <div id="out-log">  
          <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
        
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
     </div>
                    


 </div>  
  </nav>

  

   
