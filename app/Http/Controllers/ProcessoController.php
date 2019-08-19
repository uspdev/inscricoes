<?php

namespace App\Http\Controllers;

use App\Processo;
use App\Programa;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ProcessoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $processos = Processo::all();

        return view('processos.index', compact('processos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $programas = Programa::all();

        return view('processos.create', compact('programas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $processos = Processo::all();

        $processo = new Processo;
        $processo->titulo       = $request->titulo;
        $processo->codcur       = $request->codcur;
        $processo->inicio       = Carbon::createFromFormat('d/m/Y H:i', $request->inicio . ' ' . $request->inicioTime)->format('Y-m-d H:i');
        $processo->fim          = Carbon::createFromFormat('d/m/Y H:i', $request->fim . ' ' . $request->fimTime)->format('Y-m-d H:i');
        $processo->niveis       = implode(',', array_filter(array($request->niveisME, $request->niveisDO, $request->niveisDD)));
        $processo->status       = $request->status;
        if (!empty($request->publicacao)) {
            $processo->publicacao   = Carbon::createFromFormat('d/m/Y H:i', $request->publicacao . ' ' . $request->publicacaoTime)->format('Y-m-d H:i');
        } 
        $processo->save();

        return view('processos.index', compact('request', 'processos'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Processo  $processo
     * @return \Illuminate\Http\Response
     */
    public function show(Processo $processo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Processo  $processo
     * @return \Illuminate\Http\Response
     */
    public function edit(Processo $processo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Processo  $processo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Processo $processo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Processo  $processo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Processo $processo)
    {
        //
    }
}
