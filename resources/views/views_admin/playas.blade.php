@extends('views_admin.app')

@section('title', 'Playas')

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
                <div class="row"  >
                    <div class="col-sm-12 col-lg-12 mt-4"   >
                        <h3 style="color: #B72223">Playas</h3>
                        <form class="row mb-3"method="POST" action="{{route('admin.Playas.store')}}">
                        @csrf
                            <div class=" col-sm-2 mb-3" >
                                <input type="text" class="form-control" id="nombre_playa" name="nombre_playa" placeholder="Nombre" required maxlength="25">
                            </div>
                            <div class=" col-sm-2 mb-3"  >
                                <input type="text" class="form-control" id="latitud" name="latitud" placeholder="latitud"  required minlength="10" maxlength="10">
                            </div>
                            <div class=" col-sm-2 mb-3" >
                                <input type="text" class="form-control" id="longitud" name="longitud" placeholder="longitud"  required  minlength="10" maxlength="10">
                            </div>
                            <div class=" col-sm-2 mb-3 ">
                                <select class="form-select" aria-label="Default select example" name="municipio"  >
                                    <option  >Municipio</option>
                                    @foreach ( $municipios as $municipio)
                                    <option value="{{$municipio->id_municipio}}">{{ $municipio->nombre_municipio }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class=" col-sm-2 mb-3 ">
                                <select class="form-select" aria-label="Default select example" name="region">
                                    <option  >Region</option>
                                    @foreach ( $regiones as $region)
                                    <option value="{{$region->id_region}}">{{ $region->nombre_region }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-2 mb-3 " >
                                <button type="submit" class="btn btn-secondary btn-sm">Agregar</button>
                            </div>
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
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($playas as $playa)
                                    <tr>
                                    <td>{{$playa->id_playa}}</td>
                                    <td>{{$playa->nombre_playa}}</td>
                                    <td>{{$playa->region->nombre_region}}</td>
                                    <td>{{$playa->municipio->nombre_municipio}}</td>
                                    <td>{{$playa->latitud}}</td>
                                    <td>{{$playa->longitud}}</td>
                                    <td>
                                        <button class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{$playa->id_playa}}" data-bs-id="{{$playa->id_playa}}">Editar</button>
                                        <!-- Modal Edit -->
                                        <div class="modal fade" id="editModal{{$playa->id_playa}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Editar Playa</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class=" mb-3 "method="POST" action="{{route('admin.Playas.update',$playa->id_playa)}}">
                                                          @csrf @method('PUT')
                                                            <div class="mb-3">
                                                                <label  class="form-label">Nombre</label>
                                                                <input type="text" class="form-control"  name="modalNombre_playa" placeholder="Nombre" required value="{{$playa->nombre_playa}}">
                                                            </div>
                                                            <div class="mb-3 ">
                                                                <label for="modalLatitud" class="form-label">Latitud</label>
                                                                <input type="text" class="form-control"  name="modalLatitud" placeholder="Latitud"  required value="{{$playa->latitud}}">
                                                            </div>
                                                            <div class="mb-3 ">
                                                                <label for="modalLongitud" class="form-label">Longitud</label> 
                                                                <input type="text" class="form-control" name="modalLongitud" id="modalLongitud" placeholder="Longitud" value="{{$playa->longitud}}">
                                                            </div>
                                                            <div class="mb-3 ">
                                                                <label for="modalMunicipio" class="form-label">Municipio</label>
                                                                <select  class="form-control " name="modalMunicipio"   required>
                                                                    <option value="{{$playa->municipio->id_municipio}}" selected>{{$playa->municipio->nombre_municipio}}</option>
                                                                    @foreach ( $municipios as $municipio)
                                                                    <option value="{{$municipio->id_municipio}}">{{ $municipio->nombre_municipio}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="mb-3 ">
                                                                <label for="modalRegion" class="form-label">Region</label>
                                                                <select  class="form-control " name="modalRegion"  >
                                                                    <option value="{{$playa->region->id_region}}" selected>{{$playa->region->nombre_region}}</option>
                                                                    @foreach ( $regiones as $region)
                                                                    <option value="{{$region->id_region}}">{{ $region->nombre_region}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-danger btn-sm"> Actualizar </button>
                                                                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancelar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-danger    btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" data-bs-id="{{$playa->id_playa}}">Eliminar</button> 
                                    </td>
                                    </tr>
                                @endforeach 
                            </tbody>
                        </table>
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
                <form id="formDelete"  data-action="{{route('admin.Playas.delete',1)}}" method="POST">
                @csrf 
                    <button type="submit" class="btn btn-secondary btn-sm" >Eliminar</button>
                </form>
                <button type="submit" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div> 
@endsection


    
