@extends('views_admin.app')

@section('title', 'Editar perfil')

@section('navbar')
    @include('layouts.navbar_capturista')
@endsection

@section('content' )
    <div class="row justify-content-center align-items-center p-4"  >
        <div class="col-md-8 p-2 " style=" background-color:white;min-height: 73vh  " >
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
                        <form class="row mb-3 justify-content-center align-items-center"method="POST" action="{{route('perfil.update')}} " id="form_perfilEdit" >
                        @csrf
                        <div class="col-sm-8">
                            <h3 style="color: #B72223">Editar perfil</h3>
                            <div class=" form-group mb-3" >
                                <label class="form-label"> Nombre completo:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required value="{{Auth::user()->name}}">
                            </div>
                            <div class=" form-group mb-3"  >
                                <label class="form-label">Correo:</label>
                                <input type="email" class="form-control" id="correo" name="correo" placeholder="Correo electrónico"  required value="{{Auth::user()->email}}">
                            </div>
                        
                            <div class="form-group mb-3">
                                <label for="password">Nueva Contraseña (opcional)</label>
                                <input type="password" class="form-control" id="password" name="password" minlength="8">
                            </div>
                    
                            <div class="form-group mb-3">
                                <label for="password_confirmation">Confirmar Contraseña</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"  minlength="8">
                                <small id="igual" class="text-danger" style="display:none;">Las contraseñas no coinciden.</small>
                            </div>
                                <button type="submit" class="btn  btn-secondary border" style="width: 100%">Guardar Cambios</button>
                         
                        </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
