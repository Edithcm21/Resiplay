
<div id="navbar3" >

<div class=" header-top">
  <div class="d-flex justify-content-start align-items-center me-2">
      <img class="al img-fluid me-1" style="max-height: 90px;" src="{{ asset('images/Logo-ResiPlay.png') }}">
      <img class="mt-0 pt-0" src="{{asset('images/nombre.png')}}" alt="" style="height: 40px">
      {{-- <h3 class="fw-bold ">Resi<strong class=" text-red">Play</strong></h4> --}}
  </div>
  <div class="buttons d-flex justify-content-end align-items-center">
        
    <a href="" class="nav-link">
      <button type="button" class="btn-gray" > <i class="bi bi-question-circle-fill"> Ayuda</i> </button>
      
    </a>
      <div class="  " style="">
          <a href="{{route('login')}}">
              <button id="navbutton1" type="button" class="btn-red ">Iniciar sesión</button>
          </a>
      </div>
  </div>
</div>
<nav  class="navbar   navbar-expand-lg  navbar-dark1 " style="">
  <button class="navbar-toggler ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse " id="navbarNav">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="/">INICIO</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="{{route('Integrantes')}}">¿QUIENES SOMOS?</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="{{route('consulta')}}">MUESTREOS</a></a>
      </li>
      <li class="nav-item dropdown active" >
        <a class="nav-link dropdown-toggle  active" href="{{route('consulta')}}" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          ANTECEDENTES
        </a>
        <ul class="dropdown-menu " aria-labelledby="navbarDropdownMenuLink">
          <li><a class="dropdown-item "  href="{{route('Monitoreos')}}">MONITOREOS</a></li>
          <li><a class="dropdown-item "  href="{{route('Costas')}}">LAS PLAYAS</a></li>
          <li><a class="dropdown-item "  href="{{route('Residuos_playas')}}">RESIDUOS EN PLAYAS</a></li>
          <li><a class="dropdown-item" href="{{route('publicaciones')}}">Publicaciones</a></li>
        </ul>
      </li>
      
    </ul>
    <div class="nav-item text ms-3 me-2" style=" " >
      {{ \Carbon\Carbon::parse(now()->toDateString())->locale('es')->isoFormat(' D [de] MMMM [del] YYYY') }}
    </div>
  </div> 

</nav>
</div>

  <nav id="navbar1" class="navbar navbar_inicio navbar-expand-lg border navbar-light navbar-hidden  fixed-top  row" >
    <div class="container-fluid">
      <div class="d-flex col-sm-2 justify-content-center  me-2" >
        <img class="al img-fluid me-2 " style="max-height: 90px;" src="{{ asset('images/Logo-ResiPlay.png') }}">
          <img class="my-auto " src="{{asset('images/nombre.png')}}" alt="" style="height: 40px">
      
      </div>
      <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse  " id="navbarNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">INICIO</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{route('Integrantes')}}">¿QUIENES SOMOS?</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{route('consulta')}}">MUESTREOS</a></a>
          </li>
          <li class="nav-item dropdown active" >
            <a class="nav-link dropdown-toggle  active" href="{{route('consulta')}}" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              ANTECEDENTES
            </a>
            <ul class="dropdown-menu " aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item "  href="{{route('Monitoreos')}}">MONITOREOS</a></li>
              <li><a class="dropdown-item "  href="{{route('Costas')}}">LAS PLAYAS</a></li>
              <li><a class="dropdown-item "  href="{{route('Residuos_playas')}}">RESIDUOS EN PLAYAS</a></li>
              <li><a class="dropdown-item" href="{{route('publicaciones')}}">Publicaciones</a></li>
            </ul>
          </li>
          
        </ul>
        <div class="nav-item text ms-3 me-2 d-flex" style=" " >
          {{ \Carbon\Carbon::parse(now()->toDateString())->locale('es')->isoFormat(' D [de] MMMM [del] YYYY') }}
        </div>
        <div class="nav-item ms-2 " style="margin-right: 30px">
          <a href="{{route('login')}}">
            <button id="navbutton2" type="button"  class=" btn-blue">Iniciar sesión</button>
          </a>
        </div>
      </div> 

    </div>
    
  
  </nav>


  