@extends('layouts.app')

@section('title', 'Resultados')

@section('navbar')
    @include('layouts.navbar_prueba')
@endsection

@section('content' )
<div class="row justify-content-center align-items-center p-4"  >
    <div class="col-md-11 p-2 " style=" background-color:white;min-height: 74vh  " >
        {{-- <div class="container  " > --}}
            <div class="row centrarh">
                <div class="mb-3 col-sm-2">
                    <label for="numMuestreo" class=""># de muestreo :</label>
                    <input type="text" readonly class="form-control" id="numMuestreo" value="{{$muestreo->num_muestreo}}">
                </div>
                <div class="mb-3 col-sm-3">
                    <label for="zona" class="">Zona :</label>
                    <input type="text" readonly class="form-control" id="zona" value="{{$muestreo->zona}}">
                </div>
                <div class="mb-3 col-sm-2">
                    <label for="fecha" class="">Fecha :</label>
                    <input type="text" readonly class="form-control" id="fecha" value="{{$muestreo->fecha}}">
                </div>
                <div class="mb-3 col-sm-2">
                    <label for="dia" class="">Día :</label>
                    <input type="text" readonly class="form-control" id="dia" value="{{$muestreo->dia}}">
                </div>
            </div>
            <div class="row centrarh">
                <div class="col-sm-8 mt-4 table-responsive">
                    <table class="table table-striped  border">
                        <thead>
                            <tr >
                                <th>Clasificacion</th>
                                <th>Residuo</th>
                                <th>Cantidad</th>
                                <th>Porcentaje</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $totalC=0;
                                $totalP=0;
                                $nombresClasificacion=[];
                                $totalesClasificacion=[];
                                $porcentajeClasificacion=[];
                            @endphp

                            @foreach ($clasificaciones as $clasificacion)
                                @php
                                $hallazgosFiltrados = $hallazgos->where('id_clasificacion',$clasificacion->id_clasificacion);
                                $total=$hallazgosFiltrados->count();
                                $first = true; 
                                @endphp
                                @if($total>0)
                                @php
                                     $nombresClasificacion[] = $clasificacion->nombre_clasificacion;
                                     $totalesClasificacion[] = $hallazgosFiltrados->sum('cantidad');
                                     $porcentajeClasificacion[]= $hallazgosFiltrados->sum('porcentaje')
                                @endphp

            
                                    @foreach ($hallazgosFiltrados as $hallazgo)
                                        <tr style="">
                                        @if ($first)
                                            <td rowspan="{{$total}}">{{$clasificacion->nombre_clasificacion}} </td>
                                            @php 
                                                $first = false; 
                                                
                                            @endphp 
                                        @endif
                                        @php
                                            $totalC +=$hallazgo->cantidad;
                                            $totalP +=$hallazgo->porcentaje;
                                        @endphp
                                            <td>{{$hallazgo->nombre_tipo}}</td>
                                            <td>{{$hallazgo->cantidad}}</td>
                                            <td>{{$hallazgo->porcentaje}} %</td>
                                        </tr>
                                    @endforeach
                                @endif
                                @endforeach 
                        </tbody>
                        <tfoot >
                            <tr >
                                <td></td>
                                <th>Total:</th>
                                <th>{{$totalC}}</th>
                                <th>{{$totalP}}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
           
        {{-- </div> --}}
    </div>
</div>
<div class="row centrarh" >
    <div class="col-sm-6  centrarh" style="height: 90vh">
    <canvas id="graficaClasificacionpastel" width="" height="70vh"></canvas>
    </div>
   
</div>

<br><br><br>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.2.0"></script>


<script>
    const labels = @json($nombresClasificacion);
    const data = @json($totalesClasificacion);
    const porcentajes= @json($porcentajeClasificacion)

    const ctx = document.getElementById('graficaClasificacionpastel').getContext('2d');
    const grafica = new Chart(ctx, {
        type: 'pie', // Cambia a 'pie' para gráfico de pastel
        data: {
            labels: labels,
            datasets: [{
                label: 'Cantidad',
                data: data,
                backgroundColor: [
                    '#FF6384',
                    '#FF9F40',
                    '#9966FF',
                    '#024A86',
                    '#EF280F',
                    '#c82a54',
                    '#02ac66',
                    '#FFCE56',
                    '#4BC0C0',
                    '#9966FF'
                    
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: true },
                title: {
                    display: true,
                    text: 'Distribución por Clasificación'
                
                },
                datalabels:{
                    color:'#fff',
                    font:{
                        weight:'bold',
                    },
                    formatter:(value,context)=>{
                        return porcentajes[context.dataIndex] + '%';

                    }
                }
            }
        },
        plugins:[ChartDataLabels]
    });
</script>


@endsection




