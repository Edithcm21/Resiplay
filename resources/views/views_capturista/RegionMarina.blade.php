@extends('views_capturista.app')

@section('title', 'Region Marina')

@section('navbar')
    @include('layouts.navbar_capturista')
@endsection

@section('content' )
  <div class="row justify-content-center align-items-center p-4"  >
    <div class="col-md-12 p-2 " style=" background-color:white;min-height: 72vh  " >
        <div class="container  " >
            <div class="row">
                <div class="col-md-4 " >
                    <h2 style="color: #B72223" class="m-2 aling-center">Regiones marinas </h2>
                    <div class="row" >
                      <div class="col-sm-12 col-lg-12 mt-4 card"   >
                            <form class="row mb-4"method="POST" action="{{route('capturista.RegionMarina.store')}}">
                                @csrf
                                <h4 style="color: var(--negro)" class="m-2 aling-center">Agregar regiones marinas</h4>
                                <div class=" col-sm-12 mb-3 pt-4">
                                    <input type="text" class="form-control" id="nombre_region" name="nombre_region" placeholder="Nombre de la región" maxlength="20">
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
                                        <th>Region marina</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($regiones as $region)
                                    <tr>
                                        <td>{{$region->id_region}}</td>
                                        <td>{{$region->nombre_region}}</td>
                                        
                                        <td>
                                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{$region->id_region}}" data-bs-id="{{$region->id_region}}">Editar</button>
                                                <!-- Modal Edit -->
                                            <div class="modal fade" id="editModal{{$region->id_region}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" style="color: #B72223" id="exampleModalLabel">Editar Region Marina</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form class=" mb-3 "method="POST" action="{{route('capturista.RegionMarina.update',$region->id_region)}}">
                                                              @csrf @method('PUT')
                                                              <div class="mb-3">
                                                                <label  class="form-label">Region Marina</label>
                                                                <input type="text" class="form-control"  name="modalRegion" placeholder="Region Marina" required value="{{$region->nombre_region}}">
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
                                        </td>
                                    </tr>
                                @endforeach 
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                {{ $regiones->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

   
@endsection