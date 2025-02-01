
{{-- <div class="video-background" >
  <video class="background-video" autoplay muted loop>
    <source src="{{asset('video/portada.mp4')}}" type="video/mp4">
    Tu navegador no soporta la reproducción de video.
  </video>
  <div class="contenido_portada espacio">
    <!-- Aquí va tu contenido -->
    <h1 class="titulo fade-in-text">ResiPlay</h1>
    <p class="fs-2 fade-in-text">Por un litoral más limpio y sustentable</p>
  </div>
  <div class="curva container-fluid p-0 m-0 ">
    <img src="{{asset('images/curva.svg')}}" alt="">
  
  </div>
</div> --}}

{{-- <section id="banner">
  <img src="{{ asset('images/Banner.jpg') }}" style="width:100%" alt="Descripción de la imagen">
 
</section> --}}
<div class="portada " style="height: 125vh">
  <div class="" style="height: 92vh"></div> 
  <div class="curva container-fluid p-0 m-0 " style="height: 50vh">
    <img src="{{asset('images/curva.svg')}}" alt="" style="min-height: 100%; width:100%">
  </div>
</div>
<br><br>
<div class=" container ">
  <div class=" row">
    <div class="col-12 col-sm-7">
      <h1 class="text-rojo text-center mb-4 fs-1 h1">RESIPLAY</h1>
      <p class="fade-in-text fs-5  ">RESIPLAY (Residuos sólidos en playas), es un sistema de Información Geográfico (SIG) que integra una base de datos
        que gestiona los resultados de diversos muestreos realizados por investigadores 
        de la UAM Azcapotzalco, dedicados a monitorear la contaminación 
        por residuos sólidos en las playas mexicanas. A través de esta 
        herramienta, buscamos generar conciencia sobre la importancia de 
        preservar nuestros ecosistemas costeros y proporcionar información
         valiosa para su protección. Explora el mapa interactivo, revisa 
         los datos de muestreo y descubre cómo puedes contribuir a mantener
          nuestras playas limpias y saludables.
      </p>
    </div>
    <div class="col-12 col-sm-5 ">
      <img src="" >
      <img src="{{ asset('images/Muestreo-tuxpan.png') }}" style="width: 100%" alt="equipo de investigadores en muestreo Tuxpan, Ver" class="imagen-con-sombra imagen-fade-in">
    </div>
    
  </div>
</div>
  

{{--     

<div class="container  my-2 py-2">
  <div class="row card-info">
    <div class="col-sm-8 ">
      <h1 class="text-blue text-center mb-4">Las playas de México</h1>
      <p class="text-justify  text-blue2">
        México es un país privilegiado que posee <strong >11,000 km de litoral</strong>, de los cuales 70% se
        encuentran en el Océano Pacífico y Golfo de California, mientras que el resto pertenece al
        Golfo de México y Mar Caribe. Diecisiete de las 32 entidades federativas tienen costa:
        Tamaulipas, Veracruz, Tabasco, Yucatán, Campeche, Quintana Roo, Chiapas, Oaxaca,
        Guerrero, Michoacán, Colima, Jalisco, Nayarit, Sinaloa, Sonora, Baja California Sur y Baja
        California Norte. En estos estados se encuentran 150 municipios costeros, los cuales
        constituyen 21% de la superficie continental del país.
      </p>
      <p>
        Las costas mexicanas se agrupan en cinco regiones marinas: el Pacífico Noroeste, el Golfo
        de California, el Pacífico Tropical, el Golfo de México y el Mar Caribe. Cada una de
        estas regiones presenta características naturales y actividades económicas diferentes, pues
        mientras en el Golfo de México se realiza explotación petrolera intensiva, el Mar Caribe
        presenta una intensa actividad turística, y el Golfo de California es un núcleo pesquero muy
        importante, por citar algunos ejemplos. 
      </p>
    </div>
    <div class="col-sm-4 ">
      <img src="imagenxxx">
    </div>
  </div>
<br>
  <div class="row card-info">
    <div class="col-sm-4 ">
      <img src="imagenxxx">
    </div>
    <div class="col-sm-8 ">
      <h1 class="text-blue text-center mb-4">Contaminación en las playas</h1>
      <p>
    La contaminación en playas se refiere a la presencia de materiales y sustancias nocivas en las zonas costeras, que incluyen la arena, el agua y los ecosistemas circundantes. Estos contaminantes pueden ser desechos sólidos, productos químicos, residuos orgánicos y microplásticos (National Geographic, 2023).
    Muchos de estos contaminantes se acumulan en las profundidades del océano, donde son ingeridos por pequeños organismos marinos a través de los cuales se introducen en la cadena alimentaria global. También los grandes habitantes del océano sufren las consecuencias. Los científicos incluso han descubierto que los medicamentos que ingiere el hombre y que no llegan a ser procesados completamente por su organismo acaban en el pescado, la sal o el marisco que comemos (National Geographic, 2023).
    Los océanos que son las mayores masas de agua del planeta tienen una importancia ecológica crucial para la vida en la tierra. Por ejemplo, se estima que alrededor del 50% del oxígeno atmosférico se genera gracias a la fotosíntesis de los organismos marinos. Aunque la contaminación de los océanos ha sido un problema desde hace mucho tiempo, los esfuerzos internacionales para combatirla no comenzaron hasta el siglo XX (Padial, 2019).
    
      </p>
    </div>
    
  </div>
  
  
  
  
</div>

<section class="clasificacion">
            <div class="container ">
              <div class="row ">
                <div class="col-12 text-center p-3">
                    <h3>Clasificacion de residuos</h3>
                </div>
            </div>
    <div class="row d-flex  justify-content-center " >
    <div class="col pb-3">
    <div class="card card_residuos">
      <div class="card-body">
        <h5 class="card-title">Ejemplo</h5>
        <img class="al img-fluid" style="max-height: 90px;" src="{{ asset('images/metal.png') }}">
                
      </div>
    </div>
    </div>
    <div class="col pb-3" >
    
    <div class="card card_residuos">
    <a href="#">
      <div class="card-body">
        <h5 class="card-title text-center">Ejemplo</h5>
        <img class="al img-fluid mx-auto" style="max-height: 90px;" src="{{ asset('images/papel.png') }}">
                
      </div>
    </div>
    </a>
    </div>
    <div class="col pb-3" >
    <div class="card card_residuos">
      <div class="card-body ">
        <h5 class="card-title">Ejemplo</h5>
        <img class="al img-fluid" style="max-height: 90px;" src="{{ asset('images/plastico.png') }}">
                
      </div>
    </div>
    </div>

    <div class="col pb-3">
    <div class="card card_residuos">
      <div class="card-body">
        <h5 class="card-title">Ejemplo</h5>
        <img class="al img-fluid" style="max-height: 90px;" src="{{ asset('images/tela.png') }}">
                
      </div>
    </div>
    </div>

    <div class="col pb-3">
    <div class="card card_residuos">
      <div class="card-body">
        <h5 class="card-title">Ejemplo</h5>
        <img class="al img-fluid" style="max-height: 90px;" src="{{ asset('images/tela.png') }}">
                
      </div>
    </div>
    </div>

  </div>
  </div>
            
        </section>
 --}}
