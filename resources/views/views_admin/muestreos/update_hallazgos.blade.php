@extends('views_admin.app')

@section('title', 'Editar Hallazgos')
@section('navbar')
    @include('layouts.navbar_admin')
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
            <div class="row">
                <div class="col-10 " >
                    <h3 style="color: #B72223">Editar registro</h3>
                </div>
                <div class="col-2 " >
                    <a href="/admin/hallazgos/{{$muestreo->id_muestreo}}" class="btn btn-dark">
                        <i class="bi bi-arrow-left"></i> Regresar
                    </a>
                </div> 
            </div>
            <div class="row centrarh ">
                <div class="col-sm-12  mb-3 centrarh " >
                    <form id="residuosForm" method="POST" action="{{route('admin.hallazgos.update',$muestreo->id_muestreo)}}">
                        @csrf @method('PUT')
                        <div class="row ">
                            <div class="col-sm-1-5 mb-3 " >
                                <label  class="form-label size15"># de muestreo:</label>
                                <input type="number" class="form-control"  name="Nmuestreo" placeholder="# muestreo" required value="{{$muestreo->num_muestreo}}">
                            </div>
                            <div class=" col-sm-2 mb-3 ">
                                <label  class="form-label ">Playa:</label>
                                <select class="form-select" aria-label="Default select example" name="playa"  required>
                                    <option  >Selecciona playa </option>
                                    @foreach ( $playas as $playa)
                                    <option value="{{$playa->id_playa}}" {{$playa->id_playa == $muestreo->fk_playa ? 'selected': ''}}>{{ $playa->nombre_playa}}</option>
                                     @endforeach
                                </select>
                            </div>
                            <div class=" col-sm-2 mb-3 " >
                                <label  class="form-label">Fecha:</label>
                                <input type="date" class="form-control" id="date" name="date" placeholder="Fecha" required value="{{$muestreo->fecha}}">
                            </div>
                            <div class=" col-sm-2 mb-3 ">
                                <label  class="form-label">Día:</label>
                                <select class="form-select" aria-label="Default select example" name="dia"  required>
                                    <option  >Selecciona día</option>
                                    <option value="viernes" {{$muestreo->dia=='viernes'?'selected':''}}>viernes</option>
                                    <option value="sabado" {{$muestreo->dia=='sabado'?'selected':''}}>sabado</option>
                                    <option value="domingo" {{$muestreo->dia=='domingo'?'selected':''}}>domingo</option>
                                </select>
                            </div>
                            <div class=" col-sm-2-5 mb-3 ">
                                <label  class="form-label">Zona:</label>
                                <select class="form-select" aria-label="Default select example" name="zona"  required>
                                    <option value="Debajo pleamar" {{$muestreo->zona=='Debajo pleamar'?'selected':''}}>Debajo pleamar</option>
                                    <option value="Encima pleamar" {{$muestreo->zona=='Encima pleamar'?'selected':''}}>Encima pleamar</option>
                                    <option value="Encima de la pleamar, hasta estructura fija" {{$muestreo->zona=='Encima de la pleamar, hasta estructura fija'?'selected':''}}>Encima de la pleamar, hasta estructura fija</option>
                                    <option value="Sobre y debajo de la pleamar" {{$muestreo->zona=='Sobre y debajo de la pleamar'?'selected':''}}>Sobre y debajo de la pleamar</option>
                                </select>
                            </div>
                            <div class=" col-sm-2 mb-3 " >
                                <label  class="form-label">Visible: 
                                    <i class="bi bi-info-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Visible: Muestra los datos en el mapa principal"></i>
                                </label>
                                <select class="form-select" aria-label="Default select example" name="autorizado"  required>
                                    <option  >Selecciona opción</option>
                                    <option value="1" {{$muestreo->autorizado=='1'?'selected':''}}>Habilitado</option>
                                    <option value="0" {{$muestreo->autorizado=='0'?'selected':''}}>Deshabilitado</option>
                                </select>
                            </div>
                        </div>
                        <div class="row centrarh ">
                            <div class="col-10 ">
                                <div class="row mb-3">
                                    <div class="col-md-5">
                                        <h5>Residuo</h5>
                                    </div>
                                    <div class="col-md-2">
                                        <h5>Cantidad</h5>
                                    </div>
                                    <div class="col-md-2">
                                        <h5>Porcentaje</h5>
                                    </div>
                                    <div class="col-md-3">
                                    </div> 
                                </div>
                                @php
                                $totalC=0
                                @endphp
                                @foreach ($hallazgos as $hallazgo)
                                <div class="row mb-3 row1">
                                    <div class="col-md-5">
                                        <select name="hallazgosE[{{$hallazgo->id_hallazgo}}]" class="form-select" required>
                                            <option value="" disabled  >Selecciona un residuo </option>
                                            @foreach ($residuos as $residuo)
                                            <option value="{{$residuo->id_tipo}}" {{$residuo->id_tipo == $hallazgo->fk_tipo ? 'selected': ''}}>{{$residuo->nombre_tipo}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="inputC form-control " type="number" name="cantidadesE[{{$hallazgo->id_hallazgo}}] " value="{{$hallazgo->cantidad}}" {{$totalC+=$hallazgo->cantidad}} min="0" onchange="updateTotals()" required>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="inputC  form-control " type="text"   name="porcentajesE[{{$hallazgo->id_hallazgo}}]" value="{{$hallazgo->porcentaje}} %" min="0" onchange="updateTotals()" >
                                    </div>
                                    <div class="col-md-3">
                                    </div> 
                                </div>
                                @endforeach
                                <div id="residuosContainer">
                                
                                </div>
                                <div class="row mb-3 " style="border-top: 1px solid">
                                    <div class="col-md-5 mt-3">
                                        <p>Total:</p>
                                    </div>
                                    <div class="col-md-2 mt-3">
                                        <label class=" form-control" id="totalC">{{$totalC}}</label>
                                    </div>
                                    <div class="col-md-2 mt-3">
                                        <label class=" form-control" id="totalP">0%</label>
                                    </div>
                                    <div class="col-md-3">
                                    </div>
                                </div>
                                <div class="">
                                    <button type="button" class="btn btn-danger" id="addMore" style="width: 200px" >Agregar más</button>
                                    <button type="submit" class="btn btn-secondary" style="width: 200px"> Guardar </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>  
    </div>
</div>
@endsection
<script>
    window.residuos = @json($residuos);
  </script>