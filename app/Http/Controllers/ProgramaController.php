<?php

namespace App\Http\Controllers;

use App\Programa;
use App\Processo;
use Illuminate\Http\Request;
use Uspdev\Replicado\Connection; 
use Uspdev\Replicado\Posgraduacao; 

class ProgramaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $programasReplicado = Posgraduacao::programas(config('ppgselecao.repUnd'));
        $programas = Programa::all();
        
        return view('programas.create', compact('programasReplicado', 'programas'));
    }

    /**$programasReplicado = Posgraduacao::programas(config('ppgselecao.repUnd'));
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {       
        $programa = new Programa;
        $programa->codcur       = $request->codcur;
        $programa->nomcur       = $request->nomcur;
        $programa->sglcur       = $request->sglcur;
        $programa->save();

        $programas = Programa::all();
        $processos = Processo::all();

        $request->session()->flash('alert-success', 'Programa cadastrado com sucesso!');

        return view('processos.create', compact('request', 'programas', 'processos'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Programa  $programa
     * @return \Illuminate\Http\Response
     */
    public function show(Programa $programa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Programa  $programa
     * @return \Illuminate\Http\Response
     */
    public function edit(Programa $programa)
    {
        $programasReplicado = Posgraduacao::programas(config('ppgselecao.repUnd'));

        return view('programas.edit', compact('programasReplicado', 'programa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Programa  $programa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Programa $programa)
    {
        $programa->codcur       = $request->codcur;
        $programa->nomcur       = $request->nomcur;
        $programa->sglcur       = $request->sglcur;
        $programa->save();

        $programasReplicado = Posgraduacao::programas(config('ppgselecao.repUnd'));
        $programas = Programa::all();

        $request->session()->flash('alert-success', 'Programa alterado com sucesso!');
        
        return view('programas.create', compact('programasReplicado', 'programas'));        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Programa  $programa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Programa $programa)
    {
        $programa->delete();
        
        $programasReplicado = Posgraduacao::programas(config('ppgselecao.repUnd'));
        $programas = Programa::all();

        $request->session()->flash('alert-danger', 'Programa apagado!');
        
        return view('programas.create', compact('programasReplicado', 'programas'));
    }
}
