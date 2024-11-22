@extends('layouts.app')

@section('title', '¿Quíenes somos?')

@section('navbar')
    @include('layouts.navbar_prueba')
@endsection

@section('content')
<br>
<br>
<div class="row ">

    <div class="col-sm-10   mx-auto text-center card-team" >
        <h2 class="team-title"> ¿Quiénes somos?</h2>
        <p class="team-description">Somos un equipo de investigación
         de la Universidad Autónoma Metropolitana, Unidad Azcapotzalco,
        comprometidos en el estudio de residuos sólidos,
        especialmente plásticos y microplásticos, en las playas de México.<br>
        Nos dedicamos a desarrollar, aplicar y difundir metodologías innovadoras de investigación,
        buscando concientizar sobre las consecuencias ambientales y sociales de la
        contaminación plástica.
        A través de nuestro trabajo, aspiramos a contribuir a la 
        creación de soluciones sostenibles y al fortalecimiento de la educación ambiental.
    </p>
    </div>
</div>
<br><br>
<div class="row mx-auto text-center">
    <div class="col-sm-10 mx-auto text-center ">
        <div class="row integrante-card p-2">
            <div class="col-md-4 text-center mb-5 ">
                <img src="{{asset('images/alethia.jpg')}}" alt="Nombre del integrante" class="border">   
            </div>
            <div class="col-md-8 mb-5 text-center text-md-start ">
                <h2>Dra. Alethia Vázquez Morillas</h2>
                <p class="description">
                    Ing. Química por la UAM-Azcapotzalco, <br>
                    Maestra en C. en Integración de Procesos por la Universidad de Manchester, <br>
                    Dra. en Ciencias e Ingeniería Ambientales por la UAM-Azcapotzalco.<br>
                    Profesora-investigadora en el Departamento de Energía de la UAM-A, donde imparte asignaturas a nivel
                    licenciatura y posgrado en temas relacionados con la gestión de residuos.
                </p>
                <a class="mas" href="https://investigacion.uam.mx/index.php/component/catalogo_investigadores/investigador/48235">mostrar más</a><br>
                Correo:
                <a href="mailto:alethia@azc.uam.mx" class="email">alethia@azc.uam.mx</a><br>
            </div>
        </div>
        <div class="row integrante-card p-2">
            <div class="col-md-8 mb-5 text-center text-md-start ">
                <h2>Dra. Arely Areanely Cruz Salas</h2>
                <p class="description">
                    Ing. Ambiental por la por la UAM-Azcapotzalco (UAM-A), <br>
                    Maestra en Ciencias e Ingeniería Ambiental en la misma institución, <br>
                    Dra. en Ciencias por la Universidad Autónoma de Baja California (UABC) campus Mexicali.<br>
                    Actualmente es profesor temporal en la UAM-A, donde ha impartido diversas UEAs a nivel licenciatura.
                </p>
                <a class="mas" href="https://plasticosresiduosymicroplasticos.com/wp-content/uploads/2023/11/cv-arely-a.-cruz-salas.pdf">mostrar más</a><br>
                Correo:
                <a href="mailto:areanelyc@gmail.com" class="email">areanelyc@gmail.com</a><br>
            </div>
            <div class="col-md-4 text-center mb-5 integrante-card ">
                <img src="{{asset('images/Arely.jpeg')}}" alt="Nombre del integrante" class="border"> 
            </div>
        </div>
        <div class="row integrante-card p-2">
            <div class="col-md-4 text-center mb-5 ">
                <img src="{{asset('images/JuanCarlos.jpeg')}}" alt="Nombre del integrante" class="border"> 
            </div>
            <div class="col-md-8 mb-5 text-center text-md-start ">
                <h2>Dr. Juan Carlos Alvarez Zeferino</h2>
                <p class="description">
                    Ing. Ambiental por la por la UAM-Azcapotzalco. (UAM-A), <br>
                    Maestro en Ciencias e Ingeniería Ambiental por la misma institución.<br>
                    Dr. en Ciencias por la Universidad Autónoma de Baja California.<br>
                    Docente en la Escuela Militar de Ingenieros
                    Docente la Universidad Autónoma Metropolitana - Azcapotzalco
                </p>
                <a class="mas" href="https://plasticosresiduosymicroplasticos.com/wp-content/uploads/2021/09/02082021-curriculum-vitae-jcaz-v17.pdf">mostrar más</a>
                <br>
                Correos:
                <a href="mailto:jucaf@correo.azc.uam.mx" class="email">jucaf@correo.azc.uam.mx </a>
                <a href="mailto:zeferinojuancarlos@gmail" class="email">; zeferinojuancarlos@gmail</a>
            </div>
        </div>
    </div>
</div>

@endsection
