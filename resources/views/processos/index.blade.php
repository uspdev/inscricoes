@extends('laravel-usp-theme::master')

@section('title') {{ config('app.name') }} - {{ config('ppgselecao.sisDesc') }} @endsection

@section('content')
    <h5>Processos seletivos</h5>

    @auth
        <button type="button" class="btn btn-info" title="Novo Processo Seletivo"
            onclick="location.href='/processos/create';">Novo</button>
    @endauth
    
    <ul>
        @foreach ($processos as $processo)
            <li>{{ $processo->titulo }}</li>
        @endforeach
    </ul>
@endsection



