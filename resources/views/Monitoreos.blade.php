@extends('layouts.app')

@section('title', 'Residuos en playas')

@section('navbar')
    @include('layouts.navbar_prueba')
@endsection

@section('content')
<div>
    <img src="{{asset('images/Portada2.jpg')}}" alt="" style=" width:100%; heigth:40%">
</div>
<div class="row container-fluid p-4">
    <div class=" col-sm-11 mx-auto ">
        <br><br>
        <div class="row">
            <h1 class="fw-bold p-5">MONITOREO DE <strong class="text-red">RESIDUOS SOLIDOS EN PLAYAS</strong> </h1>

           <div class="col-md-6 ">
                <p class=" text-justify espacio">
                    La presencia de residuos sólidos en playas es un problema que afecta la capacidad de las
                    mismas para brindar servicios ambientales, servir como base para el desarrollo de
                    actividades turísticas y contribuir al bienestar de los pobladores que viven en su cercanía.
                    Aunque en distintas playas se realizan de manera cotidiana actividades de recolección de
                    residuos por parte de las autoridades, de los establecimientos que se encuentran en las
                    mismas, de empresas y de agrupaciones civiles, el objetivo de las mismas es retirar los
                    residuos, y generalmente no se realiza una caracterización que permita conocer la
                    generación o composición de los mismos. 

                </p>
            </div> 
            <div class="col-md-6">
                <img src="{{asset('images/residuosplayas.jpg')}}" alt="" style="width: 100%">
            </div>
        </div>
        <br><br>
        <div class="row card-gris p-3">
           
            <div class="col-md-12 my-auto" >
                <br><br>
                 <h3 class="fw-bold ">¿POR QUÉ MONITOREAR LOS RESIDUOS? </h3>
                 <p class=" text-start">
                    El monitoreo puede definirse como una supervisión o control de alguna situación específica,
                    en este caso, referido a la <strong class="fw-bold">cuantificación y clasificación de los residuos presentes en
                        playas</strong> . Idealmente debe ser un proceso permanente, que permita realmente conocer el
                    comportamiento de un fenómeno a lo largo del tiempo.
                </p>
             </div> 
             
         </div>
         <div class="row card-red p-3">
            <div class="col-md-6 my-auto">
                 
                <p class=" text-justify">
                    El estudio de los residuos presentes
                    en playas puede generar distintos beneficios:
 
                </p>
                 <ul>
                    <li>
                    Definir una línea base, que permita evaluar el efecto de las estrategias desarrolladas
                    para dar un mejor manejo a los residuos
                    </li>
                    <li>Comparar la situación de distintas playas con respecto a la presencia de residuos</li>
                    <li>Evaluar el efecto de distintos factores, como las estaciones, fenómenos naturales,
                        actividades turísticas y otras en la presencia de residuos</li>
                    <li>Identificar residuos y fuentes predominantes, y con base en eso proponer líneas de
                        acción específicas</li>
                    <li>Involucrar a las autoridades, empresas, particulares y a la sociedad en su conjunto en
                        el manejo sustentable de playas</li>
                </ul> 
 
                
             </div> 
             <div class="col-md-6 my-auto">
                <img src="{{asset('images/muestreo2.png')}}" alt="" style="width: 100%; ">
            </div>
         </div>
         <br><br><br>
         <div class="row ">
            <div class="col-md-12 ">
                 <br><br>
                 <h3 class="fw-bold text-red text-center ">RECOMENDACIONES GENERALES </h3>
                 <br>
                 <p text-center >Los estudios de cuantificación y caracterización de los residuos presentes en playas deben
                    cumplir con características que les den validez. Para ello, se recomienda seguir las siguientes
                    recomendaciones:</p>
                 
                <ul>
                    <li>Conformar un equipo de al menos tres personas para la realización del estudio</li>
                    <li>Explicar claramente a todos los participantes los pasos a seguir, de forma que se
                        utilicen criterios uniformes a lo largo de todo el proceso</li>
                    <li>Realizar los muestreos de residuos a primera hora del día, para evitar interferencias
                        debidas a la presencia de visitantes</li>
                    <li>Utilizar calzado y, de ser necesario, pinzas, guantes u otros materiales que permitan
                        colectar los residuos punzocortantes o con características de peligrosidad que
                        pudiesen encontrarse</li>
                </ul>
            </div> 
         </div>
        <br><br><br>
         <div class="row card-red text-center  p-5">
            <div class="col-md-10 mx-auto">
                 
                 <h3 class="fw-bold ">METODOLOGÍA</h3>
                 <br>
                 <p class="">
                    La metodología usada ha sido adaptada por el grupo de investigación
                    Microplásticos en Ambientes Marinos (UAM – UABC), a partir de la revisión de los métodos
                    descritos en normas y reportes científicos, así como de la experiencia en el muestreo en más
                    de 70 playas en el litoral nacional.
 
                 </p>
                 <p class="">
                    La caracterización se lleva a cabo en un tramo de playa de 100 m de largo, en el cual se
                    seleccionan aleatoriamente secciones para el muestreo de residuos, los cuales son
                    cuantificados y clasificados. El procedimiento propuesto es simple, reproducible, y permite
                    realizar comparaciones entre distintas playas o en diferentes periodos. 
 
                 </p>
             </div> 
         </div>
         <div class="row card-black  p-5">
            <div class="col-md-5 mx-auto">
                 <img src="{{asset('images/materiales.png')}}" alt="Materiales" style="width: 100%">  
                 
            </div>
            <div class="col-md-7">
                <h2 class="">Materiales requeridos</h2>
                <p>El material requerido para el muestreo y caracterización de los residuos es:</p>
                <ul>
                    <li>Cuerda de color que contraste con la arena, con una longitud de 101 m</li>
                    <li>Dos cuerdas delgadas de 50 m de largo</li>
                    <li>10 estacas para anclar las cuerdas</li>
                    <li>Cinta métrica</li>
                    <li>Guantes de plástico reutilizables</li>
                    <li>Una balanza con capacidad de hasta 20 kg y sensibilidad en gramos, con batería
                        recargable</li>
                    <li>GPS o celular con conexión a internet</li>
                    <li>Cámara fotográfica</li>
                    <li>Contenedores o bolsas para almacenar los residuos sólidos</li>
                    <li>Formatos</li>
                    <li>Marcador negro permanente de punta fina</li>
                    <li>Tabla de apoyo para escritura</li>
                </ul>
            </div> 
         </div>
         <div class="row card-gris p-5">
            <div class="col-md-6 ">
                 <br><br>
                 <h3 class="fw-bold ">PROCEDIMIENTO</strong> </h3>
                 <br>
                 <p class=" text-justify">
                    El procedimiento para el muestreo y caracterización de residuos se lleva a cabo en cinco
                    pasos:
                 </p>
                 
             </div> 
             <div class="col-md-6">
                 <img src="{{asset('images/diagramapasos.png')}}" alt="" style="width: 100%">
             </div>
         </div>


         <div class="row card-gris p-5 " ><br><br>
            
            <div class="col-md-12" >
                    <div id="item-1">
                        <h3>Definición de objetivos</h3>
                        <p> El primer paso para la realización del estudio es definir claramente cuáles son los objetivos
                            buscados. Estos pueden incluir, pero no estar limitados a:
                        </p>
                        <ul>
                            <li>Conocer de forma general la situación de una playa con relación a la presencia de
                                residuos</li>
                            <li>Comparar distintas áreas de una misma playa</li>
                            <li>Evaluar la presencia de residuos en una playa en distintas épocas del año
                            </li>
                            <li>Evaluar el efecto de actividades o factores específicos
                            </li>
                            <li>Comparar distintas playas</li>
                           
                        </ul>
                       <p>Esta definición es esencial, pues de ello dependerán algunos de los criterios que deberán
                        emplearse durante el estudio.
                        </p>
                    </div>
                    <div class="row" id="item-2">
                        <div class="col-sm-5 my-auto">
                            <h3>Selección de zona de estudio</h3>
                            <p>La zona de estudio es un área de 100 m de largo, paralela al oleaje, comprendida entre el
                                agua y el área en que inicien las dunas, vegetación o infraestructura construida, como
                                restaurantes, palapas o malecón</p>
                        </div>
                        <div class="col-sm-7">
                            <img src="{{asset('images/zona.png')}}" alt="" style="width: 100%">
                        </div>
                        <br>
                        <div class="col-sm-5 my-auto">
                            <p>La zona de estudio debe identificarse extendiendo una cuerda de 100 m, paralela a la línea
                                de pleamar, con una cuerda, que previamente se marcó cada 5 m, para dividir el área en 20
                                secciones. La cuerda debe anclarse para evitar que se
                                mueva por acción del viento. Debe registrarse la posición geográfica (con el GPS) de los dos
                                extremos del transecto, como referencia para el reporte y para posteriores estudios.</p>
                        </div>
                        <div class="col-sm-7 pt-5">
                            <img src="{{asset('images/seccionzona.png')}}" alt="" style="width: 100%">

                        </div>
                    </div>
                    <div class="row p-5" id="item-3"><h3>Selección de secciones</h3>
                        <p>Deben seleccionarse aleatoriamente 5 de las 20 secciones del transecto delimitado por la
                            cuerda. Esto puede hacerse con ayuda de alguna aplicación móvil en un
                            teléfono celular.</p>
                            <div class="col-sm-6">
                            <img src="{{asset('images/seccionzona.png')}}" alt="" style="width: 100%">

                            </div>
                            <div class="col-sm-6">
                            <img src="{{asset('images/seccion3.png')}}" alt="" style="width: 100%">

                            </div>


                    </div>
                    <div class="row p-5" id="item-4"><h3>Recolección de residuos</h3> 
                    <p>Es necesario delimitar la primera de las secciones seleccionadas aleatoriamente. Para ello
                        deben extenderse y anclarse, desde la línea de agua hasta el límite de la playa (dunas,
                        infraestructura o palapas) las cuerdas de 50 m, en forma perpendicular al transecto de 100
                        m. A continuación, se recolectarán todos los residuos sólidos presentes en la sección
                        marcada, ya sea que se encuentre total o parcialmente entre las cuerdas, completos o en
                        fragmentos. Los residuos se deben almacenar en contenedores o bolsas durante la
                        recolección. Este procedimiento d</p>
                    <p>Es importante mencionar que, para ciertos estudios, la recolección de residuos puede
                        diferenciarse en dos zonas: la primera entre la pleamar y el límite de la playa, donde los
                        residuos presentes se asocian a los residuos generados de las actividades turísticorecreativas realizadas en playa y la segunda, entre la pleamar y la línea de agua, que se ve
                        influenciada por los residuos depositados por las mareas. 
                    </p>
                    <p>En caso de que en algún estudio se realicen muestreos en días consecutivos en la misma
                        zona de 100 m de la playa, debe procurarse que en cada día se realice el muestreo en
                        distintas secciones, de forma que no se vean afectados por recolecciones previas. </p>
                
                </div>
                    <div class="row" id="item-5"><h3>Cuantificación y clasificación de residuos</h3>
                    <p>La clasificación de los residuos se realiza separándolos en 14 categorías y 77 subcategorías
                        de forma manual, sobre alguna superficie plana, que puede ser una mesa, una lona o tela, o
                        incluso un área delimitada en la playa, protegida del viento y del oleaje. </p>
                    <p>Una vez que se ha realizado la separación se deben contar las piezas correspondientes a
                        cada categoría o subcategoría, pesarse, y registrar los resultados</p></div>
                 
            </div>
        </div>
        <div class="row card-red text-center  p-5">
                 <h3 class="fw-bold ">REPORTE DE RESULTADOS </h3>
                 <br>
                 <p class="">
                    Los resultados deben reportarse de forma que quien los consulte pueda entender
                    claramente cómo se realizó el análisis y la manera en que se procesó la información.
 
                 </p>
                 <p>Los estudios de cuantificación y clasificación de residuos pueden presentarse en dos formas:
                    con base en el número de piezas, o partir de la masa de los residuos correspondientes a
                    cada categoría o subcategoría. Aunque la cuantificación de las masas es un poco más
                    compleja que el conteo de piezas, presenta ventajas; la primera es que permite estimar de
                    forma más concreta la carga de contaminantes que se encuentran en la playa, y la segunda,
                    que facilita la contabilidad tanto de los residuos “completos” como de los fragmentos de los
                    mismos. En el caso de la contabilidad en masa, los resultados pueden calcularse tanto para
                    los residuos húmedos, tal como se obtienen del muestreo, como para los residuos secos. En
                    la medida de lo posible, es conveniente presentar los resultados tanto en piezas como en
                    masa, con el fin de permitir la comparación con otros estudios. 
                    </p>
                    <div class="col-sm-3">
                        <p class="fw-bold">Número de piezas o masa total</p>
                        <p>Si únicamente se requiere conocer de manera global la presencia de residuos, o si no se
                            cuenta con información correspondiente al ancho de playa, los resultados se pueden
                            reportar como número total de piezas o masa total de residuos en la playa estudiada.</p>
                    </div>
                    <div class="col-sm-3">
                        <p class="fw-bold">Número de piezas por metro lineal</p>
                        <p>Otra manera de expresar los resultados es expresándolas por número de piezas o masa total
                            por metro lineal recorrido, que en este caso sería la suma de los 5 transectos de 5 m cada
                            uno. Aunque la contabilidad es simple, no toma en cuenta el ancho de playa, por lo que
                            limita la interpretación de los resultados.</p>
                    </div>
                    <div class="col-sm-3">
                        <p class="fw-bold">Índice de contaminación</p>
                        <p>El índice de contaminación permite cuantificar los residuos que se encontraron en la
                            superficie muestreada. Al expresar los resultados por metro cuadrado, es útil para realizar
                            comparaciones.</p>
                    </div>
                    <div class="col-sm-3">
                        <p class="fw-bold">Composición de residuos</p>
                        <p>La composición de residuos indica la proporción que corresponde a cada categoría o
                            subcategoría, y se expresa en términos porcentuales</p>
                    </div>
                    <a href="{{route('consulta')}}">
            <button class=" btn-white text-center" >VER RESULTADOS DE LOS MUESTREOS</button>

                    </a>

        </div>
        <br>
        

        
         
        <div class="referencias">
            <h2 style="color: #333;">Referencias</h2>
            <ul style="line-height: 1.6; padding-left: 20px;">
                <li>Cruz Salas, A., Vázquez, A., & Álvarez, J. C. (2020). <em>Monitoreo y manejo de residuos en playas</em>.
                    <a style="color:black; text-decoration:none"
                     href="https://www.researchgate.net/profile/Arely-Cruz-Salas/publication/343486111_Monitoreo_y_manejo_de_residuos_en_playas/links/5f2c9a21458515b7290ace73/Monitoreo-y-manejo-de-residuos-en-playas.pdf.">
                     https://www.researchgate.net/profile/Arely-Cruz-Salas/publication/...</a></li>
                 <li>Limpieza de Málaga (2021).<em>Día Mundial de la Limpieza y de las Playas.</em>https://limpiezademalaga.es/dia-mundial-limpieza-y-playas/</li>
                <li>SEMARNAT (2024). <em>¿A dónde van los desechos que terminan en las playas y mares?</em>. https://www.gob.mx/semarnat/articulos/a-donde-van-los-desechos-que-terminan-en-las-playas-y-mares</li>
            </ul>
        </div>
        
    </div>
</div>
<br><br><br>


@endsection
