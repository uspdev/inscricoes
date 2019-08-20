@extends('laravel-usp-theme::master')

@section('title') {{ config('app.name') }} - {{ config('ppgselecao.sisDesc') }} @endsection

@section('content')

@include('flash')

<h5>Processos seletivos</h5>

@auth
<button type="button" class="btn btn-info" title="Novo Processo Seletivo"
    onclick="location.href='/processos/create';">Novo</button>
@endauth

<div class="border border-info rounded p-3 mt-3">
    <table class="table table-striped table-bordered dataTable mt-3">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Título</th>
                <th scope="col">Níveis</th>
                <th scope="col">Status</th>
                <th scope="col">Publicação</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($processos as $processo)
            <tr>
                <th scope="row">{{ $processo->id }}</th>
                <td>{{ $processo->titulo }}</td>
                <td>{{ $processo->niveis }}</td>
                <td>{{ $processo->status }}</td>
                @if ($processo->status == 'Publicado')
                <td>{{ Carbon\Carbon::parse($processo->publicacao)->format('d/m/Y') }} 
                    às {{ Carbon\Carbon::parse($processo->publicacao)->format('H:i') }}</td> 
                @else
                <td>&nbsp;</td> 
                @endif
                <td>
                    @auth
                    <form method="POST" id="processo{{ $processo->id }}" action="/processos/{{ $processo->id }}">
                    @endauth
                        <button type="button" class="btn btn-info btn-sm" title="Ver" onclick="location.href='/processos/{{ $processo->id }}';">
                            <i class="material-icons md-18">visibility</i></button>                    
                        @auth 
                        <button type="button" class="btn btn-info btn-sm" title="Alterar" onclick="location.href='/processos/{{ $processo->id }}/edit';">
                            <i class="material-icons md-18">create</i></button>
                        {{ csrf_field() }}
                        {{ method_field('delete') }}    
                        <button type="button" class="btn btn-info btn-sm" title="Apagar" onclick="$('#processo{{ $processo->id }}').submit();">
                            <i class="material-icons md-18">remove_circle_outline</i></button>
                    </form>
                    @endauth
                </td>                
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection



