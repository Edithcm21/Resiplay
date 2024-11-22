@extends('layouts.app')

@section('title', 'Residuos en playas')

@section('navbar')
    @include('layouts.navbar_prueba')
@endsection

@section('content')
<br>
<div class="espaciado">
</div>
<div class="row container-fluid p-4">
    <div class=" col-sm-10 mx-auto ">
        <div class="row">
           <div class="col-md-6 my-auto">
                <h1 class="fw-bold text-red">RESIDUOS EN PLAYAS</h1>
                <p class="text-normal">El crecimiento poblacional, la urbanización de la zona costera y la alta demanda del turismo
                de playa traen consigo el incremento de infraestructura, que conduce a la transformación
                de los ecosistemas naturales. Esto, a su vez, provoca que las playas experimenten
                problemas de contaminación por distintos factores, entre los cuales destaca la presencia de
                residuos sólidos como uno de los más predominantes 
                </p>
                <p class="text-normal"><strong>Los residuos marinos</strong>  se definen como aquellos que han sido fabricados o utilizados
                     y desechados al mar, ya sea directa o indirectamente 
                    por ríos, aguas residuales, vientos, corrientes marinas o un clima extremo.
                </p>
            </div> 
            <div class="col-md-6">
                <img src="{{asset('images/residuosplayas.jpg')}}" alt="" style="width: 100%">
            </div>
            <div class="col-md-6 pt-5">
                <img src="{{asset('images/isla.jpg')}}" alt="" style="width: 100%">
            </div>
            <div class="col-md-6 pt-5">
                <p class="text-normal">Los residuos marinos se pueden presentar en diferentes tamaños, formas y niveles
                    de degradación. La mayoría de estos tienen un bajo nivel de degradación, por lo
                     que terminan acumulándose entre ellos, formando islas de residuos. Los plásticos 
                     son los residuos más comunes, se pueden encontraren presentaciones como envoltorios,
                      botellas, cubiertos desechables, popotes, tapas de botellas, bolsas, colillas de 
                      cigarro y fragmentos de plásticos (microplásticos). Cada año, llegan al mar más de 
                      nueve millones de residuos plásticos.
               </p>
            </div>
           
        </div>
    </div>
</div>
<div class="container-fluid p-0">
    <div class="row card-red p-5">
        <div class="col-sm-12 p-5 pb-0">
            <h1>ORIGEN DE LOS RESIDUOS MARINOS</h1>
            <p class="">Los residuos marinos pueden originarse tanto en fuentes terrestres como marinas, sin
                embargo, se ha estimado que aproximadamente el 80% proviene de las actividades
                llevadas a cabo en tierra. </p>
            
            
        </div>
        <div class="col-sm-6 my-auto p-5">
            <p class="">En las fuentes terrestres se incluyen los rellenos
                sanitarios o tiraderos a cielo abierto cercanos a la costa, los residuos transportados por los
                ríos, la descarga de aguas municipales no tratadas y pluviales, y los generados por el turismo
                en las actividades recreativas en playas
        </p>
            <p>Las fuentes marinas comprenden a los residuos generados en las
                embarcaciones recreativas (canoas, kayaks, lanchas, yates, veleros y cruceros),
                embarcaciones comerciales (ferries y barcos mercantes), industria pesquera, industria
                petrolera y de gas natural , buques de guerra y de investigación. La siguiente imagen resume las
                principales fuentes de residuos marinos.</p>
        </div>
        <div class="col-sm-6 p-5">
            <img src="{{asset('images/fuentes.png')}}" alt="" width="100%">
        </div>
    </div>
</div>

<div class="container-fluid row p-5">
    <div class="col-sm-10 mx-auto">
        <h1 class="fw-bold text-red">EFECTOS DE LOS RESIDUOS MARINOS</h1>
        <p class="text-normal">Los residuos marinos presentes en playas y mares pueden generar distintos efectos nocivos
            en el entorno, entre los cuales destacan los siguientes:</p>
        <ul class="text-normal">
            <li>Daño y muerte a la <strong class="fw-bold">fauna marina y aves</strong> cuando éstos los ingieren o se enredan en
                ellos; el enredamiento provoca dificultades al moverse, lesiones o problemas al
                comer, respirar o nadar, mientras que la ingestión puede causar asfixia, lesiones
                internas, inanición, reducción de la absorción de nutrientes y asimilación de
                sustancias tóxicas</li>
            <li>Acarreo de <strong class="bw-bold">patógenos y compuestos químicos</strong> poco solubles, en residuos
                arrastrados por descargas pluviales</li>
            <li>Transporte de <strong class="bw-bold">especies</strong> que afecten la biodiversidad</li>
            <li>Daño o destrucción de <strong class="bw-bold">hábitats</strong> marinos y costeros</li>
            <li>Bloqueo de <strong class="bw-bold"> la luz solar </strong>, indispensable para el desarrollo de algas y otros organismos
                que la requieren</li>
            <li> Interferencia con el intercambio de <strong class="bw-bold">oxígeno</strong> océano - atmósfera</li>
            <li>Amenazas para la salud de los turistas, especialmente en el caso de los residuos
                punzocortantes</li>
            <li>Daños a <strong class="bw-bold"> embarcaciones</strong></li>
            <li> <strong class="bw-bold">Pérdidas económicas</strong> por la degradación de la costa, que puede disminuir la
                demanda turística
                </li>
            
        </ul>
    </div>
</div>
<div class="container-fluid row p-5">

        <div class="referencias">
            <h2 style="color: #333;">Referencias</h2>
            <ul style="line-height: 1.6; padding-left: 20px;">
                <li>Braskem Idesa, <em>Monitoreo y manejo de residuos en playas</em>. 2020. https://www.researchgate.net/profile/Arely-Cruz-Salas/publication/343486111_Monitoreo_y_manejo_de_residuos_en_playas/links/5f2c9a21458515b7290ace73/Monitoreo-y-manejo-de-residuos-en-playas.pdf.</li>
                <li>SEMARNAT, <em>¿A dónde van los desechos que terminan en las playas y mares?</em>. 2020. https://www.gob.mx/semarnat/articulos/a-donde-van-los-desechos-que-terminan-en-las-playas-y-mares</li>
                <li>https://www.nationalgeographicla.com/medio-ambiente/2023/03/cuales-son-las-playas-mas-contaminadas-de-mexico</li>
                <li>https://plasticosresiduosymicroplasticos.com/2021/08/09/contaminacion-marina/</li>
                <li>https://plasticosresiduosymicroplasticos.com/2021/08/11/residuos-marinos/</li>

            </ul>
        </div>
        
    </div>
<br><br><br>


@endsection
