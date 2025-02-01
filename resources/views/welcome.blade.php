@extends('layouts.app')

@section('title', 'Inicio')

@section('navbar')
    @include('layouts.navbar_prueba')
@endsection

@section('content')
  <div class="container-fluid p-0 m-0" >
    @include('content_info')

  </div>
  <br><br><br>
  <div class="row p-0 m-0 justify-content-center  " style="background-color: #F0F3F4" >
    
    <div class="col-md-10 "  style="height: 100vh;">
      <h1 class="text-rojo text-center m-4 fs-1 h1">MAPA</h1>
   
      @include('content_mapa')
    </div>
  
    
    {{-- <img style="height: 20vh; width:100%" class="p-0 m-0" src="{{asset('images/triangulo-inferior.jpg')}}" > --}}
    <br><br><br>
  </div>

  
@endsection
