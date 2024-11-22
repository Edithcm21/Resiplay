<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\RedirectResponse;

class RegionesController extends Controller
{
    public function index()
    { 
        $regiones = Region::orderBy('nombre_region')->paginate(6);
        return Auth::user()->rol== 'admin' 
        ? view('views_admin.RegionMarina',compact('regiones'))
        : view('views_capturista.RegionMarina',compact('regiones'));
   
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
                'nombre_region' => 'required|string|max:20'
            ]);
            $region= new Region();
            $region->nombre_region=$request->nombre_region;
            $region->save();
            return Auth::user()->rol== 'admin' 
                ? redirect()->route('admin.RegionMarina')->with('success', 'Registro creado correctamente.')
                : redirect()->route('capturista.RegionMarina')->with('success', 'Registro creado correctamente.');
   

            }catch (\Exception $e) {
                // Imprimir el error en el registro
                Log::error('Error al crear Region Marina: ' . $e->getMessage());
                // Redireccionar con un mensaje de error
                return Auth::user()->rol== 'admin' 
                ? redirect()->route('admin.municipios')->with('error','Ocurrió un error al crear un registro. Por favor, inténtalo de nuevo.')
                : redirect()->route('capturista.municipios')->with('error','Ocurrió un error al crear un registro. Por favor, inténtalo de nuevo.');
   
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
                'modalRegion' => 'required|string|max:20'
            ]);
            $region=Region::findOrfail($id);
            $region->nombre_region=$request->modalRegion;
            $region->save();
            return Auth::user()->rol== 'admin' 
                ? redirect()->route('admin.RegionMarina')->with('success', 'Registro actualizado correctamente.')
                : redirect()->route('capturista.RegionMarina')->with('success', 'Registro actualizado correctamente.');
   


        }catch (\Exception $e) {
                // Imprimir el error en el registro
                Log::error('Error al actualizar La region : ' . $e->getMessage());
                // Redireccionar con un mensaje de error
                return Auth::user()->rol== 'admin' 
                    ? redirect()->route('admin.RegionMarina')->with('error','Ocurrió un error al actualizar. Por favor, inténtalo de nuevo.')
                    : redirect()->route('capturista.RegionMarina')->with('error','Ocurrió un error al actualizar. Por favor, inténtalo de nuevo.');
   
            }  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Region::destroy($id);
            return redirect()->route('admin.RegionMarina')->with('success','Registro eliminado correctamente');
        } catch (\Exception $e) {
            // Imprimir el error en el registro
            Log::error('Error al eliminar Region: ' . $e->getMessage());
            return redirect()->route('admin.RegionMarina')->with('error','Ocurrió un error al eliminar registro');
        }  
    }

}
