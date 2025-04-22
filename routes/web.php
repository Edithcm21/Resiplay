<?php

use App\Http\Controllers\ClasificacionesController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\hallazgosController;
use App\Http\Controllers\IndexAdmin;
use App\Http\Controllers\IndexCapturista;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LocalidadesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\muestreosController;
use App\Http\Controllers\MunicipioController;
use App\Http\Controllers\PlayasController;
use App\Http\Controllers\publicacionesController;
use App\Http\Controllers\RegionesController;
use App\Http\Controllers\tipo_residuosController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckRole;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//Pagina principal
Route::resource('/',IndexController::class);
//Ruta para mostrar los resultados completos solo filtrar la playa
Route::get('/resultados/{id}',[IndexController::class,'showResultados'])->name('resultados');
// Route::post('resultados/filtro',[IndexController::class,'showFilteredResults1'])->name('resultados.filtro');
Route::post('consulta/filtro',[IndexController::class,'showFilteredResults'])->name('consulta.filtro');
Route::get('consulta',[IndexController::class,'showFilteredResults'])->name('consulta');
Route::get('consulta/muestreo/{id}',[IndexController::class,'showmuestreoid'])->name('consulta.muestreo');
Route::get('Integrantes', function(){
    return view('Integrantes');
})->name('Integrantes');
Route::get('Costas', function(){
    return view('viewCostas');
})->name('Costas');
Route::get('Residuos-playas', function(){
    return view('Residuos_playas');
})->name('Residuos_playas');
Route::get('Monitoreos', function(){
    return view('Monitoreos');
})->name('Monitoreos');
Route::get('Publicaciones',[publicacionesController::class,'getPublicaciones'])->name('publicaciones');
// Obtiene el filtro de muestreo en base a la playa seleccionada
Route::get('getMuestreo/{id}',[IndexController::class,'getMuestreo'])->name('getMuestreo');
Route::resource('/mapa',Controller::class);
//Ruta que funciona para la llamada AJAX de obtener los datos de filtros
Route::get('estados/{id_estado}', [MunicipioController::class, 'getMunicipios']);
//muestra el formulario
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
//ruta para la logica del formulario
Route::post('login', [LoginController::class, 'login']);
//Ruta para mostrar el contador de vistas
Route::get('vistas/{id}',[IndexController::class,'mostrar_vistas'])->name('vistas');



