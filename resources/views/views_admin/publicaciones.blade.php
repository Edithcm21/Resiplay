@extends('views_admin.app')

@section('title', 'Publicaciones')

@section('navbar')
    @include('layouts.navbar_admin')
@endsection

@section('content' )
    <div class="row justify-content-center align-items-center p-4"  >
        <div class="col-md-10 p-2 " style=" background-color:white; " >
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
                        <h3 style="color: #B72223">Nuevo registro</h3>
                        <form class=" mb-3"method="POST" action="{{route('admin.publicaciones.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class=" col-sm-4 mb-3" >
                                <label class="label-control">Título dela publicaión</label>
                                <textarea class="form-control" id="titulo" name="titulo" placeholder="Título de la publicación" required maxlength="100"></textarea>
                            </div>
                            <div class=" col-sm-8 mb-3"  >
                                <label class="label-control">Descripción</label>
                                <textarea class="form-control" placeholder="Descripción" id="descripcion" name="descripcion" maxlength="500" required></textarea>
                                {{-- <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripción"  required maxlength="1000"> --}}
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-sm-4 mb-3" >
                                <label class="label-control">Autores</label>
                                <textarea  class="form-control" id="autores" name="autores" placeholder="autores"  required  maxlength="100"></textarea>
                            </div>
                            <div class=" col-sm-2 m-3" >
                                <label class="label-control">Fecha de publicación</label>
                                <input type="date" class="form-control mt-2" id="fecha" name="fecha" placeholder="Fecha de publicacion"  required>
                            </div>
                            <div class="col-sm-3 mt-3 ">
                                <label for="archivo" class="form-label">Archivo</label> 
                                <input type="file" class="form-control m-0" name="archivo" id="archivo" accept="application/pdf"  required>
                            </div>
                            <div class="col-sm-2 mt-4 " >
                                <div class="mb-4"></div>
                                <button type="submit" class="btn btn-secondary btn-sm" style="width: 90%">Agregar</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-10 p-2 mt-4" style=" background-color:white; " >
            <div class="row">
                <h3 style="color: #B72223">Publicaciones</h3>
                <div class="col-12 mt-4 table-responsive">
                    <table class="table table-striped ">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Titulo</th>
                                <th>Descripcion</th>
                                <th>Autores</th>
                                <th>Fecha de publicación</th>
                                <th>Archivo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($publicaciones as $publicacion)
                                <tr>
                                <td>{{$publicacion->id}}</td>
                                <td>{{$publicacion->titulo}}</td>
                                <td>{{$publicacion->descripcion}}</td>
                                <td>{{$publicacion->autores}}</td>
                                <td>{{$publicacion->fecha}}</td>
                                <td><a href="{{ Storage::url($publicacion->file) }}" class="btn btn-sm btn-dark" target="_blank" style="width: 100%">Ver</a></td>
                                <td>
                                    <button class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{$publicacion->id}}" data-bs-id="{{$publicacion->id}}">Editar</button>
                                    <!-- Modal Edit -->
                                    <div class="modal fade" id="editModal{{$publicacion->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Editar datos </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form class=" mb-3 "method="POST" action="{{route('admin.publicaciones.update',$publicacion->id)}}" enctype="multipart/form-data">
                                                    @csrf @method('PUT')
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label  class="form-label">Titulo </label>
                                                                <textarea  class="form-control"  name="modalTitulo"required  maxlength="100">{{$publicacion->titulo}}</textarea>
                                                            </div>
                                                            <div class="mb-3 ">
                                                                <label for="modalDescripcion" class="form-label">Descripción</label>
                                                                <textarea  class="form-control"  name="modalDescripcion" required  maxlength="500">{{$publicacion->descripcion}}</textarea>
                                                            </div>
                                                            <div class="mb-3 ">
                                                                <label for="modalAutores" class="form-label">autores</label> 
                                                                <textarea class="form-control" name="modalAutores" id="modalAutores"  required  maxlength="100">{{$publicacion->autores}}</textarea>
                                                            </div>
                                                            <div class="mb-3 ">
                                                                <label for="modalFecha" class="form-label">Fecha de publicación</label> 
                                                                <input type="date" class="form-control" name="modalFecha" id="modalFecha"  value="{{$publicacion->fecha}}">
                                                            </div>
                                                            <div class="mb-3 ">
                                                                <label for="modalArchivo" class="form-label">Archivo (Dejar en blanco sino desea cambiarlo)</label> 
                                                                <input type="file" class="form-control" name="modalArchivo" id="modalArchivo" accept="application/pdf"  >
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer  ">
                                                            <button type="submit" class="btn btn-danger btn-modal"> Actualizar </button>
                                                            <button type="button" class="btn btn-secondary btn-modal" data-bs-dismiss="modal">Cancelar</button>
                                                        </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-danger    btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" data-bs-id="{{$publicacion->id}}">Eliminar</button> 
                                </td>
                                </tr>
                            @endforeach 
                        </tbody>
                    </table>
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
                <form id="formDelete"  data-action="{{route('admin.publicaciones.delete',1)}}" method="POST">
                @csrf 
                    <button type="submit" class="btn btn-secondary btn-sm" >Eliminar</button>
                </form>
                <button type="submit" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div> 
@endsection


    
