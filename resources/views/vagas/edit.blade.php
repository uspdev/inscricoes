@extends('laravel-usp-theme::master')

@section('title') {{ config('app.name') }} - {{ config('inscricoes.sisDesc') }} @endsection

@section('content')

@include('flash')

<h5>{{ $vaga->titulo }}</h5>

<form method="POST" action="/vagas/{{ $vaga->id }}" class="border border-info rounded p-3">
    {{ csrf_field() }}  
    {{ method_field('patch') }} 
    <div class="form-group row">
        <label for="titulo" class="col-form-label col1 px-3">Título</label>
        <div class="w-75">
            <input type="text" class="form-control form-control-sm" id="titulo" name="titulo" placeholder="Título da Vaga" 
                value="{{ $vaga->titulo }}" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="inicio" class="col-form-label col1 px-3">Inscrições de</label>
        <div class="col1 form-inline">
            <input type="text" class="form-control form-control-sm datepicker mr-3" id="inicio" name="inicio" placeholder="dd/mm/aaaa" 
                pattern="^([0-2][0-9]|(3)[0-1])(\/)(((0)[0-9])|((1)[0-2]))(\/)\d{4}$" 
                value="{{ Carbon\Carbon::parse($vaga->inicio)->format('d/m/Y') }}" required>
            <input type="text" class="form-control form-control-sm" id="inicioTime" name="inicioTime" placeholder="hh:mm" 
                pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]" value="{{ Carbon\Carbon::parse($vaga->inicio)->format('H:i') }}" required>
        </div>
        <label for="fim" class="col-form-label col2 px-3">à</label>
        <div class="col2 form-inline">
            <input type="text" class="form-control form-control-sm datepicker mr-3" id="fim" name="fim" placeholder="dd/mm/aaaa" 
                pattern="^([0-2][0-9]|(3)[0-1])(\/)(((0)[0-9])|((1)[0-2]))(\/)\d{4}$" 
                value="{{ Carbon\Carbon::parse($vaga->fim)->format('d/m/Y') }}" required> 
            <input type="text" class="form-control form-control-sm" id="fimTime" name="fimTime" placeholder="hh:mm" 
                pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]" value="{{ Carbon\Carbon::parse($vaga->fim)->format('H:i') }}" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="status" class="col-form-label col1 px-3">Status</label>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" id="status" name="status" value="Em elaboração" 
                {{ ($vaga->status == 'Em elaboração') ? 'checked' : '' }}>
            <label class="form-check-label" for="status"> Em elaboração</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" id="status" name="status" value="Publicado" 
                {{ ($vaga->status == 'Publicado') ? 'checked' : '' }}>
            <label class="form-check-label" for="status"> Publicado</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" id="status" name="status" value="Concluido" 
                {{ ($vaga->status == 'Concluido') ? 'checked' : '' }}>
            <label class="form-check-label" for="status"> Concluido</label>
        </div>
    </div>     
    <div class="form-group row px-3">
        <button type="submit" class="btn btn-info" title="Salvar Nova Vaga">Salvar</button>
    </div>
</form>
@endsection



