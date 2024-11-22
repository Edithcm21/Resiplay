@extends('views_admin.app')

@section('title', 'Municipios')

@section('navbar')
    @include('layouts.navbar_admin')
@endsection

@section('content' )
<div class="row justify-content-center align-items-center p-4"  >
    <div class="col-md-12 p-2 " style=" background-color:white;min-height: 72vh  " >
        <div class="container  " >
            <div class="row">
                <div class="col-md-4 " >
                    <h2 style="color: #B72223" class="m-2 aling-center">Municipios</h2>
                    <div class="row" >
                        <div class="col-sm-12 col-lg-12 mt-4 card"   >
                            <form class="row mb-4"method="POST" action="{{route('admin.municipios.store')}}">
                            @csrf
                                <div class=" col-sm-12 mb-3 pt-4">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Nombre de municipio" maxlength="23" required>
                                </div>
                                <div class=" col-sm-12 mb-4 pt-4">
                                    <select class="form-select" aria-label="Default select example" name="estado" required>
                                        <option value="" selected>Selecciona Estado</option>
                                        @foreach ( $estados as $estado)
                                        <option value="{{$estado->id_estado}}">{{ $estado->nombre_estado }}</option>
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
                        <div class="col-12  table-responsive card">
                            <table class="table table-striped ">
                                  <thead>
                                      <tr>
                                          <th>ID</th>
                                          <th>Municipio</th>
                                          <th>Estado</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                  @foreach($municipios as $municipio)
                                      <tr>
                                          <td>{{$municipio->id_municipio}}</td>
                                          <td>{{$municipio->nombre_municipio}}</td>
                                          <td>{{$municipio->estado->nombre_estado }}</td>
                                          <td>
                                              <button class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{$municipio->id_municipio}}" data-bs-id="{{$municipio->id_municipio}}">Editar</button>
                                                <!-- Modal Edit -->
                                              <div class="modal fade" id="editModal{{$municipio->id_municipio}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" style="color: #B72223" id="exampleModalLabel">Editar Usuario</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form class=" mb-3 "method="POST" action="{{route('admin.municipios.update',$municipio->id_municipio)}}">
                                                            @csrf @method('PUT')
                                                            <div class="mb-3">
                                                                <label  class="form-label">Municipio</label>
                                                                <input type="text" class="form-control"  name="modalName" placeholder="Municipio" required value="{{$municipio->nombre_municipio}}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label  class="form-label">Estado</label>
                                                                <select class="form-select" aria-label="Default select example" name="modalEstado">
                                                                    <option value="{{$municipio->estado->id_estado}}" selected>{{$municipio->estado->nombre_estado }}</option>
                                                                    @foreach ( $estados as $estado)
                                                                    <option value="{{$estado->id_estado}}">{{ $estado->nombre_estado }}</option>
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
                                              <button class="btn btn-danger    btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" data-bs-id="{{$municipio->id_municipio}}">Eliminar</button> 
                                          </td>
                                      </tr>
                                  @endforeach 
                                  </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                {{ $municipios->links('pagination::bootstrap-5') }}
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
                <form id="formDelete"  data-action="{{route('admin.municipios.delete',1)}}" method="POST">
                    @csrf 
                    <button type="submit" class="btn btn-secondary btn-sm" >Eliminar</button>
                </form>
                <button type="submit" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div> 
@endsection


    
