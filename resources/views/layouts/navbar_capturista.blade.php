<nav class="navbar  navbar_capturista navbar-expand-lg navbar-dark  ">
  <div class="container-fluid">
    <a class="navbar-brand active" >Capturista</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon" ></span>
      </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link {{Request::is('capturista/muestreos') ? 'active': ''}}" aria-current="page" href="{{ route('capturista.muestreos')}}">Muestreos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{Request::is('capturista/articulos') ? 'active': ''}} " href="{{route('capturista.publicaciones')}}">Articulos</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle {{Request::is('capturista/Playas','capturista/municipios','capturista/RegionMarina','capturista/Tipo_residuos','capturista/Clasificacion') ? 'active': ''}}" href="/" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Playas
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="{{route('capturista.Playas')}}">Playas</a></li>
            <li><a class="dropdown-item" href="{{route('capturista.municipios')}}">Municipios</a></li>
            <li><a class="dropdown-item" href="{{route('capturista.Tipo_residuos')}}">Residuos</a></li>
            <li><a class="dropdown-item" href="{{route('capturista.Clasificacion')}}">Clasificación de residuos</a></li>
          </ul>
        </li>
      </ul>
      <div class="nav-item" style="margin-right: 30px; color:white">
        <a class=" nav-link dropdown-toggle d-flex align-items-center" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false" role="button">
         <div class="user-circle me-2">
           {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
         </div> 
         <span>{{ Auth::user()->name }}</span>
       </a>
       <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownUser" style="margin-right: 30px;">
         <li class="px-3 py-2">
           <div class="d-flex align-items-center">
             <div class="user-circle "  style="width: 50px;height: 50px; font-size:30px">
               {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
             </div> 
             <div class="m-1"></div>
             <div>
               <strong>{{Auth::user()->name}}</strong>
               <p class="small mb-0">{{Auth::user()->email}}</p>
             </div>
           </div>
         </li>
         <li><a class="dropdown-item" href="{{route('capturista.perfil.edit')}}"> 
           <i class="bi bi-pencil-square"></i> Editar datos</a></li>
         <li>
           <form action="{{route('logout')}} " method="POST">
             @csrf
             <button class="dropdown-item d-flex align-items-center" type="submit">
               <i class="bi bi-box-arrow-right"></i> Cerrar sesión
             </button>
           </form>
         </li>
       </ul> 
     </div>
    </div>
  </div>
</nav>
