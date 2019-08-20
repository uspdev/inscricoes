@extends('laravel-usp-theme::master')

@section('title') {{ config('app.name') }} - {{ config('ppgselecao.sisDesc') }} @endsection

@section('content')

@include('flash')

<h5>{{ $processo->titulo }}</h5>

<form method="POST" action="/processos/{{ $processo->id }}" class="border border-info rounded p-3">
    {{ csrf_field() }}  
    {{ method_field('patch') }} 
    <div class="form-group row">
        <label for="titulo" class="col-form-label col1 px-3">Título</label>
        <div class="w-75">
            <input type="text" class="form-control form-control-sm" id="titulo" name="titulo" placeholder="Título do Processo Seletivo" 
                value="{{ $processo->titulo }}" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="codcur" class="col-form-label col1 px-3">Programa</label>
        <div class="col1">
            <select class="form-control form-control-sm" id="codcur" name="codcur" required>
                @foreach ($programasReplicado as $programaReplicado)
                    @if ($programaReplicado['codcur'] == $processo['codcur'])
                        <option value="{{ $programaReplicado['codcur'] }}" selected>{{ $programaReplicado['nomcur'] }}</option>
                    @else
                        <option value="{{ $programaReplicado['codcur'] }}">{{ $programaReplicado['nomcur'] }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="col1 px-3">
            <button type="button" class="btn btn-info btn-sm" title="Novo Programa de Pós-Graduação" 
                onclick="location.href='/programas/create';"><i class="material-icons md-18">add_circle_outline</i></button></button>
        </div>
    </div>
    <div class="form-group row px-3">
        <fieldset class="row">
            <label for="inicio" class="col-form-label col1 px-3">Inscrições de</label>
            <div class="col1 form-inline">
                <input type="text" class="form-control form-control-sm datepicker mr-3" id="inicio" name="inicio" placeholder="dd/mm/aaaa" 
                    pattern="^([0-2][0-9]|(3)[0-1])(\/)(((0)[0-9])|((1)[0-2]))(\/)\d{4}$" 
                    value="{{ Carbon\Carbon::parse($processo->inicio)->format('d/m/Y') }}" required>
                <input type="text" class="form-control form-control-sm" id="inicioTime" name="inicioTime" placeholder="hh:mm" 
                    pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]" value="{{ Carbon\Carbon::parse($processo->inicio)->format('H:i') }}" required>
            </div>
            <label for="fim" class="col-form-label col2 px-3">à</label>
            <div class="col2 form-inline">
                <input type="text" class="form-control form-control-sm datepicker mr-3" id="fim" name="fim" placeholder="dd/mm/aaaa" 
                    pattern="^([0-2][0-9]|(3)[0-1])(\/)(((0)[0-9])|((1)[0-2]))(\/)\d{4}$" 
                    value="{{ Carbon\Carbon::parse($processo->fim)->format('d/m/Y') }}" required> 
                <input type="text" class="form-control form-control-sm" id="fimTime" name="fimTime" placeholder="hh:mm" 
                    pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]" value="{{ Carbon\Carbon::parse($processo->fim)->format('H:i') }}" required>
            </div>
        </fieldset>
    </div>
    <div class="form-group row px-3">
        <fieldset class="row">
            <label for="niveis" class="col-form-label col1 px-3">Níveis</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="niveisME" id="niveisME" value="ME" 
                    {{ (strpos($processo->niveis, 'ME') !== false) ? 'checked' : '' }}>
                <label class="form-check-label" for="niveisME"> Mestrado</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="niveisDO" id="niveisDO" value="DO" 
                    {{ (strpos($processo->niveis, 'DO') !== false) ? 'checked' : '' }}>
                <label class="form-check-label" for="niveisDO"> Doutorado</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="niveisDD" id="niveisDD" value="DD" 
                    {{ (strpos($processo->niveis, 'DD') !== false) ? 'checked' : '' }}>
                <label class="form-check-label" for="niveisDD"> Doutorado Direto</label>
            </div>
        </fieldset>
    </div>
    <div class="form-group row px-3">
        <fieldset class="row">
            <label for="status" class="col-form-label col1 px-3">Status</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="status" name="status" value="Em elaboração" 
                    {{ ($processo->status == 'Em elaboração') ? 'checked' : '' }}>
                <label class="form-check-label" for="status"> Em elaboração</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="status" name="status" value="Publicado" 
                    {{ ($processo->status == 'Publicado') ? 'checked' : '' }}>
                <label class="form-check-label" for="status"> Publicado</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="status" name="status" value="Concluido" 
                    {{ ($processo->status == 'Concluido') ? 'checked' : '' }}>
                <label class="form-check-label" for="status"> Concluido</label>
            </div>
        </fieldset>
    </div>   
    <div class="form-group row px-3">
        <label for="inicio" class="col-form-label col1">Publicação</label>
        <div class="col1 form-inline px-3">
            <input type="text" class="form-control form-control-sm datepicker mr-3" id="publicacao" name="publicacao" placeholder="dd/mm/aaaa" 
                    pattern="^([0-2][0-9]|(3)[0-1])(\/)(((0)[0-9])|((1)[0-2]))(\/)\d{4}$" 
                    value="{{ Carbon\Carbon::parse($processo->publicacao)->format('d/m/Y') }}">
            <input type="text" class="form-control form-control-sm" id="publicacaoTime" name="publicacaoTime" placeholder="hh:mm" 
                    pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]" value="{{ Carbon\Carbon::parse($processo->publicacao)->format('H:i') }}">
        </div>
    </div>    
    <div class="form-group row p-3">
        <button type="submit" class="btn btn-info" title="Salvar Novo Processo Seletivo">Salvar</button>
    </div>
</form>
@endsection



