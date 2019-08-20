@extends('laravel-usp-theme::master')

@section('title') {{ config('app.name') }} - {{ config('ppgselecao.sisDesc') }} @endsection

@section('content')

@include('flash')

<h5>{{ App\Programa::where('codcur', $programa['codcur'])->get()[0]['sglcur'] }}
        {{ Uspdev\Replicado\Posgraduacao::programas(config('ppgselecao.repUnd'), $programa['codcur'])[0]['nomcur'] }}</h5>

<form method="POST" action="/programas/{{ $programa['id'] }}" class="border border-info rounded p-3">
    {{ csrf_field() }} 
    {{ method_field('patch') }} 
    <div class="form-group row">
        <label for="codcur" class="col-form-label col1 px-3">Programa</label>
        <div class="col1">
            <select class="form-control form-control-sm" id="codcur" name="codcur" required>
                @foreach ($programasReplicado as $programaReplicado)
                    @if ($programaReplicado['codcur'] == $programa['codcur'])
                        <option value="{{ $programaReplicado['codcur'] }}" selected>{{ $programaReplicado['nomcur'] }}</option>
                    @else
                        <option value="{{ $programaReplicado['codcur'] }}">{{ $programaReplicado['nomcur'] }}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row px-3">
        <label for="nomcur" class="col-form-label col1">Nome</label>
        <div class="w-75 px-3">
            <input type="text" class="form-control form-control-sm" id="nomcur" name="nomcur" value="{{ $programa->nomcur }}">
        </div>
    </div>  
    <div class="form-group row px-3">
        <label for="sglcur" class="col-form-label col1">Sigla</label>
        <div class="col1 form-inline px-3">
            <input type="text" class="form-control form-control-sm" id="sglcur" name="sglcur" value="{{ $programa->sglcur }}">
        </div>
    </div>    
    <div class="form-group row p-3">
        <button type="submit" class="btn btn-info" title="Salvar Novo Programa">Salvar</button>
    </div>
</form>
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
