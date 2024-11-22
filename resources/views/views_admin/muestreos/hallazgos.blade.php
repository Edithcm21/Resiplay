@extends('views_admin.app')

@section('title', 'Hallazgo')

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
            <div class="row m-4"  >
                <div class="col-sm-5 mt-4"   >
                    <h3 style="color: #B72223">Playa {{$muestreo->playa->nombre_playa}}</h3>   
                </div>
                <div class="col-sm-2  mt-4 "  >
                    <a href="/admin/hallazgos/edit/{{$muestreo->id_muestreo}}">
                        <button type="submit" class="btn  btn-secondary " style="width: 100%; ">Editar</button>
                    </a>
                </div> 
                <div class="col-sm-2-5 mt-4 "  >
                    <button class="btn  btn-danger " type="button" data-bs-toggle="modal" data-bs-target="#deleteModalHallazgos"  style="width: 100%; ">Eliminar Registro</button>
                   
                </div> 
                <div class="col-sm-2 mt-4" >
                    <a href="/admin/muestreos" class="btn btn-dark"  style="width: 100%; ">
                        <i class="bi bi-arrow-left"></i> Regresar
                    </a>
                </div>
            </div>
            <div class="row">
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
                <div class="mb-3 mt-1 col-sm-3 ">
                    <input type="text" readonly class="form-control text-center alert {{ $muestreo->autorizado == 1 ? 'alert-success' : 'alert-secondary' }}" id="autorizado" value="{{$autorizado}}" >
                </div>
            </div>
            <div class="row centrarh">
                <div class="col-8 mt-4 ">
                    <table class="table table-striped table-responsive border">
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
                            @endphp
                            @foreach ($clasificaciones as $clasificacion)
                                @php
                                $hallazgosFiltrados = $hallazgos->where('id_clasificacion',$clasificacion->id_clasificacion);
                                $total=$hallazgosFiltrados->count();
                                $first = true; 
                                @endphp
                                @if($total>0)
                                    @foreach ($hallazgosFiltrados as $hallazgo)
                                        <tr style="">
                                        @if ($first)
                                            <td rowspan="{{$total}}">{{$clasificacion->nombre_clasificacion}} </td>
                                            @php 
                                                $first = false; 
                                                $totalC +=$hallazgo->cantidad;
                                                $totalP +=$hallazgo->porcentaje
                                            @endphp 
                                        @endif
                                            <td>{{$hallazgo->nombre_tipo}}</td>
                                            <td>{{$hallazgo->cantidad}}</td>
                                            <td>{{$hallazgo->porcentaje}}</td>
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
        </div>
    </div>
</div>

 {{-- Modal de advertencia  --}}
 <div class="modal fade" id="deleteModalHallazgos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="border: none">
          <h5 class="modal-title" id="exampleModalLabel">Se eliminarán todos los datos del muestreo </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <h6>¿Estas seguro de eliminar el registro?</h6>
          
        </div>
        
        <div class="modal-footer" style="border: none">
          <form id="formDelete"  action="{{route('admin.hallazgos.delete',$muestreo->id_muestreo)}}" method="POST">
            @csrf 
            <button type="submit" class="btn btn-secondary btn-sm" >Eliminar</button>
          </form>
          <button type="submit" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div> 
@endsection
