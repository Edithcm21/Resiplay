@extends('layouts.app')

@section('title', 'Publicaciones')

@section('navbar')
    @include('layouts.navbar_prueba')
@endsection

@section('content')
<br>

<div class="container-fluid ">
    <h1 class=" fw-bold">PUBLICACIONES</h1>
    <div class="row p-5 " >
    @foreach ($publicaciones as $publicacion)
    <div class="col-sm-6">
        <div class=" mb-3 card-red " style="max-width: 100%;">
            <div class="row g-0">
              <div class="col-md-4 my-auto mx-auto">
                <a href="{{ Storage::url($publicacion->file) }}">
                    <img src="{{Storage::url($publicacion->img)}}" alt="" style="max-width: 100%" class="img-fluid rounded-start">
                </a>
              </div>
              <div class="col-md-6 ">
                <div class="card-body ">
                    <h3 class="card-title text-red fw-bold">{{$publicacion->titulo}}</h3>
                    <h5 class="card-text">{{$publicacion->descripcion}}<br></h5>
                    <h6 class="card-text"><small class="text-muted">autores: {{$publicacion->autores}} <br> fecha: {{$publicacion->fecha}}</small></h6>
                  {{-- <a href="{{ Storage::url($publicacion->file) }}" class="btn btn-sm btn-dark" target="_blank" style="width: 100%">Ver archivo</a> --}}
                </div>
              </div>
            </div>
          </div>
    </div>
        
    @endforeach
</div>
<br><br><br>


@endsection
