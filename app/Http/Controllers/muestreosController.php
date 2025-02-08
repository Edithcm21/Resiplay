<?php

namespace App\Http\Controllers;

use App\Models\muestreo;
use App\Models\Playa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\AssignOp\Concat;

class muestreosController extends Controller
{
    
    public function index()
    {
        $playas= DB::table('muestreos')
        ->select('id_playa','nombre_playa')
        ->join('playas', 'playas.id_playa', '=', 'muestreos.fk_playa')
        ->groupBy( 'id_playa','nombre_playa')
        ->get();
        $muestreos=muestreo::orderBy('fk_playa')->get();
       
        return Auth::user()->rol=='admin' 
        ? view('views_admin.Muestreos',compact('muestreos','playas'))
        : view('views_capturista.Muestreos',compact('muestreos','playas')); 
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $id=$request->id;
        if ($id==0) {
            $muestreos=muestreo::orderBy('fk_playa')->get();
        }
        else{
            $muestreos=muestreo::where('fk_playa',$id)->orderBy('fk_playa')->get();
        }
        $playas= DB::table('muestreos')
        ->select('id_playa','nombre_playa')
        ->join('playas', 'playas.id_playa', '=', 'muestreos.fk_playa')
        ->groupBy( 'id_playa','nombre_playa')
        ->get();
        
       
        return Auth::user()->rol=='admin' 
        ? view('views_admin.Muestreos',compact('muestreos','playas'))
        : view('views_capturista.Muestreos',compact('muestreos','playas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(muestreo $muestreo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, muestreo $muestreo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(muestreo $muestreo)
    {
        //
    }
}
