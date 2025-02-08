@extends('views_capturista.app')

@section('title', 'Muestreos')

@section('navbar')
    @include('layouts.navbar_capturista')
@endsection

@section('content' )
  <div class="row justify-content-center align-items-center p-4"  >
    <div class="col-md-10 p-2 " style=" background-color:white;min-height: 74vh  " >
        <div class="container  " >
            <div class="row">
                <div class="col-12 "  style=" height: 10vh">
                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show myAlert" role="alert" id="myAlert"> 
                             {{ session('error') }}
                        </div>
                    @endif
                    <!-- Mensajes de éxito -->
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show myAlert" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="row"  >
                <div class="col-sm-8 col-lg-8 mt-4"   >
                    <h3 style="color: #B72223">Resultados de los muestreos</h3>
                </div>
                <div class="col-sm-4 col-lg-4 mt-4"   >
                  <a href="{{route('capturista.hallazgo.create')}}">
                    <button type="submit" class="btn  btn-outline-danger " style="width: 60%; ">Agregar muestreo</button> 
                  </a> 
              </div>
            </div>
            <div class="row">
                <div class="col-sm-4 m-1 p-1 pb-0 mb-0">
                    <form id="FiltroPlayaForm" method="get" action="{{route('admin.muestreos.show')}}" >
                        <select  id="Selectplaya" class="form-select" name="id" onchange="submitFormPlayas()">
                            <option value="0">Selecciona playa</option>
                            @foreach ($playas as $playa)
                          <option value="{{$playa->id_playa}}">{{ $playa->nombre_playa }}</option>
                          @endforeach
                            <option value="0">Todas</option>
                        </select>
                    </form>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-12 mt-4 table-responsive">
                    <table class="table table-striped ">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Playa</th>
                                <th>Region</th>
                                <th>Municipio</th>
                                <th>Latitud</th>
                                <th>Longitud</th>
                                <th>N° de muestreo</th>
                                <th>Zona</th>
                                <th>Fecha/año</th>
                                <th>dia</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($muestreos as $muestreo)
                            <tr>
                                <td>{{$muestreo->id_muestreo}}</td>
                                <td>{{$muestreo->playa->nombre_playa}}</td>
                                <td>{{$muestreo->playa->region->nombre_region}}</td>
                                <td>{{$muestreo->playa->municipio->nombre_municipio}}</td>
                                <td>{{$muestreo->playa->latitud}}</td>
                                <td>{{$muestreo->playa->longitud}}</td>
                                <td>{{$muestreo->num_muestreo}}</td>
                                <td>{{$muestreo->zona}}</td>
                                <td>{{$muestreo->fecha}}</td>
                                <td>{{$muestreo->dia}}</td>
                                <td><a href="{{route('capturista.hallazgos',$muestreo->id_muestreo)}}"> Más...</a> </td>
                            </tr>
                                
                            @endforeach 
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
