@extends('layouts.app')

@section('titulo', 'Empresas')

@section('conteudo')

<h3>Empresas</h3>

@component('errors')
@endcomponent

<a class="btn btn-success" href="/empresas/create" role="button">Cadastrar</a>

<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($empresas as $empresa)
            <tr>
                <td>{{ $empresa->id }}</td>
                <td><a href="{{ url('/empresas/'.$empresa->id.'/edit') }}">{{ $empresa->nome }}</a></td>
                <td>
                    <form action="{{ url('/empresas/'.$empresa->id) }}" method="post"
                            onsubmit="return confirm('Deseja realmente excluir?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
