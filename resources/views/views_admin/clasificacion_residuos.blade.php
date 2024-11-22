@extends('views_admin.app')

@section('title', 'Clasificacion de residuos')

@section('navbar')
    @include('layouts.navbar_admin')
@endsection

@section('content' )
  <div class="row justify-content-center align-items-center p-4"  >
    <div class="col-md-12 p-2 " style=" background-color:white;min-height: 72vh  " >
        <div class="container  " >
            <div class="row">
                <div class="col-md-4 " >
                    <h2 style="color: #B72223" class="mt-2 aling-center">Clasificación de residuos </h2>
                    <div class="row" >
                      <div class="col-sm-12 col-lg-12 mt-4 card"   >
                            <form class="row mb-4"method="POST" action="{{route('admin.Clasificacion.store')}}">
                                @csrf
                                <h4 style="color: var(--negro)" class="m-2 aling-center">Agregar nueva clasificacion</h4>
                                <div class=" col-sm-12 mb-3 pt-4">
                                    <input type="text" class="form-control" id="nombre_clasificacion" name="nombre_clasificacion" placeholder="Nombre de la clasificacion" maxlength="40" required>
                                </div>
                                <div class="col-sm-12 mb-3 pt-4">
                                    <label for="color">Elige un color:</label>
                                    <input type="color" id="color" name="color" value="#ffffff">
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
                <div class="col-md-1"></div>
                <div class="col-md-7 " >
                    <div class="row">
                        <div class="col-12  table-responsive card">
                            <table class="table table-striped ">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Clasificacion</th>
                                        <th>Color</th>                                   
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($clasificaciones as $clasificacion)
                                    <tr>
                                        <td>{{$clasificacion->id_clasificacion}}</td>
                                        <td style="background-color: {{$clasificacion->color}}">{{$clasificacion->nombre_clasificacion}}</td>
                                       
                                        
                                        <td>
                                            <button class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{$clasificacion->id_clasificacion}}" data-bs-id="{{$clasificacion->id_clasificacion}}">Editar</button>
                                                <!-- Modal Edit -->
                                            <div class="modal fade" id="editModal{{$clasificacion->id_clasificacion}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" style="color: #B72223" id="exampleModalLabel">Editar clasificación de residuos</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form class=" mb-3 "method="POST" action="{{route('admin.Clasificacion.update',$clasificacion->id_clasificacion)}}">
                                                              @csrf @method('PUT')
                                                              <div class="mb-3">
                                                                <label  class="form-label">Clasificación de residuos</label>
                                                                <input type="text" class="form-control"  name="modalClasificacion" placeholder="Clasificación"  value="{{$clasificacion->nombre_clasificacion}}">
                                                              </div>
                                                              <div class="mb-3 ">
                                                                <label for="modalColor">Elige un color:</label>
                                                                <input type="color" id="modalcolor" name="modalColor" value="{{$clasificacion->color}}">
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
                                            <button class="btn btn-danger    btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" data-bs-id="{{$clasificacion->id_clasificacion}}">Eliminar</button> 
                                        </td>
                                    </tr>
                                @endforeach 
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                {{-- {{ $clasificaciones->links('pagination::bootstrap-5') }} --}}
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
          <form id="formDelete"  data-action="{{route('admin.Clasificacion.delete',1)}}" method="POST">
            @csrf 
            <button type="submit" class="btn btn-secondary btn-sm" >Eliminar</button>
          </form>
          <button type="submit" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div> 
@endsection