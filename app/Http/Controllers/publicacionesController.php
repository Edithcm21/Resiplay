<?php

namespace App\Http\Controllers;

use App\Models\publicacion;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\Catch_;

class publicacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publicaciones= publicacion::all();
        return Auth::user()->rol== 'admin' 
        ? view('views_admin.publicaciones',compact('publicaciones'))
        : view('views_capturista.publicaciones',compact('publicaciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'titulo' => 'required|string|max:100',
                'descripcion' => 'required|string|max:500',
                'autores' => 'required|string|max:100',
                'fecha' => 'date',
                'archivo' => 'required|mimes:pdf',
                'portada'=>'required|mimes:jpg,jpeg,png|max:2048'
            ]);
            $filePath = $request->file('archivo') ->store('publicaciones','public');
            $portadaPath=$request->file('portada')->store('img','public');
            $publicacion = new publicacion();
            $publicacion->titulo = $request->titulo;
            $publicacion->descripcion = $request->descripcion;
            $publicacion->autores= $request->autores;
            $publicacion->fecha=$request->fecha;
            $publicacion->file= $filePath;
            $publicacion->img=$portadaPath;
            $publicacion->save();

            return Auth::user()->rol== 'admin' 
            ? redirect()->route('admin.publicaciones')->with('success','se creó correctamente el registro.')
            : redirect()->route('capturista.publicaciones')->with('success','se creó correctamente el registro.');
        } catch (\Exception $e) {
            Log::error('Error al crear el registro : ' . $e->getMessage());
            return Auth::user()->rol== 'admin' 
            ? redirect()->route('admin.publicaciones')->with('error','Ocurrió un error al crear el registro.')
            : redirect()->route('capturista.publicaciones')->with('error','Ocurrió un error al crear el registro.');
             }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(publicacion $publicacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'modalTitulo' => 'required|string|max:100',
                'modalDescripcion' => 'required|string|max:500',
                'modalAutores' => 'required|string|max:100',
                'modalFecha' => 'date',
                'modalArchivo' => 'nullable|mimes:pdf',
                'modalimg'=>'nullable|mimes:jpg,jpeg,png|max:2048'
            ]);
            $publicacion = publicacion::findOrFail($id);
            if($request->hasFile('modalArchivo')){
                $filePath = $request->file('modalArchivo') ->store('publicaciones','public');
                $publicacion->file=$filePath;
            }
            if($request->hasFile('modalimg')){
                $portadaPath=$request->file('modalimg')->store('img','public');
                $publicacion->img=$portadaPath;
                
            }

            $publicacion->titulo=$request->modalTitulo;
            $publicacion->descripcion=$request->modalDescripcion;
            $publicacion->autores= $request->modalAutores;
            $publicacion->fecha= $request->modalFecha;
            $publicacion->save();

            return Auth::user()->rol== 'admin' 
            ? redirect()->route('admin.publicaciones')->with('success','se actualizó correctamente el registro.')
            : redirect()->route('capturista.publicaciones')->with('success','se actualizó correctamente el registro.');
       } catch (\Exception $e) {
            Log::error('Error al crear el registro : ' . $e->getMessage());

            return Auth::user()->rol== 'admin' 
            ? redirect()->route('admin.publicaciones')->with('error','Ocurrió un error al actualizar el registro.')
            : redirect()->route('capturista.publicaciones')->with('error','Ocurrió un error al actualizar el registro.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $publicacion= publicacion::findorFail($id);
            Storage::disk('public')->delete($publicacion->file);
            Storage::disk('public')->delete($publicacion->img);
            $publicacion->delete();

            return Auth::user()->rol== 'admin' 
                ?redirect()->route('admin.publicaciones')->with('success','Registro eliminado')
                :redirect()->route('admin.publicaciones')->with('success','Registro eliminado');

        } catch (\Exception $e) {
            // Imprimir el error en el registro
            Log::error('Error al eliminar el registro: ' . $e->getMessage());

            return Auth::user()->rol== 'admin' 
                ? redirect()->route('admin.publicaciones')->with('error','Ocurrió un error al eliminar registro')
                : redirect()->route('capturista.publicaciones')->with('error','Ocurrió un error al eliminar registro');
        }  
    }

    public function getPublicaciones(){
        $publicaciones= publicacion::all();
        return view('publicaciones',compact('publicaciones'));
    }
}
