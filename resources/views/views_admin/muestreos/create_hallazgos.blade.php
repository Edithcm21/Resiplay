 @extends('views_admin.app')

@section('title', 'Hallazgos')

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
            <div class="row">
                <div class="col-10 " >
                    <h3 style="color: #B72223">Nuevo registro</h3>
                </div>
                <div class="col-2 " >
                    <a href="/admin/muestreos" class="btn btn-dark">
                        <i class="bi bi-arrow-left"></i> Regresar
                    </a>
                </div>
            </div>    
            <form class=" mb-3"method="POST" action="{{route('admin.hallazgos.store')}}" >
                @csrf
                <div class="row"  >
                    <div class="col-sm-12 col-lg-12 mt-4"   >
                        <div class="row">
                            <div class="col-sm-2 mb-3" >
                                <label  class="form-label size15">Numero de muestreo:</label>
                                <input type="number" class="form-control"  name="Nmuestreo" placeholder="Numero de muestreo" required >
                            </div>
                            <div class=" col-sm-2 mb-3 ">
                                <label  class="form-label ">Playa:</label>
                                <select class="form-select" aria-label="Default select example" name="playa"  required>
                                    <option  >Selecciona playa</option>
                                    @foreach ( $playas as $playa)
                                    <option value="{{$playa->id_playa}}">{{ $playa->nombre_playa}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class=" col-sm-2 mb-3" >
                                <label  class="form-label">Fecha:</label>
                                <input type="date" class="form-control" id="date" name="date" placeholder="Fecha" required>
                            </div>
                            <div class=" col-sm-2 mb-3 ">
                                <label  class="form-label">Día:</label>
                                <select class="form-select" aria-label="Default select example" name="dia"  required>
                                    <option  >Selecciona día</option>
                                    <option value="viernes">viernes</option>
                                    <option value="sabado">sabado</option>
                                    <option value="domingo">domingo</option>
                                    
                                </select>
                            </div>
                            <div class=" col-sm-3 mb-3 ">
                                <label  class="form-label">Zona:</label>
                                <select class="form-select" aria-label="Default select example" name="zona"  required>
                                    <option  >Selecciona zona</option>
                                    <option value="Debajo pleamar">Debajo pleamar</option>
                                    <option value="Encima pleamar">Encima pleamar</option>
                                    <option value="Encima de la pleamar, hasta estructura fija">Encima de la pleamar, hasta estructura fija</option>
                                    <option value="Sobre y debajo de la pleamar">Sobre y debajo de la pleamar</option>
                                </select>
                            </div>
                        </div> 
                    </div>
                </div> 
                <div class="row centrarh ">
                    @foreach ($clasificaciones as $clasificacion)   

                        <div  class="col-sm-8 col-lg-8 ">
                            @if(isset($residuosAgrupados[$clasificacion->id_clasificacion]))
                                <div class="accordion" id="accordionPanelsStayOpenExample">
                                    <div class="accordion-item">
                                        <table class="table table-striped border">
                                            <thead>
                                                <tr class="p-0 " id="panelsStayOpen-heading{{$clasificacion->id_clasificacion}}">
                                                    <th  colspan="3" class="bg-dark">
                                                        <button style="color: white"  class="accordion-button  bg-dark p-0" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse{{$clasificacion->id_clasificacion}}" aria-expanded="false" aria-controls="panelsStayOpen-collapse{{$clasificacion->id_clasificacion}}">
                                                            {{ $clasificacion->nombre_clasificacion }}
                                                        </button> 
                                                    </th>
                                                </tr>
                                            </thead>
                                                
                                            <tbody id="panelsStayOpen-collapse{{$clasificacion->id_clasificacion}}" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-heading{{$clasificacion->id_clasificacion}}">
                                                <tr>
                                                    <th class="col-8">Residuo</th>
                                                    <th class="col-2">Cantidad (pz)</th>
                                                    <th class="col-2">Porcentaje</th>
                                                </tr>
                                                @foreach($residuosAgrupados[$clasificacion->id_clasificacion] as $residuo)
                                                <tr class="size12 row1" >
                                                    <td>{{ $residuo->nombre_tipo}}</td>
                                                    <td><input class="inputC borde" type="number" name="cantidades[{{ $residuo->id_tipo }}] " value="0" min="0" onchange="updateTotals()"></td>
                                                    <td><input class="inputC borde" type="text"   name="porcentajes[{{ $residuo->id_tipo }}]" value="0 %" min="0" onchange="updateTotals()"></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
                <div class="row centrarh ">
                    <div class="col-sm-8 col-lg-8 centrarh " >
                        <table class="table table-striped border">
                            <tr>
                                <th class="col-8">Total</th>
                                <td class="col-2" id="totalC"><label>0</label></td>
                                <td class="col-2" id="totalP"><label>0%</label></td>
                            </tr>
                        </table>
                    </div>   
                </div> 
                <div class="row  centrarh">
                    <div class="col-8 m-4  centrarh"  >
                        <button type="submit" class="btn  btn-outline-danger " style="width: 60%; ">Agregar</button> 
                    </div> 
                </div> 
            </form>
        </div>
    </div>
</div>  

@endsection