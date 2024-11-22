@extends('views_admin.app')

@section('title', 'Inicio')

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
                    <h3 style="color: #B72223">Área de usuarios</h3>
                    <form class="row mb-3"method="POST" action="{{route('admin.usuarios.store')}}">
                        @csrf
                        <div class=" col-sm-3 mb-3" >
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
                        </div>
                        <div class=" col-sm-3 mb-3"  >
                            <input type="email" class="form-control" id="correo" name="correo" placeholder="Correo electrónico"  required>
                        </div>
                        
                        <div class=" col-sm-2 mb-3" >
                            <input type="text" class="form-control" id="password" name="password" placeholder="password"  required  minlength="8" >
                        </div>
                        <div class=" col-sm-2 mb-3 " >
                            <select  class="form-select " name="rol"   required >
                                <option selected value="capturista">Capturista</option>
                                <option value="admin">Administrador</option>
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
                                <th>Usuario</th>
                                <th>Correo electrónico</th>
                                <th>Constraseña</th>
                                <th>Rol</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($usuarios as $usuario)
                            <tr>
                                <td>{{$usuario->id}}</td>
                                <td>{{$usuario->name}}</td>
                                <td>{{$usuario->email}}</td>
                                <td>********</td>
                                <td>{{$usuario->rol}}</td>
                                <td>
                                  <button class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{$usuario->id}}" data-bs-id="{{$usuario->id}}">Editar</button>
                                    <!-- Modal Edit -->
                                    <div class="modal fade" id="editModal{{$usuario->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                          </div>
                                          <div class="modal-body">
                                            <form class=" mb-3 "method="POST" action="{{route('admin.usuarios.update',$usuario->id)}}">
                                              @csrf @method('PUT')
                                              <div class="mb-3">
                                                <label  class="form-label">Nombre</label>
                                                <input type="text" class="form-control"  name="modalName" placeholder="Nombre" required value="{{$usuario->name}}">
                                              </div>
                                              <div class="mb-3 ">
                                                <label for="modalCorreo" class="form-label">Correo</label>
                                                <input type="email" class="form-control"  name="modalCorreo" placeholder="Correo electrónico"  required value="{{$usuario->email}}">
                                              </div>
                                              <div class="mb-3 ">
                                                <label for="modalPassword" class="form-label">Contraseña</label> 
                                                <input type="text" class="form-control" name="modalPassword" id="modalPassword" placeholder="si no deseas editar dejar en blanco" value="">
                                              </div>
                                              <div class="mb-3 ">
                                                <label for="modalRol" class="form-label">Rol de usuario</label>
                                                <select  class="form-control " name="modalRol"   required  value="{{$usuario->rol}}">
                                                  <option value="capturista" {{ $usuario->rol == 'capturista' ? 'selected' : '' }}>Capturista</option>
                                                  <option value="admin" {{ $usuario->rol == 'admin' ? 'selected' : '' }}>Administrador</option>
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
                                  <button class="btn btn-danger    btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" data-bs-id="{{$usuario->id}}">Eliminar</button> 
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
          <form id="formDelete"  data-action="{{route('admin.usuarios.delete',1)}}" method="POST">
            @csrf 
            <button type="submit" class="btn btn-secondary btn-sm" >Eliminar</button>
          </form>
          <button type="submit" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div> 
@endsection


    
