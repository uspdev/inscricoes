@extends('laravel-usp-theme::master')

@section('title') {{ config('app.name') }} - {{ config('ppgselecao.sisDesc') }} @endsection

@section('content')
<h5>Novo Programa de Pós-Graduação</h5>

<form method="POST" action="/programas" class="border border-info rounded p-3">
    {{ csrf_field() }}  
    <div class="form-group row">
        <label for="codcur" class="col-form-label col1 px-3">Programa</label>
        <div class="col1">
            <select class="form-control form-control-sm" id="codcur" name="codcur" required>
                @foreach ($programasReplicado as $programaReplicado)
                <option value="{{ $programaReplicado['codcur'] }}">{{ $programaReplicado['nomcur'] }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row px-3">
        <label for="nomcur" class="col-form-label col1">Nome</label>
        <div class="w-75 px-3">
            <input type="text" class="form-control form-control-sm" id="nomcur" name="nomcur">
        </div>
    </div>  
    <div class="form-group row px-3">
        <label for="sglcur" class="col-form-label col1">Sigla</label>
        <div class="col1 form-inline px-3">
            <input type="text" class="form-control form-control-sm" id="sglcur" name="sglcur">
        </div>
    </div>    
    <div class="form-group row p-3">
        <button type="submit" class="btn btn-info" title="Salvar Novo Programa">Salvar</button>
    </div>
</form>

<div class="border border-info rounded p-3 mt-3">
    <table class="table table-striped table-bordered dataTable mt-3">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Sigla</th>
                <th scope="col">Nome</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($programas as $programa)
            <tr>
                <th scope="row">{{ $programa->id }}</th>
                <td>{{ $programa->sglcur }}</td>
                <td>{{ $programa->nomcur }}</td>
                <td>
                    <button type="button" class="btn btn-info btn-sm" title="Alterar" onclick="location.href='/prograamas/{{ $programa->id }}';">
                        <i class="material-icons md-18">create</i></button>
                    <button type="button" class="btn btn-info btn-sm" title="Apagar" onclick="location.href='/prograamas/{{ $programa->id }}';">
                        <i class="material-icons md-18">remove_circle_outline</i></button>                
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@endsection

@section('javascripts_bottom')
    @parent
    <script>
        $(function() {
            var selectedText = $("#codcur option:selected").html();
            $("#nomcur").val(selectedText);
        });
        $("#codcur").change(function(){
            var selectedText = $("#codcur option:selected").html();
            $("#nomcur").val(selectedText);
        }); 
    </script>
@endsection
