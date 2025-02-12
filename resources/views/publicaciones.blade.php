@extends('layouts.app')

@section('title', 'Publicaciones')

@section('navbar')
    @include('layouts.navbar_prueba')
@endsection

@section('content')
<br>

<div class="container-fluid p-5">
    <h1 class=" fw-bold">PUBLICACIONES</h1>
    <div class="row p-5  centrarh "  >
    @foreach ($publicaciones as $publicacion)
    <div class="col-sm-10 " style="border-bottom: 2px solid #ac0e28;  ">
        <div class=" mb-3  " style="">
            <div class="row g-0   pt-3">
              <div class="col-sm-3 col-4 my-auto mx-auto">
                <a href="{{ Storage::url($publicacion->file) }}">
                    <img src="{{Storage::url($publicacion->img)}}" alt="" class="img-fluid border  rounded-start" style=" max-height:250px">
                </a>
              </div>
              <div class="col-md-9 col-8  p-4" >
                <a href="{{ Storage::url($publicacion->file) }}"  class="card-pdf">
                <div class="card-body ">
                    <h1 class="card-title text-red fw-bold">{{$publicacion->titulo}}</h3>
                    <h3 class="card-text">{{$publicacion->descripcion}}<br></h5>
                    <h6 class="card-text"><small >autores: {{$publicacion->autores}} <br> fecha: {{$publicacion->fecha}}</small></h6>
                  {{-- <a href="{{ Storage::url($publicacion->file) }}" class="btn btn-sm btn-dark" target="_blank" style="width: 100%">Ver archivo</a> --}}
                </div>
              </a>
              </div>
            </div>
          </div>
    </div>
        
    @endforeach
</div>
<br><br><br>


@endsection
