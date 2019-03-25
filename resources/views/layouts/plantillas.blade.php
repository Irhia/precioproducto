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
          <li class="nav-item">
            <a class="nav-link" href="{{url('categoria')}}">Categoría</a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="{{url('web')}}">Web</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="{{route('ads.index')}}">Anuncios</a>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"  aria-expanded="false">Productos</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="#">Rosas</a>
              <a class="dropdown-item" href="#">Amapolas</a>
              <a class="dropdown-item" href="#">Tulipanes</a>
            </div>
          </li>
 
        </ul>
 
        
<div class="dropdown" id="flores">
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Link a flores
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item" href="">Rosas</a>
    <a class="dropdown-item" href="#">Amapolas</a>
    <a class="dropdown-item" href="#">Petunias</a>
  </div>
</div>


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

  

   
