<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mapa Residuos')</title>
    <link rel="icon" href="{{asset('images/Logo-ResiPlay.png')}}">
    <!-- <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png"> -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/buttons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/border.css') }}" rel="stylesheet">
    <link href="{{ asset('css/efectos.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body>
  
    <header class="header" >
        @yield('navbar')
    </header>
    <main style="min-height: 80vh">
      <div class="container-fluid p-0 m-0">
            @yield('content')
      </div>
      
    </main>
  
    <footer class=" p-0 m-0">
            <div class="row p-3 bg-dark    m-0">
    
                <!-- Soporte -->
                <div class="col-sm-4 border-end mb-3 mb-sm-0">
                    <h5 class="fw-bold">Soporte</h5>
                    <p class="mb-1">Dra. Abigail Zamora Hernández <br>
                        <a class="email-link" href="mailto:abzamora@uv.mx"><i class="bi bi-envelope-fill"></i> abzamora@uv.mx</a>
                    </p>
                    <p class="mb-1">Edith Colorado Morales <br>
                        <a class="email-link" href="mailto:zs19002924@estudiantes.uv.mx"><i class="bi bi-envelope-fill"></i> zs19002924@estudiantes.uv.mx</a>
                    </p>
                </div>
    
                <!-- Contacto -->
                <div class="col-sm-4 border-end mb-3 mb-sm-0">
                    <h5 class="fw-bold">Contacto</h5>
                    <p class="mb-1">Dra. Alethia Vázquez Morillas <br>
                        <a class="email-link" href="mailto:alethia@azc.uam.mx"><i class="bi bi-envelope-fill"></i> alethia@azc.uam.mx</a>
                    </p>
                    <p class="mb-1">Dra. Arely Areanely Cruz Salas <br>
                        <a class="email-link" href="mailto:areanelyc@gmail.com"><i class="bi bi-envelope-fill"></i> areanelyc@gmail.com</a>
                    </p>
                    <p class="mb-1">Dr. Juan Carlos Alvarez Zeferino <br>
                        <a class="email-link" href="mailto:jucaf@correo.azc.uam.mx"><i class="bi bi-envelope-fill"></i> jucaf@correo.azc.uam.mx</a>
                    </p>
                </div>
    
                <!-- Logos -->
                <div class="col-sm-4 text-center my-auto">
                    <div class="row ">
                        <div class="col-6 my-auto  ">
                            <img src="{{ asset('images/logoUAM.png') }}" class="img-fluid mb-2" style="max-height: 60px;">
                            <p class="fw-bold small mb-0">UAM-AZCAPOTZALCO</p>
                        </div>
                        <div class="col-6 my-auto">
                            <img src="{{ asset('images/LogoUv.png') }}" class="img-fluid mb-2" style="max-height: 80px;">
                            <p class="fw-bold small mb-0">UNIVERSIDAD <br> VERACRUZANA</p>
                        </div>
                    </div>
                </div>
    
            </div>
            <div class="row   p-0 m-0 pt-3" style="background-color: #1D2024">
                <p class=""> ©Resiplay 2025. Todos los derechos reservados</p>
            </div>
    </footer>
    

    <!-- Bootstrap 5 JavaScript (Bundle includes Popper.js) -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}"></script> 
</body>
</html>