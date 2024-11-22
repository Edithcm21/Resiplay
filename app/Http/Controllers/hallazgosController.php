<?php

namespace App\Http\Controllers;

use App\Models\Clasificacion;
use App\Models\hallazgo;
use App\Models\muestreo;
use App\Models\Playa;
use App\Models\tipo_residuo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class hallazgosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

   

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $playas=Playa::all();
        $residuos=tipo_residuo::all();
        $clasificaciones= Clasificacion::all();
        $residuosAgrupados = tipo_residuo::all()->groupBy('fk_clasificacion');
        
        return Auth::user()->rol == 'admin'
        ? view('views_admin.muestreos.create_hallazgos',compact('playas','residuos','clasificaciones','residuosAgrupados'))
        : view('views_capturista.muestreos.create_hallazgos',compact('playas','residuos','clasificaciones','residuosAgrupados'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            // Validar los datos del formulario de muestreo 
            $request->validate([
                'Nmuestreo' => 'required|integer',
                'playa' => 'required|integer',
                'date' => 'required|date',
                'dia' => 'required|string',
                'zona' => 'required|string',
            ]);
            // Crear el registro de muestreo
            $muestreo=new muestreo();
            $muestreo->num_muestreo=$request->Nmuestreo;
            $muestreo->zona=$request->zona;
            $muestreo->dia=$request->dia;
            $muestreo->fecha=$request->date;
            $muestreo->fk_playa=$request->playa;
            $muestreo->autorizado = Auth::user()->rol == 'admin' ? 1 : 2;
            $muestreo->fk_capturista=Auth::user()->id;
            $carbonDate = Carbon::parse($muestreo->fecha);
            // Obtener año
            $anio = $carbonDate->year;
            $muestreo->anio=$anio;
            $muestreo->save();
            $muestreo_id=$muestreo->id_muestreo;
            //Guardar los registros de los muestreos 
            $cantidades=$request->input('cantidades',[]);
            $porcentajes=$request->input('porcentajes',[]);

            //filtrar solo los valores que no sean 0
            Log::info('Va a entrar al for a crear hallazgos');
            foreach ($cantidades as $id_tipo => $cantidad) {
                if($cantidad>0){
                    $porcentaje= isset($porcentajes[$id_tipo])? $porcentajes[$id_tipo]: '0%';
                    //quitar el %
                    $porcentaje=str_replace('%','',$porcentaje);

                    //guardar en la bd
                    $hallazgo= new hallazgo();
                    $hallazgo->fk_tipo=$id_tipo;
                    $hallazgo->cantidad=$cantidad;
                    $hallazgo->porcentaje=$porcentaje;
                    $hallazgo->fk_muestreo=$muestreo_id;
                    $hallazgo->save();

                }
            }
            return Auth::user()->rol == 'admin'
                ? redirect()->route('admin.hallazgo.create')->with('success', 'Registro creado correctamente.')
                : redirect()->route('capturista.hallazgo.create',)->with('success', 'Registro creado correctamente.');
   
           
            }
            catch (\Exception $e) 
            {
                // Imprimir el error en el registro
                Log::error('Error al crear el muestreo: ' . $e->getMessage());
                // Redireccionar con un mensaje de error
                return Auth::user()->rol == 'admin'
                ? redirect()->route('admin.hallazgo.create')->with('error','Ocurrió un error al guardar el registro. Por favor, inténtalo de nuevo.')
                : redirect()->route('capturista.hallazgo.create')->with('error','Ocurrió un error al guardar el registro. Por favor, inténtalo de nuevo.');
            }

        
    }

    /**
     * Display the specified resource.
     */
    public function show(hallazgo $hallazgo)
    {
        //
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {

        $muestreo=muestreo::where('id_muestreo',$id)->first();
        $hallazgos=hallazgo::where('fk_muestreo',$id)->get();
        $playas=Playa::all();
        $residuos=tipo_residuo::orderBy('nombre_tipo')->get();
        $clasificaciones= Clasificacion::all();
        $autorizado= $muestreo->autorizado == 1 ? 'Habilitado' : 'Desabilitado';

        return Auth::user()->rol == 'admin'
                ? view('views_admin.muestreos.update_hallazgos',compact('playas','residuos','clasificaciones','muestreo','hallazgos','autorizado'))
                : view('views_capturista.muestreos.update_hallazgos',compact('playas','residuos','clasificaciones','muestreo','hallazgos','autorizado'));
   

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            // Validar los datos del formulario de muestreo 
            $request->validate([
                'Nmuestreo' => 'required|integer',
                'playa' => 'required|integer',
                'date' => 'required|date',
                'dia' => 'required|string',
                'zona' => 'required|string',
            ]);
            //Buscar el muestreo
            $muestreo= muestreo::findOrfail($id);
            $muestreo->num_muestreo=$request->Nmuestreo;
            $muestreo->zona=$request->zona;
            $muestreo->dia=$request->dia;
            $muestreo->fecha=$request->date;
            $muestreo->fk_playa=$request->playa;
            $muestreo->autorizado=$request->has('autorizado') ? $request->autorizado: 0 ;
            $muestreo->fk_capturista=Auth::user()->id;
            $carbonDate = Carbon::parse($muestreo->fecha);
            // Obtner año
            $anio = $carbonDate->year;
            $muestreo->anio=$anio;
            $muestreo->save();

            //Actualizar los registros del muestreo 
            $hallazgos=$request->input('hallazgosE',[]);
            $cantidadesE=$request->input('cantidadesE',[]);
            $porcentajesE=$request->input('porcentajesE',[]);

            foreach ($hallazgos as $id_hallazgo => $id_tipo) {
                if($cantidadesE[$id_hallazgo]>0){
                    $porcentaje=str_replace('%','',$porcentajesE[$id_hallazgo]);
                    //guardar en la bd
                     $hallazgo= hallazgo::findOrfail($id_hallazgo);
                     $hallazgo->fk_tipo=$id_tipo;
                     $hallazgo->cantidad=$cantidadesE[$id_hallazgo];
                     $hallazgo->porcentaje=$porcentaje;
                     $hallazgo->save();
                     Log::info("Registro modificado", $hallazgo->toArray());
                }
                else{
                    hallazgo::destroy($id_hallazgo);
                }
            }
            $residuos=$request->input('residuos',[]);
            $cantidades=$request->input('cantidades',[]);
            $porcentajes=$request->input('porcentajes',[]);
            foreach ($residuos as $index => $residuo) {
                if($cantidades[$index]>0){
                    $porcentaje= isset($porcentajes[$index])? $porcentajes[$index]: '0%';
                    //quitar el %
                    $porcentaje=str_replace('%','',$porcentaje);

                    //guardar en la bd
                    $hallazgo= new hallazgo();
                    $hallazgo->fk_tipo=$residuo;
                    $hallazgo->cantidad=$cantidades[$index];
                    $hallazgo->porcentaje=$porcentaje;
                    $hallazgo->fk_muestreo=$id;
                    $hallazgo->save();
                    Log::info("Registro creado", $hallazgo->toArray());

                }
            }

            return Auth::user()->rol == 'admin'
                ? redirect()->route('admin.hallazgos',$id)->with('success', 'Registro Actualizado correctamente.')
                : redirect()->route('capturista.hallazgos',$id)->with('success', 'Registro Actualizado correctamente.');
   

        }catch (\Exception $e) {
            // Imprimir el error en el registro
            Log::error('Error al crear el muestreo: ' . $e->getMessage());
            // Redireccionar con un mensaje de error
            return Auth::user()->rol == 'admin'
                ? redirect()->route('admin.hallazgos',$id)->with('error','Ocurrió un error al guardar el registro. Por favor, inténtalo de nuevo.')
                : redirect()->route('capturista.hallazgos',$id)->with('error','Ocurrió un error al guardar el registro. Por favor, inténtalo de nuevo.');
   
              }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            hallazgo::where('fk_muestreo',$id)->delete();
            muestreo::destroy($id);
            return redirect()->route('admin.muestreos')->with('success','Registro eliminado correctamente');
        } catch (\Exception $e) {
            // Imprimir el error en el registro
            Log::error('Error al eliminar municipio: ' . $e->getMessage());
            return redirect()->route('admin.municipios')->with('error','Ocurrió un error al eliminar registro');
        }  
    }

    public function viewHallazgos($id){
        // muestra todos los residuos encontrados en el muestreo seleccionado
        $muestreo=muestreo::where('id_muestreo',$id)->first();
        $hallazgos= DB::table('hallazgos')
        ->select('cantidad','porcentaje','nombre_tipo','id_clasificacion')
        ->join('muestreos' ,'id_muestreo', '=', 'fk_muestreo')
        ->join('tipo_residuos','id_tipo', '=', 'fk_tipo')
        ->join('clasificaciones','id_clasificacion','=','fk_clasificacion')
        ->where('fk_muestreo',$id)
        ->orderBy('nombre_clasificacion')
        ->get();
        $autorizado=$muestreo->autorizado == 1 ? 'Habilitado' : 'Desabilitado';
        $clasificaciones= Clasificacion::orderBy('nombre_clasificacion')->get();

        return Auth::user()->rol == 'admin'
                ? view('views_admin.muestreos.hallazgos',compact('muestreo','hallazgos','autorizado','clasificaciones'))
                : view('views_capturista.muestreos.hallazgos',compact('muestreo','hallazgos','autorizado','clasificaciones'));
   
        

    }
}
