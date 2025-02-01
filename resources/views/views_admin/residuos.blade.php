@extends('views_admin.app')

@section('title', 'Residuos')

@section('navbar')
    @include('layouts.navbar_admin')
@endsection

@section('content' )
    <div class="row justify-content-center align-items-center p-4"  >
        <div class="col-md-12 p-2 " style=" background-color:white;min-height: 72vh  " >
            <div class="container  " >
                <div class="row">
                    <div class="col-md-4 " >
                        <h2 style="color: #B72223" class="m-2 aling-center">Residuos</h2>
                        <div class="row" >
                            <div class="col-sm-12 col-lg-12 mt-4 card"   >
                                <form class="row mb-4"method="POST" action="{{route('admin.Tipo_residuos.store')}}">
                                    @csrf
                                    <div class=" col-sm-12 mb-3 pt-4">
                                        <input type="text" class="form-control" id="nombre_tipo" name="nombre_tipo" placeholder="Residuo" maxlength="100" required>
                                    </div>
                                    <div class=" col-sm-12 mb-4 pt-4">
                                        <select class="form-select" aria-label="Default select example" name="fk_clasificacion" required>
                                        <option value="" selected>Selecciona clasificación</option>
                                        @foreach ( $clasificaciones as $clasificacion)
                                        <option value="{{$clasificacion->id_clasificacion}}">{{ $clasificacion->nombre_clasificacion }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-12 col-8 pt-4" >
                                        <button type="submit" class="btn btn-secondary btn-sm">Agregar</button>  
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row"  style=" height: 10% ">
                            <div class="col-sm-12 col-lg-12 mt-4"   >
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
                    </div>
                    <div class="col-md-1">

                    </div>
                    <div class="col-md-7  p-2">
                        <div class="row">
                            <div class="col-12  table-responsive card"style="max-height: 65vh" >
                                <table class="table table-striped size12" >
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Residuo</th>
                                            <th>Clasificacion</th>
                                            <th >Editar</th>
                                            <th >Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody class="">
                                        @foreach($tipo_residuos as $tipo_residuo)
                                        <tr class="">
                                            <td class="">{{$tipo_residuo->id_tipo}}</td>
                                            <td class="">{{$tipo_residuo->nombre_tipo}}</td>
                                            <td class="">{{$tipo_residuo->clasificacion->nombre_clasificacion }}</td>
                                            <td class=" border  ">
                                                <button class="btn btn-secondary btn-sm size12" data-bs-toggle="modal" data-bs-target="#editModal{{$tipo_residuo->id_tipo}}" data-bs-id="{{$tipo_residuo->id_tipo}}">Editar</button>
                                                <!-- Modal Edit -->
                                                <div class="modal fade" id="editModal{{$tipo_residuo->id_tipo}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" style="color: #B72223" id="exampleModalLabel">Editar tipo de residuo</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form class=" mb-3 "method="POST" action="{{route('admin.Tipo_residuos.update',$tipo_residuo->id_tipo)}}">
                                                                    @csrf @method('PUT')
                                                                    <div class="mb-3">
                                                                        <label  class="form-label">Tipo de residuo</label>
                                                                        <input type="text" class="form-control"  name="modalTipo_residuo" placeholder="tipo de residuo" required value="{{$tipo_residuo->nombre_tipo}} " maxlength="100">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label  class="form-label">Clasificacion</label>
                                                                        <select class="form-select" aria-label="Default select example" name="modalFk_clasificacion">
                                                                            <option value="{{$tipo_residuo->clasificacion->id_clasificacion}}" selected>{{$tipo_residuo->clasificacion->nombre_clasificacion}}</option>
                                                                            @foreach ( $clasificaciones as $clasificacion)
                                                                            <option value="{{$clasificacion->id_clasificacion}}">{{ $clasificacion->nombre_clasificacion }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="mb-3 text-end">
                                                                        <button type="submit" class="btn btn-danger btn-largo "> Actualizar </button>
                                                                        <button type="button" class="btn btn-secondary btn-largo " data-bs-dismiss="modal">Cancelar</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><button class="btn btn-danger size12  btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" data-bs-id="{{$tipo_residuo->id_tipo}}">Eliminar</button> </td>
                                        </tr>
                                        @endforeach 
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {{-- {{ $municipios->links('pagination::bootstrap-5') }} --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

  {{-- Modal de advertencia  --}}
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="border: none">
                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h6>¿Estas seguro de eliminar el registro?</h6>
          
                </div>
        
                <div class="modal-footer" style="border: none">
                    <form id="formDelete"  data-action="{{route('admin.Tipo_residuos.delete',1)}}" method="POST">
                        @csrf 
                        <button type="submit" class="btn btn-secondary btn-sm" >Eliminar</button>
                    </form>
                    <button type="submit" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div> 
@endsection

