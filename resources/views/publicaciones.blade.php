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
    <div class="col-sm-3">
        <div class="card card-red">
            <div class="card-body">
                <h4 class="card-title">{{$publicacion->titulo}}</h4>
                <p class="card-text">{{$publicacion->descripcion}}<br>
                </p>
                <p>autores: {{$publicacion->autores}}<br>
                    fecha: {{$publicacion->fecha}}</p>
                    <td><a href="{{ Storage::url($publicacion->file) }}" class="btn btn-sm btn-dark" target="_blank" style="width: 100%">Ver archivo</a></td>
{{-- 
                <a href="{{ Storage::url($publicacion->file) }}" class="">
                <button class=" btn-white btn-2">Ver archivo</button></a> --}}
            </div>
        </div>
    </div>
        
    @endforeach
</div>
<br><br><br>


@endsection
