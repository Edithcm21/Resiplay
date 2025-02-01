@extends('layouts.app')

@section('title', 'Login')

{{-- @section('navbar')
    @include('layouts.navbar_prueba')
@endsection --}}

@section('content')
<div  class=" gradient-form login" style="background-color: #eee;">
    <div class="container-fluid row p-4 pb-1">
        <div class="col-12 col-sm-2 " >
            <a href="/" class="btn btn-dark" style="width: 100%">
                <i class="bi bi-arrow-left"></i> Inicio
            </a>
        </div>
    </div>
    <div class="container pb-4">
        <div class="row d-flex  justify-content-center align-items-center ">
            <div class="col-xl-5" >
                <div class="card rounded-3 text-black color-login">
                    <div class="row g-0 " >
                        <div class="col-lg-12  " >
                            <div class="card-body p-md-4 mx-md-4 ">
                                <div class="text-center">
                                    <img src="{{ asset('images/Logo-ResiPlay.png') }}" style="width: 180px;" alt="logo">
                                    <h3 class="mt-1 mb-3 pb-1">Iniciar Sesion</h3>
                                </div>
                              
                                <form action="{{ route('login') }}" method="POST">
                                    @csrf
                                    @if ($errors->any())
                                    <div class="alert alert-danger  fade show myAlert" role="alert" id="myAlert">
                                        @foreach ($errors->all() as $error)
                                          {{ $error }}
                                          @endforeach
                                    </div>
                                    @endif 
                                    <div class="form-outline mb-2">
                                        <label class="form-label" for="email">Correo</label>
                                      
                                        <input type="email" name="email" id="email" class="form-control" minlength="5" required/>
                                    </div>

                                    <div class="form-outline mb-2">
                                      <label class="form-label" for="password">Contraseña</label>
                                      <input type="password" name="password" id="password" class="form-control" required />
                                    </div>

                                    <div class="text-center pt-1 mb-3 pb-1">
                                      <input type="submit" id="navbutton2" class=" btn-blue btn-largo  " name="accion" value="ingresar">
                                      
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
