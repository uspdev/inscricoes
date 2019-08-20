@extends('laravel-usp-theme::master')

@section('title') {{ config('app.name') }} - {{ config('ppgselecao.sisDesc') }} @endsection

@section('content')

@include('flash')

<h5>Processo seletivo {{ $processo->titulo }}</h5>

<div class="border border-info rounded p-3 mt-3">
    <table class="table table-striped table-bordered mt-3">
        <tbody>
            <tr>
                <th scope="col">Programa</th>
                <td>{{ App\Programa::where('codcur', $processo->codcur)->get()[0]['sglcur'] }}
                    {{ Uspdev\Replicado\Posgraduacao::programas(config('ppgselecao.repUnd'), $processo->codcur)[0]['nomcur'] }}</td>
            </tr>
            <tr>
                <th scope="col">Inscrições</th>
                <td>de {{ Carbon\Carbon::parse($processo->inicio)->format('d/m/Y H:i') }} à 
                    {{ Carbon\Carbon::parse($processo->fim)->format('d/m/Y H:i') }}</td>
            </tr>
            <tr>
                <th scope="col">Níveis</th>
                <td>{{ $niveis }}</td>
            </tr>
            <tr>
                <th scope="col">Status</th>
                <td>{{ $processo->status }}</td>
            </tr>            
            <tr>
                <th scope="col">Publicação</th>
                <td>{{ Carbon\Carbon::parse($processo->publicacao)->format('d/m/Y H:i') }}</td>
            </tr>            
        </tbody>
    </table>
</div>
@endsection



