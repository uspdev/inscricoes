<?php

namespace App\Http\Controllers;

use App\Processo;
use App\Programa;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Uspdev\Replicado\Connection; 
use Uspdev\Replicado\Posgraduacao; 

class ProcessoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
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
        $processo = new Processo;
        $processo->titulo       = $request->titulo;
        $processo->codcur       = $request->codcur;
        $processo->inicio       = Carbon::createFromFormat('d/m/Y H:i', $request->inicio . ' ' . $request->inicioTime)->format('Y-m-d H:i');
        $processo->fim          = Carbon::createFromFormat('d/m/Y H:i', $request->fim . ' ' . $request->fimTime)->format('Y-m-d H:i');
        $processo->niveis       = implode(',', array_filter(array($request->niveisME, $request->niveisDO, $request->niveisDD)));
        $processo->status       = $request->status;
        $processo->save();

        $processos = Processo::all();
        
        $request->session()->flash('alert-success', 'Processo Seletivo cadastrado com sucesso!');

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
        $niveis = explode(',', $processo->niveis);
        $arrNiveis = array();
        foreach ($niveis as $nivel) {
            switch ($nivel) {
                case 'ME':
                    array_push($arrNiveis, 'Mestrado');
                    break;
                case 'DO':
                    array_push($arrNiveis, 'Doutorado');
                    break;
                case 'DD':
                    array_push($arrNiveis, 'Doutorado Direto');
                    break;    
            }
        }
        
        $niveis = implode(', ', $arrNiveis);
        
        return view('processos.show', compact('processo', 'niveis'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Processo  $processo
     * @return \Illuminate\Http\Response
     */
    public function edit(Processo $processo)
    {
        $programasReplicado = Posgraduacao::programas(config('ppgselecao.repUnd'));
        $programas = Programa::all();
       
        return view('processos.edit', compact('processo', 'programas', 'programasReplicado'));
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
        $processo->titulo       = $request->titulo;
        $processo->codcur       = $request->codcur;
        $processo->inicio       = Carbon::createFromFormat('d/m/Y H:i', $request->inicio . ' ' . $request->inicioTime)->format('Y-m-d H:i');
        $processo->fim          = Carbon::createFromFormat('d/m/Y H:i', $request->fim . ' ' . $request->fimTime)->format('Y-m-d H:i');
        $processo->niveis       = implode(',', array_filter(array($request->niveisME, $request->niveisDO, $request->niveisDD)));
        $processo->status       = $request->status;
        $processo->save();

        $processos = Processo::all();
        
        $request->session()->flash('alert-success', 'Processo Seletivo alterado com sucesso!');

        return view('processos.index', compact('request', 'processos'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Processo  $processo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Processo $processo)
    {
        $processo->delete();

        $processos = Processo::all();

        $request->session()->flash('alert-danger', 'Processo Seletivo apagado!');

        return view('processos.index', compact('processos'));
    }
}
