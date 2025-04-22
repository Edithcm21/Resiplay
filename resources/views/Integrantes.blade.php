@extends('layouts.app')

@section('title', '¿Quíenes somos?')

@section('navbar')
    @include('layouts.navbar_prueba')
@endsection

@section('content')
<br>
<br>
<div class="row container-fluid">

    <div class="col-sm-10   mx-auto  card-team" style="box-shadow: 0px 10px 10px rgba(0, 0, 0, 0.2);">
        <h2 class="team-title text-center"> ¿Quiénes somos?</h2>
        <p class="  p-5 pt-3 pb-1 ">Somos un equipo multidisciplinario liderado por Alethia Vázquez Morillas,
             profesora e investigadora de la Universidad Autónoma Metropolitana (UAM) y miembro del 
             Sistema Nacional de Investigadores (SNI). Nuestro trabajo se centra en el estudio y 
             desarrollo de soluciones innovadoras para el manejo y tratamiento de residuos, con un 
             enfoque especial en el impacto de los plásticos en los ecosistemas costeros.<br>
        </p>
        <p class="p-5 pb-0 pt-0">
            El equipo de trabajo está compuesto por colaboradores de diversas áreas académicas y 
            profesionales, pertenecientes al cuerpo académico de la UAM y otras instituciones afines. 
            Nos destacamos por integrar enfoques científicos y técnicos en áreas como:
        </p>
        <div class="p-5 pb-0 pt-0 m-4">
            <li ><strong>Investigación ambiental:</strong> Enfocada en la caracterización y mitigación de residuos en ecosistemas naturales.</li>
            <li><strong>Desarrollo sostenible:</strong> Implementación de estrategias para la gestión de residuos plásticos y materiales reciclables.</li>
            <li><strong>Divulgación científica:</strong> Promoción de conciencia ambiental mediante estudios, publicaciones y eventos educativos.</li>
      
        </div>
            
            
        <p class="p-5 pt-0">Trabajamos con el compromiso de generar conocimiento útil para comunidades locales y contribuir a la preservación de nuestros recursos naturales.</p>
         

         
    </div>
