<?php

namespace App\Http\Controllers;

use App\Models\Clasificacion;
use App\Models\tipo_residuo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class tipo_residuosController extends Controller
{
    public function index()
    { 
        $tipo_residuos=tipo_residuo::all();
        $clasificaciones=Clasificacion::all();
        return Auth::user()->rol== 'admin'  
        ? view('views_admin.residuos',compact('tipo_residuos','clasificaciones'))
        : view('views_capturista.residuos',compact('tipo_residuos','clasificaciones'));

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
                'nombre_tipo' => 'required|string|max:100',
                'fk_clasificacion'=>'required|integer'
            ]);
            $tipo_residuo= new tipo_residuo();
            $tipo_residuo->nombre_tipo=$request->nombre_tipo;
            $tipo_residuo->fk_clasificacion=$request->fk_clasificacion;
            $tipo_residuo->save();
            return Auth::user()->rol== 'admin'  
                ? redirect()->route('admin.Tipo_residuos')->with('success', 'Registro creado correctamente.')
                : redirect()->route('capturista.Tipo_residuos')->with('success', 'Registro creado correctamente.');


            }catch (\Exception $e) {
                
                // Imprimir el error en el registro
                Log::error('Error al crear tipo_residuo : ' . $e->getMessage());
                // Redireccionar con un mensaje de error
                return Auth::user()->rol== 'admin'  
                    ? redirect()->route('admin.Tipo_residuos')->with('error','Ocurrió un error al crear el registro. Por favor, inténtalo de nuevo.')
                    : redirect()->route('capturista.Tipo_residuos')->with('error','Ocurrió un error al crear el registro. Por favor, inténtalo de nuevo.');

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
                'modalTipo_residuo' => 'required|string|max:100',
                'modalFk_clasificacion'=>'required|integer'
            ]);
            $tipo_residuo=tipo_residuo::findOrfail($id);
            $tipo_residuo->nombre_tipo=$request->modalTipo_residuo;
            $tipo_residuo->fk_clasificacion=$request->modalFk_clasificacion;
            $tipo_residuo->save();
            return Auth::user()->rol== 'admin'  
                    ? redirect()->route('admin.Tipo_residuos')->with('success', 'Registro actualizado correctamente.')
                    : redirect()->route('capturista.Tipo_residuos')->with('success', 'Registro actualizado correctamente.');



        }catch (\Exception $e) {
                // Imprimir el error en el registro
                Log::error('Error al actualizar el tipo de residuo: ' . $e->getMessage());
                // Redireccionar con un mensaje de error
                return Auth::user()->rol== 'admin'  
                    ? redirect()->route('admin.Tipo_residuos')->with('error','Ocurrió un error al actualizar. Por favor, inténtalo de nuevo.')
                    : redirect()->route('capturista.Tipo_residuos')->with('error','Ocurrió un error al actualizar. Por favor, inténtalo de nuevo.');

            }  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            tipo_residuo::destroy($id);
            return redirect()->route('admin.Tipo_residuos')->with('success','Registro eliminado correctamente');
        } catch (\Exception $e) {
            // Imprimir el error en el registro
            Log::error('Error al eliminar la clasificación de residuos: ' . $e->getMessage());
            return redirect()->route('admin.Tipo_residuos')->with('error','Ocurrió un error al eliminar registro');
        }  
    }
}
