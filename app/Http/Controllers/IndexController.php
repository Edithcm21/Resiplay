<?php

namespace App\Http\Controllers;

use App\Models\Clasificacion;
use App\Models\Estado;
use App\Models\hallazgo;
use App\Models\Index;
use App\Models\muestreo;
use App\Models\Municipio; // Importa el modelo Municipio
use App\Models\Playa;
use App\Models\tipo_residuo;
use App\Models\vista;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $puntos = DB::table('muestreos')
        ->select('id_playa','nombre_playa','latitud','longitud','nombre_municipio','nombre_estado', DB::raw('COUNT(DISTINCT `num_muestreo`) as muestreos'))
        ->join('playas', 'playas.id_playa', '=', 'muestreos.fk_playa')
        ->join('municipios', 'municipios.id_municipio', '=', 'playas.fk_municipio')
        ->join('estados', 'estados.id_estado', '=', 'municipios.fk_estado')
        ->where('muestreos.autorizado','1')
        ->groupBy( 'id_playa','nombre_playa','latitud','longitud','nombre_municipio','nombre_estado')
        ->get();
        $views= vista::findOrFail(1);
        $views->views= $views->views+1;
        $views->save();
        return view('welcome', compact('puntos','views'));
      
    }

    public function mostrar_vistas( $id){
        $vistas= vista::findOrFail($id);
    return response()->json(['vistas' => $vistas->views]);

    }
    public function getMuestreo($id_playa){
        $muestreos=muestreo::where('fk_playa',$id_playa)
        ->where('muestreos.autorizado','1')
        ->get();
        $num_muestreo= DB::table('muestreos')
            ->select('num_muestreo')
            ->where('fk_playa',$id_playa)
            ->where('muestreos.autorizado','1')
            ->groupBy('num_muestreo')
            ->get();
        $zona= DB::table('muestreos')
            ->select('zona')->where('fk_playa',$id_playa)->where('muestreos.autorizado','1')->groupBy('zona')->get();
        
        if($id_playa==0){
            $muestreos= muestreo::where('muestreos.autorizado','1');
            $num_muestreo= DB::table('muestreos')
            ->select('num_muestreo')->groupBy('num_muestreo')->where('muestreos.autorizado','1')
            ->get();
            $zona= DB::table('muestreos')
            ->select('zona')->groupBy('zona')
            ->where('muestreos.autorizado','1')
            ->get();
        }
        return response()->json([
            'muestreos' => $muestreos,
            'num_muestreo' => $num_muestreo,
            'zonas'=>$zona
        ]);
    }

    
    public function showResultados( $id){
        $playas= DB::table('muestreos')
        ->select('id_playa','nombre_playa')
        ->join('playas', 'playas.id_playa', '=', 'muestreos.fk_playa')
        ->where('muestreos.autorizado','1')
        ->groupBy( 'id_playa','nombre_playa')
        ->get();

        $hallazgos = DB::table('hallazgos')
        ->select('id_muestreo', 'id_tipo','cantidad', 'porcentaje')
        ->join('muestreos', 'fk_muestreo', '=', 'id_muestreo')
        ->join('playas', 'fk_playa', '=', 'id_playa')
        ->join('tipo_residuos', 'fk_tipo', '=', 'id_tipo')
        ->where('id_playa',$id)
        ->where('muestreos.autorizado','1')
        ->get();
        $muestreos =muestreo::where('fk_playa', $id)->where('muestreos.autorizado','1')->orderBy('fk_playa')->orderBy('num_muestreo')->get();
        $residuos= tipo_residuo::all();
        $clasificaciones=Clasificacion::all();
        $num_muestreos= DB::table('muestreos')
            ->select('num_muestreo')->where('fk_playa',$id)->where('muestreos.autorizado','1')->groupBy('num_muestreo')->get();
        $zonas= DB::table('muestreos')
            ->select('zona')->where('fk_playa',$id)->where('muestreos.autorizado','1')->groupBy('zona')->get();
        
    return view('consultas',compact('playas','hallazgos','muestreos','residuos','clasificaciones','num_muestreos','zonas'));
    }

    public function showFilteredResults(Request $request){
        $id_playa = $request->playa;
        $id_clasificacion=$request->clasificacion;
        $num_muestreo = $request->muestreo;
        $id_zona = $request->zona;

        $playas= DB::table('muestreos')
        ->select('id_playa','nombre_playa')
        ->join('playas', 'playas.id_playa', '=', 'muestreos.fk_playa')
        ->where('muestreos.autorizado','1')
        ->groupBy( 'id_playa','nombre_playa')
        ->get();

        $hallazgos = DB::table('hallazgos')
        ->select('id_muestreo', 'id_tipo',  'cantidad', 'porcentaje')
        ->join('muestreos', 'fk_muestreo', '=', 'id_muestreo')
        ->join('playas', 'fk_playa', '=', 'id_playa')
        ->join('tipo_residuos', 'fk_tipo', '=', 'id_tipo');
        if($id_playa > 0){
            $hallazgos->where('id_playa',$id_playa);
        }
        if($num_muestreo > 0){
            $hallazgos->where('num_muestreo',$num_muestreo);
        }
        if($id_zona > 0){
            $hallazgos->where('zona',$id_zona);
        } 
        $hallazgos = $hallazgos->get();
        $muestreos= muestreo::query();
        if($id_playa > 0){
            $muestreos->where('fk_playa',$id_playa);
        }
        if($num_muestreo > 0){
            $muestreos->where('num_muestreo',$num_muestreo);
        }
        if($id_zona > 0){
            $muestreos->where('zona',$id_zona);
        }
        $muestreos->where('muestreos.autorizado','1');
    
        $muestreos->orderBy('fk_playa');
        $muestreos->orderBy('num_muestreo');

        $muestreos = $muestreos->get();
        $residuos= tipo_residuo::query();
        if($id_clasificacion > 0){
            $residuos->where('fk_clasificacion',$id_clasificacion);
        }
        $residuos = $residuos->orderBy('fk_clasificacion');
        $residuos = $residuos->get();
        $clasificaciones=Clasificacion::all();
        
        if($id_playa>0){
            $num_muestreos= DB::table('muestreos')
            ->select('num_muestreo')->where('fk_playa',$id_playa)->where('muestreos.autorizado','1')->groupBy('num_muestreo')->get();
            $zonas= DB::table('muestreos')
            ->select('zona')->where('fk_playa',$id_playa)->where('muestreos.autorizado','1')->groupBy('zona')->get();
        }
        else{
            $num_muestreos= DB::table('muestreos')
            ->select('num_muestreo')->where('muestreos.autorizado','1')->groupBy('num_muestreo')->get();
            $zonas= DB::table('muestreos')
            ->select('zona')->where('muestreos.autorizado','1')->groupBy('zona')->get();
        }
        
    return view('consultas',compact('playas','hallazgos','muestreos','residuos','clasificaciones','num_muestreos','zonas'));
    }
  
}