</div>
<br><br>
<div class="row mx-auto text-center">
    <div class="col-sm-10 mx-auto text-center ">
        <div class="row integrante-card p-2" style="box-shadow: 0px 10px 10px rgba(0, 0, 0, 0.2);">
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
                {{-- <p>Su eivestigación se especializa en residuos plásticos y de manejo especial, 
                    colaborando con gobiernos, empresas y asociaciones civiles. Dirige proyectos 
                    sobre caracterización de residuos sólidos, comportamiento de plásticos en composteo 
                    y rellenos sanitarios, y presencia de microplásticos en ecosistemas. Es autora de 
                    publicaciones científicas y capítulos de libros, además de haber dirigido más de 100
                    tesis enfocadas en residuos plásticos.
                </p>
                <p>Posee el reconocimiento de perfil deseable del PRODEP y es nivel I en el Sistema Nacional 
                        de Investigadores. Ha asesorado a organismos como la ONU en temas de residuos marinos y
                        microplásticos, SEMARNAT en contaminación plástica y ha participado en comités relacionados 
                        con residuos y la industria del plástico. Coordinó el Inventario Nacional de Fuentes de 
                        Contaminación Plástica en colaboración con SEMARNAT y la ONU.
                </p>
                <p>En la UAM Azcapotzalco, ha sido Coordinadora de Docencia, impulsora de la sustentabilidad institucional 
                    y miembro de comisiones académicas y editoriales.
                </p> --}}
                <a class="mas" href="https://investigacion.uam.mx/index.php/component/catalogo_investigadores/investigador/48235">mostrar más</a><br>
                Correo:
                <a href="mailto:alethia@azc.uam.mx" class="email">alethia@azc.uam.mx</a><br>
            </div>
        </div>
        <br><br>
        <div class="row integrante-card p-2" style="box-shadow: 0px 10px 10px rgba(0, 0, 0, 0.2);">
            <div class="col-md-8 mb-5 text-center text-md-start ">
                <h2>Dra. Arely Areanely Cruz Salas</h2>
                <p class="description">
                    Ing. Ambiental por la por la UAM-Azcapotzalco (UAM-A), <br>
                    Maestra en Ciencias e Ingeniería Ambiental en la misma institución, <br>
                    Dra. en Ciencias por la Universidad Autónoma de Baja California (UABC) campus Mexicali.<br>
                    Actualmente es profesor temporal en la UAM-A, donde ha impartido diversas UEAs a nivel licenciatura.
                </p>
                {{-- <p>
                    Actualmente, la Dra. Arely Cruz desarrolla investigación sobre microplásticos,
                    biodegradación de plásticos en composteo y sistema respirométrico, tratamiento
                    de residuos orgánicos en procesos de lombricomposteo y composteo, estudios
                    sobre residuos sólidos urbanos y colillas de cigarro. Ha publicado como coautor
                    ocho artículos en revistas indexadas, dos artículos en revistas nacionales, 27
                    memorias internacionales y 29 nacionales, y ha presentado alrededor de 73
                    trabajos en eventos internacionales y nacionales.

                </p>
                <p>Además, es miembro de la Sociedad Mexicana de Ciencia y Tecnología Aplicada a
                    Residuos Sólidos A.C. (SOMERS) y de la Red Iberoamericana en Gestión y
                    Aprovechamiento de Residuos (REDISA). </p> --}}
                <a class="mas" href="https://plasticosresiduosymicroplasticos.com/wp-content/uploads/2023/11/cv-arely-a.-cruz-salas.pdf">mostrar más</a><br>
                Correo:
                <a href="mailto:areanelyc@gmail.com" class="email">areanelyc@gmail.com</a><br>
            </div>
            <div class="col-md-4 text-center mb-5 integrante-card ">
                <img src="{{asset('images/arely.jpg')}}" alt="Nombre del integrante" class="border"> 
            </div>
        </div>
        <br><br>
        <div class="row integrante-card p-2" style="box-shadow: 0px 10px 10px rgba(0, 0, 0, 0.2);">
            <div class="col-md-4 text-center mb-5 ">
                <img src="{{asset('images/JuanCarlos.jpg')}}" alt="Nombre del integrante" class="border"> 
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
                {{-- <p>
                    Temas de investigación:
                    <li>Contaminación marina de microplásticos y residuos sólidos urbanos</li>
                    <li>Obtención y aplicación de abonos orgánicos (composta, lombricomposta, extractos)</li>
                    <li>Microbiología ambiental (biorremediación)</li>
                    <li>Asimilación de plásticos en el ambiente</li>
                    <li>Gestión de residuos sólidos urbanos</li>

                </p>
                <p>
                    Actividades profesionales:
                    <li>Docente en la Escuela Militar de Ingenieros</li>
                    <li>Docente la Universidad Autónoma Metropolitana - Azcapotzalco</li>
                    <li>Consultor externo del Área de Tecnologías Sustentables de la Universidad Autónoma Metropolitana - Azcapotzalco</li>
                    <li>Consultor externo de la Entidad Mexicana de Acreditación EMA</li>
                    <li>Ayudante de Investigación en la Universidad Autónoma Metropolitana - Azcapotzalco</li>
                    <li>Gestor de Procedimientos Analíticos en ONSITE LABORATORIES DE MEXICO S.A. DE C.V</li>
                </p> --}}
                <a class="mas" href="https://plasticosresiduosymicroplasticos.com/wp-content/uploads/2021/09/02082021-curriculum-vitae-jcaz-v17.pdf">mostrar más</a>
                <br>
                Correos:
                <a href="mailto:jucaf@correo.azc.uam.mx" class="email">jucaf@correo.azc.uam.mx </a>
                <a href="mailto:zeferinojuancarlos@gmail" class="email">; zeferinojuancarlos@gmail</a>
            </div>
        </div>
        <br><br><br>
    </div>
</div>

@endsection
