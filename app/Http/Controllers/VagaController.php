<?php

namespace App\Http\Controllers;

use App\Vaga;
use App\Programa;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Uspdev\Replicado\Connection; 
use Uspdev\Replicado\Posgraduacao; 

class VagaController extends Controller
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
        $vagas = Vaga::all();

        return view('vagas.index', compact('vagas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $programas = Programa::all();

        $vagas = Vaga::all();

        return view('vagas.create', compact('vagas', 'programas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vaga = new Vaga;
        $vaga->titulo           = $request->titulo;
        $vaga->codcur           = $request->codcur;
        $vaga->inicio           = Carbon::createFromFormat('d/m/Y H:i', $request->inicio . ' ' . $request->inicioTime)->format('Y-m-d H:i');
        $vaga->fim              = Carbon::createFromFormat('d/m/Y H:i', $request->fim . ' ' . $request->fimTime)->format('Y-m-d H:i');
        $vaga->niveis           = implode(',', array_filter(array($request->niveisME, $request->niveisDO, $request->niveisDD)));
        $vaga->status           = $request->status;
        $vaga->data_elaborado   = Carbon::now()->format('Y-m-d H:i');
        $vaga->save();

        $vagas = Vaga::all();
        
        $request->session()->flash('alert-success', 'Vaga cadastrada com sucesso!');

        return view('vagas.index', compact('request', 'vagas'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vaga  $vaga
     * @return \Illuminate\Http\Response
     */
    public function show(Vaga $vaga)
    {
        $niveis = explode(',', $vaga->niveis);
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
        
        return view('vagas.show', compact('vaga', 'niveis'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vaga  $vaga
     * @return \Illuminate\Http\Response
     */
    public function edit(Vaga $vaga)
    {
        $programasReplicado = Posgraduacao::programas(config('inscricoes.repUnd'));
        $programas = Programa::all();
       
        return view('vagas.edit', compact('vaga', 'programas', 'programasReplicado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vaga  $vaga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vaga $vaga)
    {
        $vaga->titulo       = $request->titulo;
        $vaga->codcur       = $request->codcur;
        $vaga->inicio       = Carbon::createFromFormat('d/m/Y H:i', $request->inicio . ' ' . $request->inicioTime)->format('Y-m-d H:i');
        $vaga->fim          = Carbon::createFromFormat('d/m/Y H:i', $request->fim . ' ' . $request->fimTime)->format('Y-m-d H:i');
        $vaga->niveis       = implode(',', array_filter(array($request->niveisME, $request->niveisDO, $request->niveisDD)));
        if ($vaga->status != $request->status and $request->status == 'Publicado') {
            $vaga->data_publicado = Carbon::now()->format('Y-m-d H:i');
        } elseif ($vaga->status != $request->status and $request->status == 'Concluido') {
            $vaga->data_concluido = Carbon::now()->format('Y-m-d H:i');
        }       
        $vaga->status       = $request->status;
        $vaga->save();

        $vagas = Vaga::all();
        
        $request->session()->flash('alert-success', 'Vaga alterada com sucesso!');

        return view('vagas.index', compact('request', 'vagas'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vaga  $vaga
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Vaga $vaga)
    {
        $vaga->delete();

        $vagas = Vaga::all();

        $request->session()->flash('alert-danger', 'Vaga apagada!');

        return view('vagas.index', compact('vagas'));
    }
}
