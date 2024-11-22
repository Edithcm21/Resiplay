<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use App\Models\Municipio;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
class MunicipioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $estados=Estado::all();
        // $municipios=Municipio::all();
        // Obtener todos los municipios y cargar la relación con estado
   
        $municipios = Municipio::with('estado')->orderBy('fk_estado')->paginate(6);
        
        return Auth::user()->rol== 'admin'
        ? view('views_admin.municipios',compact('estados','municipios'))
        : view('views_capturista.municipios',compact('estados','municipios'));
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
                'name' => 'required|string|max:23',
                'estado' => 'required|integer|between:1,32',
            ]);
            
            // Crear el registro
            $municipio= new municipio();
            $municipio->nombre_municipio=$request->name;
            $municipio->fk_estado=$request->estado;
            $municipio->save();

            return Auth::user()->rol== 'admin'
                ? redirect()->route('admin.municipios')->with('success', 'Municipio creado correctamente.')
                : redirect()->route('capturista.municipios')->with('success', 'Municipio creado correctamente.');

            }catch (\Exception $e) {
                // Imprimir el error en el registro
                Log::error('Error al crear municipio: ' . $e->getMessage());
                // Redireccionar con un mensaje de error
                return Auth::user()->rol== 'admin'
                ? redirect()->route('admin.municipios')->with('error','Ocurrió un error al registrar municipio. Por favor, inténtalo de nuevo.')
                : redirect()->route('capturista.municipios')->with('error','Ocurrió un error al registrar municipio. Por favor, inténtalo de nuevo.');

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
                'modalName' => 'required|string|max:23',
                'modalEstado' => 'required|integer|between:1,32',
            ]);
            
            $municipio=Municipio::findOrFail($id);
            $municipio->nombre_municipio=$request->modalName;
            $municipio->fk_estado=$request->modalEstado;
            $municipio->save();

            return Auth::user()->rol== 'admin'
                ? redirect()->route('admin.municipios')->with('success', 'Municipio actualizado correctamente.')
                : redirect()->route('capturista.municipios')->with('success', 'Municipio actualizado correctamente.');



        }catch (\Exception $e) {
                // Imprimir el error en el registro
                Log::error('Error al actualizar municipio: ' . $e->getMessage());
                // Redireccionar con un mensaje de error

                return Auth::user()->rol== 'admin'
                ? redirect()->route('admin.municipios')->with('error','Ocurrió un error al actualizar. Por favor, inténtalo de nuevo.')
                : redirect()->route('capturista.municipios')->with('error','Ocurrió un error al actualizar. Por favor, inténtalo de nuevo.');

                
            }  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Municipio::destroy($id);
            return redirect()->route('admin.municipios')->with('success','Registro eliminado correctamente');
        } catch (\Exception $e) {
            // Imprimir el error en el registro
            Log::error('Error al eliminar municipio: ' . $e->getMessage());
            return redirect()->route('admin.municipios')->with('error','Ocurrió un error al eliminar registro');
        }  
    }



    public function getMunicipios($id_estado)
    {
        $estado = Estado::find($id_estado);
        
        if (!$estado) {
            return response()->json(['message' => 'Estado no encontrado'], 404);
        }
        
        $municipios = Municipio::where('fk_estado', $estado->id_estado)->get();
        
        return response()->json($municipios);
    }
}
