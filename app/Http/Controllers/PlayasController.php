<?php

namespace App\Http\Controllers;

use App\Models\Municipio;
use App\Models\Playa;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PlayasController extends Controller
{
    public function index()
    { 
        $playas= Playa::orderBy('nombre_playa','asc')->get();
        $municipios=Municipio::orderBy('nombre_municipio')->get();
        $regiones=Region::orderBy('nombre_region')->get();

        return Auth::user()->rol== 'admin'
        ? view('views_admin.playas',compact('playas','municipios','regiones'))
        : view('views_capturista.playas',compact('playas','municipios','regiones'));
      
    }

    /**
     * Show the form for creating a new resource.
     * 
     */
    public function create()
    {
        // return redirect()->route('admin.usuarios');
                
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            // Validar los datos del formulario
            $request->validate([
                'nombre_playa' => 'required|string|max:25',
                'latitud' => 'required|string|max:10',
                'longitud' => 'required|string|max:10',
                'municipio' => 'required|integer',
                'region' => 'required|integer'
            ]);

            $playa= new Playa();
            $playa->nombre_playa=$request->nombre_playa;
            $playa->latitud=$request->latitud;
            $playa->longitud=$request->longitud;
            $playa->fk_municipio=$request->municipio;
            $playa->fk_region=$request->region;

            $playa->save();
            return Auth::user()->rol== 'admin'
            ? redirect()->route('admin.Playas')->with('success', 'Registro creado correctamente.')
            : redirect()->route('capturista.Playas')->with('success', 'Registro creado correctamente.');
          

            }catch (\Exception $e) {
                
                // Imprimir el error en el registro
                Log::error('Error al crear nueva playa ' . $e->getMessage());
                // Redireccionar con un mensaje de error
                return Auth::user()->rol== 'admin'
                    ? redirect()->route('admin.Playas')->with('error','Ocurrió un error al crear el registro. Por favor, inténtalo de nuevo.')
                    : redirect()->route('capturista.Playas')->with('error','Ocurrió un error al crear el registro. Por favor, inténtalo de nuevo.');
          
            }
        
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
   
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            $request->validate([
                'modalNombre_playa' => 'required|string|max:25',
                'modalLatitud' => 'required|string|max:10',
                'modalLongitud' => 'required|string|max:10',
                'modalMunicipio' => 'required|integer',
                'modalRegion' => 'required|integer'
            ]);
            $playa=Playa::findOrfail($id);
            $playa->nombre_playa=$request->modalNombre_playa;
            $playa->latitud=$request->modalLatitud;
            $playa->longitud=$request->modalLongitud;
            $playa->fk_municipio=$request->modalMunicipio;
            $playa->fk_region=$request->modalRegion;
            $playa->save();

            return Auth::user()->rol== 'admin'
                    ? redirect()->route('admin.Playas')->with('success', 'Registro actualizado correctamente.')
                    : redirect()->route('capturista.Playas')->with('success', 'Registro actualizado correctamente.');
          


        }catch (\Exception $e) {
                // Imprimir el error en el registro
                Log::error('Error al actualizar La playa: ' . $e->getMessage());
                // Redireccionar con un mensaje de error
                return Auth::user()->rol== 'admin'
                    ? redirect()->route('admin.Playas')->with('error','Ocurrió un error al actualizar. Por favor, inténtalo de nuevo.')
                    : redirect()->route('capturista.Playas')->with('error','Ocurrió un error al actualizar. Por favor, inténtalo de nuevo.');
          
            }  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Playa::destroy($id);
            return redirect()->route('admin.Playas')->with('success','Registro de playa eliminado correctamente');
        } catch (\Exception $e) {
            // Imprimir el error en el registro
            Log::error('Error al eliminar la playa: ' . $e->getMessage());
            return redirect()->route('admin.Playas')->with('error','Ocurrió un error al eliminar registro');
        }  
    }
}