//manejador de rutas con permisos 
Route::middleware(['auth'])->group(function () {
    Route::post('logout',[UsersController::class,'logout'])->name('logout');
    Route::post('perfil/editar',[UsersController::class,'perfilUpdate'])->name('perfil.update');
    Route::middleware(CheckRole::class . ':admin')->group(function () {
        //vista principal
        // Route::get('/admin',[MenuController::class,'index'])->name('admin');
        Route::get('/admin/perfil',[UsersController::class,'perfilEdit'])->name('admin.perfil.edit');
        //vistas para la gestion de usuarios
        Route::get('/admin/usuarios',[UsersController::class,'index'])->name('admin.usuarios');
        Route::post('/admin/usuarios/create',[UsersController::class,'store'])->name('admin.usuarios.store');
        Route::put('/admin/usuarios/update/{id}',[UsersController::class,'update'])->name('admin.usuarios.update');
        Route::post('/admin/usuarios/delete/{id}',[UsersController::class,'destroy'])->name('admin.usuarios.delete');
        //gestion de municipios
        Route::get('/admin/municipios',[MunicipioController::class,'index'])->name('admin.municipios');
        Route::post('/admin/municipios/create',[MunicipioController::class,'store'])->name('admin.municipios.store');
        Route::put('/admin/municipios/update/{id}',[MunicipioController::class,'update'])->name('admin.municipios.update');
        Route::post('/admin/municipios/delete/{id}',[MunicipioController::class,'destroy'])->name('admin.municipios.delete');
        //Region Marina
        Route::get('/admin/RegionMarina',[RegionesController::class,'index'])->name('admin.RegionMarina');
        Route::post('/admin/RegionMarina/create',[RegionesController::class,'store'])->name('admin.RegionMarina.store');
        Route::put('/admin/RegionMarina/update/{id}',[RegionesController::class,'update'])->name('admin.RegionMarina.update');
        Route::post('/admin/RegionMarina/delete/{id}',[RegionesController::class,'destroy'])->name('admin.RegionMarina.delete');
        //Clasificacion de reisuos
        Route::get('/admin/Clasificacion',[ClasificacionesController::class,'index'])->name('admin.Clasificacion');
        Route::post('/admin/Clasificacion/create',[ClasificacionesController::class,'store'])->name('admin.Clasificacion.store');
        Route::put('/admin/Clasificacion/update/{id}',[ClasificacionesController::class,'update'])->name('admin.Clasificacion.update');
        Route::post('/admin/Clasificacion/delete/{id}',[ClasificacionesController::class,'destroy'])->name('admin.Clasificacion.delete');
        //Playas
        Route::get('/admin/Playas',[PlayasController::class,'index'])->name('admin.Playas');
        Route::post('/admin/Playas/create',[PlayasController::class,'store'])->name('admin.Playas.store');
        Route::put('/admin/Playas/update/{id}',[PlayasController::class,'update'])->name('admin.Playas.update');
        Route::post('/admin/Playas/delete/{id}',[PlayasController::class,'destroy'])->name('admin.Playas.delete');
        //
        Route::get('/admin/Tipo_residuos',[tipo_residuosController::class,'index'])->name('admin.Tipo_residuos');
        Route::post('/admin/Tipo_residuos/create',[tipo_residuosController::class,'store'])->name('admin.Tipo_residuos.store');
        Route::put('/admin/Tipo_residuos/update/{id}',[tipo_residuosController::class,'update'])->name('admin.Tipo_residuos.update');
        Route::post('/admin/Tipo_residuos/delete/{id}',[tipo_residuosController::class,'destroy'])->name('admin.Tipo_residuos.delete');
        
        //Muestra los datos del muestreo seleccionado 
        Route::get('/admin/hallazgos/{id}',[hallazgosController::class,'viewHallazgos'])->name('admin.hallazgos');
        Route::get('/admin/hallazgo/create',[hallazgosController::class,'create'])->name('admin.hallazgo.create');
        Route::post('/admin/hallazgos/store',[hallazgosController::class,'store'])->name('admin.hallazgos.store');
        Route::get('/admin/hallazgos/edit/{id}',[hallazgosController::class,'edit'])->name('admin.hallazgos.edit');
        Route::put('/admin/hallazgos/update/{id}',[hallazgosController::class,'update'])->name('admin.hallazgos.update');
        Route::post('/admin/hallazgos/delete/{id}',[hallazgosController::class,'destroy'])->name('admin.hallazgos.delete');
        
        Route::get('/admin/muestreos',[muestreosController::class,'index'])->name('admin.muestreos');
        Route::get('/admin/muestreos/show',[muestreosController::class,'show'])->name('admin.muestreos.show');


        Route::get('/admin/publicaciones',[publicacionesController::class,'index'])->name('admin.publicaciones');
        Route::post('/admin/publicaciones/create',[publicacionesController::class,'store'])->name('admin.publicaciones.store');
        Route::put('/admin/publicaciones/update/{id}',[publicacionesController::class,'update'])->name('admin.publicaciones.update');
        Route::post('/admin/publicaciones/delete/{id}',[publicacionesController::class,'destroy'])->name('admin.publicaciones.delete');
        
       
    });
    Route::middleware(CheckRole::class . ':capturista')->group(function () {

        Route::get('/capturista/perfil',[UsersController::class,'perfilEditc'])->name('capturista.perfil.edit');

        Route::get('/capturista/muestreos',[muestreosController::class,'index'])->name('capturista.muestreos');

        Route::get('/capturista/hallazgos/{id}',[hallazgosController::class,'viewHallazgos'])->name('capturista.hallazgos');
        Route::get('/capturista/hallazgo/create',[hallazgosController::class,'create'])->name('capturista.hallazgo.create');
        Route::post('/capturista/hallazgos/store',[hallazgosController::class,'store'])->name('capturista.hallazgos.store');
        Route::get('/capturista/hallazgos/edit/{id}',[hallazgosController::class,'edit'])->name('capturista.hallazgos.edit');
        Route::put('/capturista/hallazgos/update/{id}',[hallazgosController::class,'update'])->name('capturista.hallazgos.update');

        //gestion de municipios
        Route::get('/capturista/municipios',[MunicipioController::class,'index'])->name('capturista.municipios');
        Route::post('/capturista/municipios/create',[MunicipioController::class,'store'])->name('capturista.municipios.store');
        Route::put('/capturista/municipios/update/{id}',[MunicipioController::class,'update'])->name('capturista.municipios.update');
        
        //Region Marina
        Route::get('/capturista/RegionMarina',[RegionesController::class,'index'])->name('capturista.RegionMarina');
        Route::post('/capturista/RegionMarina/create',[RegionesController::class,'store'])->name('capturista.RegionMarina.store');
        Route::put('/capturista/RegionMarina/update/{id}',[RegionesController::class,'update'])->name('capturista.RegionMarina.update');
        
        //Clasificacion de reisuos
        Route::get('/capturista/Clasificacion',[ClasificacionesController::class,'index'])->name('capturista.Clasificacion');
        Route::post('/capturista/Clasificacion/create',[ClasificacionesController::class,'store'])->name('capturista.Clasificacion.store');
        Route::put('/capturista/Clasificacion/update/{id}',[ClasificacionesController::class,'update'])->name('capturista.Clasificacion.update');
        
        //Playas
        Route::get('/capturista/Playas',[PlayasController::class,'index'])->name('capturista.Playas');
        Route::post('/capturista/Playas/create',[PlayasController::class,'store'])->name('capturista.Playas.store');
        Route::put('/capturista/Playas/update/{id}',[PlayasController::class,'update'])->name('capturista.Playas.update');
       
        //Tipo de residuos
        Route::get('/capturista/Tipo_residuos',[tipo_residuosController::class,'index'])->name('capturista.Tipo_residuos');
        Route::post('/capturista/Tipo_residuos/create',[tipo_residuosController::class,'store'])->name('capturista.Tipo_residuos.store');
        Route::put('/capturista/Tipo_residuos/update/{id}',[tipo_residuosController::class,'update'])->name('capturista.Tipo_residuos.update');

        Route::get('/capturista/publicaciones',[publicacionesController::class,'index'])->name('capturista.publicaciones');
        Route::post('/capturista/publicaciones/create',[publicacionesController::class,'store'])->name('capturista.publicaciones.store');
        Route::put('/capturista/publicaciones/update/{id}',[publicacionesController::class,'update'])->name('capturista.publicaciones.update');
        Route::post('/capturista/publicaciones/delete/{id}',[publicacionesController::class,'destroy'])->name('capturista.publicaciones.delete');
       
        
    });
});



// // Ruta para almacenar un nuevo usuario
// Route::get('users', [UsersController::class, 'store'])->name('user.tore');
// Route::get('users/create', [UsersController::class, 'create'])->name('user.create');



// Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
// Route::post('login', [LoginController::class, 'login']);
// Route::middleware(['auth'])->group(function () {
//      Route::get('/admin', [IndexAdmin::class, 'index'])->name('admin');
//      Route::get('/capturista', [IndexCapturista::class, 'index'])->name('capturista');
//  });



