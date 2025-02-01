@extends('layouts.app')

@section('title', 'Playas de México')

@section('navbar')
    @include('layouts.navbar_prueba')
@endsection

@section('content')
<div>
    <img src="{{asset('images/playacozumel.jpg')}}" alt="" style="height: 80%; width:100%">
</div>

<div class="row container-fluid  p-4 ">
    <div class=" col-sm-10 mx-auto ">
        
        <div class="row">
            <h1 class="fw-bold p-5">LAS PLAYAS DE MÉXICO,<span class="text-red">UN TESORO NATURAL</span></h1>

           <div class="col-md-8 ">
            <p class="text-normal">México es un país privilegiado que posee <strong>11,000 km de litoral</strong>, de los cuales
                70% se encuentran en el Océano Pacífico y Golfo de California
                mientras que el resto pertenece al Golfo de México y Mar Caribe. 
                Diecisiete de las 32 entidades federativas tienen costa: Tamaulipas,
                Veracruz, Tabasco, Yucatán, Campeche, Quintana Roo, Chiapas, Oaxaca,
                Guerrero, Michoacán, Colima, Jalisco, Nayarit, Sinaloa, Sonora,
                Baja California Sur y Baja California Norte. En estos estados
                se encuentran 150 municipios costeros, los cuales constituyen 21% de
                la superficie continental del país.
            </p>
            <p class="text-normal">Las costas mexicanas se agrupan en cinco regiones marinas: el Pacífico Noroeste,
                el Golfo de California, el Pacífico Tropical, el Golfo de México y el Mar Caribe.
                Cada una de estas regiones presenta características naturales y actividades económicas
                diferentes, pues mientras en el Golfo de México se realiza explotación petrolera intensiva, 
                el Mar Caribe presenta una intensa actividad turística, y el Golfo de California es un núcleo 
                pesquero muy importante, por citar algunos ejemplos.
            </p>
            </div> 
            <div class="col-md-4 text-center">
                <div class="mb-3">
                    <div class="text-bold">11,000 km</div>
                    <p class="text-gray">DE LITORAL</p>
                </div>
                <div class="mb-3">
                    <div class="text-bold">17</div>
                    <p class="text-gray">ESTADOS CON COSTA</p>
                </div>
                <div class="mb-3">
                    <div class="text-bold">5</div>
                    <p class="text-gray">REGIONES MARINAS</p>
                </div>
            </div>
        </div><br><br>
        
        <br><br>
        <div class="row  mb-4">
            <div class="col-md-12  mx-auto">
                <h1 class=" fw-bold text-red text-center">RELEVANCIA</h1>
                <p class="text-normal text-center">Las playas son depósitos no estables de arena, piedras o rocas a lo largo del
                    litoral, formadas por la acumulación de sedimentos debido a la erosión de las
                    rocas y el suelo, así como la degradación de organismos marinos
                </p>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-6 mx-auto mb-4">
                <img src="{{asset('images/MapaRegiones.png')}}" alt="Regiones de Mexico" width="100%">
                {{-- <p class="small text-center text-gray"> Figura 1. Regiones Marinas de México.</p> --}}
            </div>
            <div class="col-md-6">
                <p class="text-normal">Las playas de arena son uno de los ecosistemas costeros más relevantes para el país, tanto
                    por los servicios ambientales que prestan como por su importancia para el desarrollo
                    turístico. En el 2017, la actividad turística en los destinos de playa contribuyó con el 73% de
                    la economía de las ciudades costeras, la cual se distribuyó en el comercio, restaurantes y
                    servicios de hospedaje, transporte y construcción</p>
            </div>
        </div>
        <div class="row  ">
            <div class="col-md-12  mx-auto">
                <h4 class=" fw-bold text-start my-5">TIPOS DE ZONAS EN LAS PLAYAS</h4>
                <P class="text-normal text-start">Los tipos
                    de playa varían dependiendo del tipo de oleaje y de sedimento, el cual puede ser cantos,
                    grava, gravilla y arena, sin embargo, todas cuentan con elementos comunes que ayudan a
                    describirlas y estudiarlas</P>
                <ul class="text-normal text-start">
                    <li><span class="text-red  fw-bold">Playa alta, superior o posterior:</span> zona con pendientes pronunciadas, que contiene la
                        mayor parte de la vegetación
                    </li>
                    <li><span class="text-red fw-bold">Cota o línea de pleamar:</span> línea o franja en que se acumulan los restos de algas y
                        pastos marinos que provienen del mar como consecuencia de la marea alta, se utiliza
                        con frecuencia como referente para el análisis de residuos y microplásticos en playas
                    </li>
                    <li><span class="text-red fw-bold">Zona intermareal:</span> se localiza entre la pleamar (línea de marea alta) y la bajamar (línea
                        con el nivel más bajo de agua)
                    </li>
                </ul>
            </div>
        </div>

                
            
        
        <br><br>
        <div class="row ">
            <div class="col-sm-6 mx-auto  ">
                <h4 class=" fw-bold text-start m-4">IMPORTANCIA DE LAS PLAYAS</h4>
                <p class="text-normal">
                    Las playas son sistemas naturales que cumplen un doble rol, ya que brindan tanto 
                    <span class="text-gray fw-bold">servicios ambientales </span>como una amplia gama de oportunidades de <span class="text-gray fw-bold">recreación</span>. 
                    Aunado a lo anterior, también juegan un papel importante en la <span class=" fw-bold text-gray">economía</span>, ya que, 
                    a través del turismo se generan ingresos, que en muchos casos son el sustento de las zonas costeras.
                </p>
            </div>
            <div class="col-sm-6 ">
                <img src="{{asset('images/beneficios_playa.png')}}" width="100%" >
                {{-- <p class="small text-center text-gray"> Figura 2. Beneficios que brindan las playas a la sociedad</p> --}}
            </div>
        </div>
        <br><br>
        <div class="row ">
            <div class="col-sm-12 mx-auto  pb-5">
                <h1 class=" fw-bold  text-red text-center mb-4">PROBLEMAS ENFRENTADOS EN LAS PLAYAS</h1>
                <p class="text-normal ">
                    La interacción que hay entre el aire, el agua y la arena convierte a las playas en ambientes
                    muy dinámicos y sensibles, tanto a cambios naturales como a aquellos derivados de las
                    actividades humanas.
                </p>
                <p class="text-normal ">
                    Entre los factores más significativos se encuentra el turismo, que demanda infraestructura
                     (hoteles, centros comerciales, marinas), contribuyendo a la urbanización de las costas y causando diversos impactos.
                </p>
                <br>
                <p class="text-normal ">
                     Entre los problemas más graves a los que se enfrentan las playas se encuentran :
                     <ul class="text-normal">
                        <li ><span class=" text-red  fw-bold">Degradación de ecosistemas:</span> La urbanización transforma y daña los hábitats naturales. </li>
                        <li ><span class=" text-red  fw-bold">Erosión costera:</span> La erosión afecta la capacidad de las playas para proteger el litoral. </li>
                        <li ><span class=" text-red  fw-bold">Contaminación:</span> El manejo inadecuado de <span><a href="" class="text-red fw-bold">los residuos en las playas</a></span> 
                            y sus alrededores es uno de los problemas más urgentes que enfrentan estos ecosistemas. Los desechos pueden provenir de actividades recreativas, descargas de aguas
                            de drenaje o ser arrastrados por el viento y las corrientes desde zonas urbanas.</li>   
                     </ul>   
                </p>
                <p class="text-normal">
                Estos problemas limitan el uso de las playas y ponen en riesgo la biodiversidad que depende de ellas.

                </p>
            </div>
        </div>

        <div class="referencias">
            <h2 style="color: #333;">Referencias</h2>
            <ul style="line-height: 1.6; padding-left: 20px;">
                <li>Cruz Salas, A., Vázquez, A., & Álvarez, J. C. (2020). <em>Monitoreo y manejo de residuos en playas</em>. https://www.researchgate.net/profile/Arely-Cruz-Salas/publication/343486111_Monitoreo_y_manejo_de_residuos_en_playas/links/5f2c9a21458515b7290ace73/Monitoreo-y-manejo-de-residuos-en-playas.pdf.</li>
                <li>Seo, S. (2017). <em>Las 5 mejores playas de México. Cooperating Volunteers.</em> https://www.cooperatingvolunteers.com/america/las-5-mejores-playas-mexico/</li>
               </ul>
        </div>
        
    </div>
</div>
<br><br><br>


@endsection
