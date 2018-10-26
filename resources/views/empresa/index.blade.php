@extends('layouts.app')

@section('titulo', 'Empresas')

@section('conteudo')

<h3>Empresas</h3>

<a class="btn btn-success" href="/empresa/create" role="button">Cadastrar</a>

<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Descrição</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($empresas as $empresa)
            <tr>
                <td>{{ $empresa->id }}</td>
                <td>{{ $empresa->nome }}</td>
                <td>
                    <form action="{{ url('/empresa/'.$empresa->id) }}" method="post">
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
