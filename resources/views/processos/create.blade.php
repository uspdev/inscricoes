@extends('laravel-usp-theme::master')

@section('title') {{ config('app.name') }} - {{ config('ppgselecao.sisDesc') }} @endsection

@section('content')
    <h5>Novo Processo Seletivo</h5>

    <form method="POST" action="/processos" class="border border-info rounded p-3">
        {{ csrf_field() }}  
        <div class="form-group row">
            <label for="titulo" class="col-form-label col1 px-3">Título</label>
            <div class="w-75">
                <input type="text" class="form-control form-control-sm" id="titulo" name="titulo" placeholder="Título do Processo Seletivo" required
                    aria-describedby="tituloHelp">
                    <small id="tituloHelp" class="form-text text-muted">Título deve ser único?</small>
            </div>
        </div>
        <div class="form-group row">
            <label for="codcur" class="col-form-label col1 px-3">Programa</label>
            <div class="col1">
                <select class="form-control form-control-sm" id="codcur" name="codcur" required
                    aria-describedby="codcurHelp">
                    <option value="27005">PPGAC</option>
                    <option value="27007">PPGAV</option>
                </select>
                <small id="codcurHelp" class="form-text text-muted">Trazer do replicado.</small>
            </div>
        </div>
        <div class="form-group row px-3">
            <fieldset class="row">
                <label for="inicio" class="col-form-label col1 px-3">Inscrições de</label>
                <div class="col1">
                    <input type="text" class="form-control form-control-sm" id="inicio" name="inicio" placeholder="dd/mm/aaaa hh:mm" required
                        aria-describedby="dataHelp">
                    <small id="dataHelp" class="form-text text-muted">Datepicker. Abertura das inscrições.</small>
                </div>
                <label for="fim" class="col-form-label col2 px-3">à</label>
                <div class="col2">
                    <input type="text" class="form-control form-control-sm" id="fim" name="fim" placeholder="dd/mm/aaaa hh:mm" required
                        aria-describedby="dataHelp">
                    <small id="dataHelp" class="form-text text-muted">Datepicker. Encerramento das inscrições.</small>
                </div>
            </fieldset>
        </div>
        <div class="form-group row px-3">
            <fieldset class="row">
                <label for="niveis" class="col-form-label col1 px-3">Níveis</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="niveisME" id="niveisME" value="ME">
                    <label class="form-check-label" for="niveisME"> Mestrado</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="niveisDO" id="niveisDO" value="DO">
                    <label class="form-check-label" for="niveisDO"> Doutorado</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="niveisDD" id="niveisDD" value="DD">
                    <label class="form-check-label" for="niveisDD"> Doutorado Direto</label>
                </div>
            </fieldset>
        </div>
        <div class="form-group row px-3">
            <fieldset class="row">
                <label for="status" class="col-form-label col1 px-3">Status</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="status" name="status" value="Em Elaboração" checked>
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
            </fieldset>
        </div>   
        <div class="form-group row px-3">
        <label for="inicio" class="col-form-label col1">Publicação</label>
            <div class="col1 px-3">
                <input type="text" class="form-control form-control-sm" id="publicacao" name="publicacao" placeholder="dd/mm/aaaa hh:mm">
                <small id="dataHelp" class="form-text text-muted">Datepicker. Publicação do Processo Seletivo.</small>
            </div>
        </div>    
        <div class="form-group row p-3">
            <button type="submit" class="btn btn-info" title="Salvar Novo Processo Seletivo">Salvar</button>
        </div>
    </form>
    
@endsection



