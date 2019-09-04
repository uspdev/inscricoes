@extends('laravel-usp-theme::master')

@section('title') {{ config('app.name') }} - {{ config('inscricoes.sisDesc') }} @endsection

@section('content')

@include('flash')

<h5>{{ $vaga->titulo }}</h5>

<div class="border border-info rounded p-3 mt-3">
    <table class="table table-striped table-bordered mt-3">
        <tbody>
            <tr>
                <th scope="col">Programa</th>
                <td>{{ App\Programa::where('codcur', $vaga->codcur)->get()[0]['sglcur'] }}
                    {{ Uspdev\Replicado\Posgraduacao::programas(config('inscricoes.repUnd'), $vaga->codcur)[0]['nomcur'] }}</td>
            </tr>
            <tr>
                <th scope="col">Inscrições</th>
                <td>de {{ Carbon\Carbon::parse($vaga->inicio)->format('d/m/Y H:i') }} à 
                    {{ Carbon\Carbon::parse($vaga->fim)->format('d/m/Y H:i') }}</td>
            </tr>
            <tr>
                <th scope="col">Níveis</th>
                <td>{{ $niveis }}</td>
            </tr>
            <tr>
                <th scope="col">Status</th>
            <td>
                {{ $vaga->status }}
                @if ($vaga->status == 'Publicado')
                    em {{ Carbon\Carbon::parse($vaga->data_publicado)->format('d/m/Y H:i') }}
                @elseif ($vaga->status == 'Concluido')
                    em {{ Carbon\Carbon::parse($vaga->data_concluido)->format('d/m/Y H:i') }}
                @endif
            </td>
            </tr>            
            <tr>
                <th scope="col">Edital</th>
                <td>Link para o edital</td>
            </tr> 
            @if ($vaga->status == 'Publicado')
                @if (Carbon\Carbon::parse($vaga->inicio)->isPast())
                    @if (!Carbon\Carbon::parse($vaga->fim)->isPast())
            <tr>
                <td colspan="2">
                    <button type="button" class="btn btn-info btn" title="Inscreva-se" onclick="">
                        <i class="material-icons">done</i> Inscreva-se</button>
                </td>
            </tr>
                    @endif
                @endif
            @endif  
        </tbody>
    </table>
</div>
@endsection



