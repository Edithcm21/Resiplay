<?php

namespace App\Http\Controllers;

use App\Models\Clasificacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ClasificacionesController extends Controller
{
   

    public function index()
    { 
        $clasificaciones=Clasificacion::all();
         return Auth::user()->rol=='admin'
         ? view('views_admin.clasificacion_residuos',compact('clasificaciones'))
         : view('views_capturista.clasificacion_residuos',compact('clasificaciones'));
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
                'nombre_clasificacion' => 'required|string|max:40',
                'color' => 'required|regex:/^#[0-9A-Fa-f]{6}$/',
            ]);
            $clasificacion= new Clasificacion();
            $clasificacion->nombre_clasificacion=$request->nombre_clasificacion;
            $clasificacion->color= $request->color;
            $clasificacion->save();

            return Auth::user()->rol=='admin'
                ? redirect()->route('admin.Clasificacion')->with('success', 'Registro creado correctamente.')
                : redirect()->route('capturista.Clasificacion')->with('success', 'Registro creado correctamente.');
        

            }catch (\Exception $e) {
                
                // Imprimir el error en el registro
                Log::error('Error al crear Clasificacion de reisuos: ' . $e->getMessage());
                // Redireccionar con un mensaje de error
                return Auth::user()->rol=='admin'
                ? redirect()->route('admin.Clasificacion')->with('error','Ocurrió un error al crear un registro. Por favor, inténtalo de nuevo.')
                : redirect()->route('capturista.Clasificacion')->with('error','Ocurrió un error al crear un registro. Por favor, inténtalo de nuevo.');
        
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
                'modalClasificacion' => 'required|string|max:40',
                'modalColor' => 'required|regex:/^#[0-9A-Fa-f]{6}$/'
            ]);
            $clasificacion=Clasificacion::findOrfail($id);
            $clasificacion->nombre_clasificacion=$request->modalClasificacion;
            $clasificacion->color=$request->modalColor;
            $clasificacion->save();

            return Auth::user()->rol=='admin'
                ? redirect()->route('admin.Clasificacion')->with('success', 'Registro actualizado correctamente.')
                : redirect()->route('capturista.Clasificacion')->with('success', 'Registro actualizado correctamente.');
        


        }catch (\Exception $e) {
                // Imprimir el error en el registro
                Log::error('Error al actualizar La clasificación: ' . $e->getMessage());
                // Redireccionar con un mensaje de error

                return Auth::user()->rol=='admin'
                ? redirect()->route('admin.Clasificacion')->with('error','Ocurrió un error al actualizar. Por favor, inténtalo de nuevo.')
                : redirect()->route('capturista.Clasificacion')->with('error','Ocurrió un error al actualizar. Por favor, inténtalo de nuevo.');
        
            }  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Clasificacion::destroy($id);
            return redirect()->route('admin.Clasificacion')->with('success','Registro eliminado correctamente');
        } catch (\Exception $e) {
            // Imprimir el error en el registro
            Log::error('Error al eliminar la clasificación de residuos: ' . $e->getMessage());
            return redirect()->route('admin.Clasificacion')->with('error','Ocurrió un error al eliminar registro');
        }  
    }
}
