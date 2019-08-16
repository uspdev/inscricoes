@extends('laravel-usp-theme::master')

@section('title') {{ config('app.name') }} - {{ config('ppgselecao.sisDesc') }} @endsection

@section('content')
<h5>Processos seletivos</h5>

@auth
<button type="button" class="btn btn-info" title="Novo Processo Seletivo"
    onclick="location.href='/processos/create';">Novo</button>
@endauth

<div class=" border border-info rounded p-3 mt-3">
    <table class="table table-striped table-bordered dataTable mt-3">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Título</th>
                <th scope="col">Status</th>
                <th scope="col">Publicação</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($processos as $processo)
            @if ($processo->status == 'Publicado')
            <tr>
                <th scope="row">{{ $processo->id }}</th>
                <td>{{ $processo->titulo }}</td>
                <td>{{ $processo->status }}</td>
                <td>{{ Carbon\Carbon::parse($processo->publicacao)->format('d/m/Y') }} 
                    às {{ Carbon\Carbon::parse($processo->publicacao)->format('H:i') }}</td> 
            </tr>
            @else
                @auth 
                <tr>
                    <th scope="row">{{ $processo->id }}</th>
                    <td>{{ $processo->titulo }}</td>
                    <td>{{ $processo->status }}</td>
                    <td>
                    @if (!empty($processo->publicacao))
                        {{ Carbon\Carbon::parse($processo->publicacao)->format('d/m/Y') }} 
                        às {{ Carbon\Carbon::parse($processo->publicacao)->format('H:i') }}
                    @endif
                    </td> 
                </tr>
                @endauth
            @endif
        @endforeach
        </tbody>
    </table>
</div>
@endsection



