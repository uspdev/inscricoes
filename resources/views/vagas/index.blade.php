@extends('laravel-usp-theme::master')

@section('title') {{ config('app.name') }} - {{ config('inscricoes.sisDesc') }} @endsection

@section('content')

@include('flash')

<h5>Vagas</h5>

@auth
<button type="button" class="btn btn-info" title="Nova Vaga"
    onclick="location.href='/vagas/create';">Nova</button>
@endauth

<div class="border border-info rounded p-3 mt-3">
    <table class="table table-striped table-bordered dataTable mt-3">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Título</th>
                <th scope="col">Status</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($vagas as $vaga)
            @if ($vaga->status == 'Publicado' or Auth::check())
            <tr>
                <th scope="row">{{ $vaga->id }}</th>
                <td>{{ $vaga->titulo }}</td>
                <td>{{ $vaga->status }}</td>
                <td>
                    @auth
                    <form method="POST" id="vaga{{ $vaga->id }}" action="/vagas/{{ $vaga->id }}">
                    @endauth
                        <button type="button" class="btn btn-info btn-sm" title="Ver" onclick="location.href='/vagas/{{ $vaga->id }}';">
                            <i class="material-icons md-18">visibility</i></button>                    
                        @auth 
                        <button type="button" class="btn btn-info btn-sm" title="Alterar" onclick="location.href='/vagas/{{ $vaga->id }}/edit';">
                            <i class="material-icons md-18">create</i></button>
                        {{ csrf_field() }}
                        {{ method_field('delete') }}    
                        <button type="button" class="btn btn-info btn-sm" title="Apagar" onclick="$('#vaga{{ $vaga->id }}').submit();">
                            <i class="material-icons md-18">remove_circle_outline</i></button>
                    </form>
                    @endauth
                </td>                
            </tr>
            @endif
        @endforeach
        </tbody>
    </table>
</div>
@endsection



