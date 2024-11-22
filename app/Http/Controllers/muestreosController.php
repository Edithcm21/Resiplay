<?php

namespace App\Http\Controllers;

use App\Models\muestreo;
use App\Models\Playa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\AssignOp\Concat;

class muestreosController extends Controller
{
    
    public function index()
    {
        // $playaId = $request->input('playa');
        
        $muestreos=muestreo::orderBy('fk_playa')->get();
        return Auth::user()->rol=='admin' 
        ? view('views_admin.Muestreos',compact('muestreos'))
        : view('views_capturista.Muestreos',compact('muestreos'));
       
        
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
    public function show(muestreo $muestreo)
    {
        //
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
