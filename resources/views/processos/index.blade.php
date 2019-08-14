@extends('laravel-usp-theme::master')

@section('title') {{ config('app.name') }} - {{ config('ppgselecao.sisDesc') }} @endsection

@section('content')
    Processos seletivos
    <ul>
        @foreach ($processos as $processo)
            <li>{{ $processo->titulo }}</li>
        @endforeach
    </ul>
@endsection



