
@extends('layouts.app')

@section('title', 'Resultados')

@section('navbar')
    @include('layouts.navbar_prueba')
@endsection

@section('content')
  <div class="container-fluid " style="min-height: 80vh ; ">
    <div class="row justify-content-center align-items-center">
      <div class="filters col-sm-10 m-4">
        <h3 class="">Filtrar registros</h3>
        <form class="row " method="POST" action="{{route('consulta.filtro')}}"  >
          @csrf
          <div class="col-sm-2 m-1 p-1 ">
            <label for="playaSelect">Playa</label>
            <select  id="playaSelect" class="form-select" name="playa">
              <option value="0">Selecciona playa</option>
              @foreach ($playas as $playa)
              <option value="{{ $playa->id_playa }}">{{ $playa->nombre_playa }}</option>
              @endforeach
              <option value="0">Todas</option>
            </select>
          </div>
          <div class="col-sm-2 m-1 p-1">
            <label for="clasificacionSelected">Clasificacion</label>
            <select id="clasificacionSelected"  class="form-select" name="clasificacion">
              <option value="0">Selecciona la clasifiación</option>
              @foreach ($clasificaciones as $clasificacion)
              <option value="{{ $clasificacion->id_clasificacion }}">{{ $clasificacion->nombre_clasificacion }}</option>
              @endforeach
              <option value="0">Todas</option>
            </select>
          </div>
          <div class="col-sm-2 m-1 p-1">
            <label for="muestreoSelected"># Muestreo</label>
            <select  id="muestreoSelected" class="form-select" name="muestreo">
              <option value="0">Selecciona muestreo</option>
              @foreach ($num_muestreos as $num_muestreo)
              <option value="{{ $num_muestreo->num_muestreo }}">{{ $num_muestreo->num_muestreo }}</option>
              @endforeach
              <option value="0">Todos</option>
            </select>
          </div>
          <div class="col-sm-3 m-1 p-1 ">
            <label for="zonaSelected">Zona</label><br>
            <select  id="zonaSelected" class="form-select" name="zona">
              <option value="0">Selecciona playa</option>
              @foreach ($zonas as $zona)
              <option value="{{ $zona->zona }}">{{ $zona->zona}}</option>
              @endforeach
              <option value="0">Todas</option>
            </select>
          </div>

          <div class="col-sm-2 m-1 p-1 " ><br>
            <button  type="submit" class=" btn-blue btn-largo" > Filtrar</button>
          </div>   
      </form>

      </div>
      <div class="col-sm-10 m-4 table-responsive">
    
        @php
          $totales = array_fill(0, count($muestreos) * 2, 0);
        @endphp
        <table class="table table-striped  table-hover border text-center">
          <thead>
            <tr class=" text-center border ">
              <th   style=" max-width: 30px ; " scope="col text-center border " class="col text-center border vertical-text" rowspan="5">Clasificacion</th>

              <th   style="min-width: 300px; max-width: 300px ; " scope="col text-center border " class="col text-center border" rowspan="5">Residuo</th>
            </tr>
            <tr class="border">
              @php
                  // Agrupo por playa
                  $muestreosPorPlaya = $muestreos->groupBy('fk_playa');
              @endphp
    
              @foreach ($muestreosPorPlaya as $playaId => $muestreosDePlaya)
                  @php
                      // Obtengo primero  el nombre de esa playa
                      $nombrePlaya = $muestreosDePlaya->first()->playa->nombre_playa;
                      $totalMuestreos = $muestreosDePlaya->count();
                  @endphp
                  <th class="border text-center" colspan="{{ $totalMuestreos * 2 }}">
                     <p> Playa {{ $nombrePlaya }}</p> 
                  </th>
              @endforeach
          </tr>
            
              <tr class="border " >
                @foreach ($muestreos as $muestreo )
                
                <th class="border fmuestreo" colspan="2">
                  <a href="{{route('consulta.muestreo',$muestreo->id_muestreo)}}" >
                    día: {{$muestreo->dia}}<br> 
                    año: {{$muestreo->anio}}<br>
                    zona: {{$muestreo->zona}}
                  </a>
                  </th>
                
                @endforeach
              </tr>
            <tr class="border">
              @foreach ($muestreos as $muestreo )
              <th class="border" colspan="2"># de muestreo: {{$muestreo->num_muestreo}}</th>
              @endforeach
            </tr>
            <tr class="border">
              @foreach ($muestreos as $muestreo )
              <td class="border">cantidad</td>
              <td class="border">porcentaje</td>
              @endforeach
            </tr>
          </thead>
          <tbody>
            @foreach ($clasificaciones as $clasificacion)
            @php
              $residuoFiltrado= $residuos->where('fk_clasificacion',$clasificacion->id_clasificacion);
              $totalResiduos = $residuoFiltrado->count();
              $contador = 0
            @endphp
            @if ($totalResiduos>0)
            <tr >
              <td class="vertical-text" style="max-width: 20px" rowspan="{{$totalResiduos+1}}">{{$clasificacion->nombre_clasificacion}}</td>
            </tr>
            @endif
            

            @foreach ($residuoFiltrado  as   $residuo )
            @php
                // Verifica si es la última fila de la clasificación
                $contador++; // Incrementa el contador en cada iteración
                $ultimaFila = ($contador == $totalResiduos);
               
            @endphp
            <tr style="{{ $ultimaFila ? 'border-bottom: 2px solid black;' : '' }}">
              <td class="text-start" style=" position: sticky; border-right: 2px solid black; min-width: 300px; max-width: 300px ; " >{{$residuo->nombre_tipo}}</td>
                  
              {{-- <td class="text-start" style="background-color: {{$clasificacion->color}} ; position: sticky;">{{$residuo->nombre_tipo}}</td> --}}
                @foreach ($muestreos as  $index => $muestreo)
    
                @php
                // Busca el hallazgo
                $hallazgo = $hallazgos->firstWhere(function ($h) use ($muestreo, $residuo) {
                    return $h->id_muestreo == $muestreo->id_muestreo && $h->id_tipo == $residuo->id_tipo;
                });

    
                $cantidad = $hallazgo ? $hallazgo->cantidad : 0;
                $porcentaje = $hallazgo ? $hallazgo->porcentaje : 0;
    
                    // Actualizar los totales
                    $totales[$index * 2] += $cantidad;
                    $totales[$index * 2 + 1] += $porcentaje;
    
                @endphp
                @if ($hallazgo)
                <td >{{ $hallazgo->cantidad }}</td>
                <td>{{ $hallazgo->porcentaje }}%</td>
                @else
                <td>--</td>
                <td>--</td>
                @endif
                @endforeach
                  
            </tr>
            @endforeach
            @endforeach
            <tr>
              <td></td>
              <td style="position: sticky;">Total</td>
              @foreach ($totales as $total)
              <td><strong>{{ $total }}</strong></td>
              @endforeach
            </tr>
          </tbody>
        </table>
      </div>
      
    
    </div>
  </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


{{-- <script type="text/javascript">
 
</script> --}}
