@extends('laravel-usp-theme::master')

@section('title') {{ config('app.name') }} - {{ config('inscricoes.sisDesc') }} @endsection

@section('content')

@include('flash')

<h5>Nova Vaga</h5>

<form method="POST" action="/vagas" class="border border-info rounded p-3">
    {{ csrf_field() }}  
    <div class="form-group row">
        <label for="titulo" class="col-form-label col1 px-3">Título</label>
        <div class="w-75">
            <input type="text" class="form-control form-control-sm" id="titulo" name="titulo" placeholder="Título da Vaga" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="inicio" class="col-form-label col1 px-3">Inscrições de</label>
        <div class="col1 form-inline">
            <input type="text" class="form-control form-control-sm datepicker mr-3" id="inicio" name="inicio" placeholder="dd/mm/aaaa" 
                pattern="^([0-2][0-9]|(3)[0-1])(\/)(((0)[0-9])|((1)[0-2]))(\/)\d{4}$" required>
            <input type="text" class="form-control form-control-sm" id="inicioTime" name="inicioTime" placeholder="hh:mm" 
                pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]" required>
        </div>
        <label for="fim" class="col-form-label col2 px-3">à</label>
        <div class="col2 form-inline">
            <input type="text" class="form-control form-control-sm datepicker mr-3" id="fim" name="fim" placeholder="dd/mm/aaaa" 
                pattern="^([0-2][0-9]|(3)[0-1])(\/)(((0)[0-9])|((1)[0-2]))(\/)\d{4}$" required> 
            <input type="text" class="form-control form-control-sm" id="fimTime" name="fimTime" placeholder="hh:mm" 
                pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="status" class="col-form-label col1 px-3">Status</label> 
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" id="status" name="status" value="Em elaboração" checked>
            <label class="form-check-label" for="status"> Em elaboração</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" id="status" name="status" value="Publicado">
            <label class="form-check-label" for="status"> Publicado</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" id="status" name="status" value="Concluido">
            <label class="form-check-label" for="status"> Concluido</label>
        </div>
    </div>       
    <div class="form-group row px-3">
        <button type="submit" class="btn btn-info" title="Salvar Nova Vaga">Salvar</button>
    </div>
</form>
@endsection



