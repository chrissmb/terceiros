@extends('layouts.app')

@section('titulo', 'Empresas')

@section('conteudo')

<h3>Empresas</h3>

<table class="table">
    <tbody>
        <tr>
            <th>#</th>
            <th>Descrição</th>
        </tr>
    </tbody>
    <thead>
        @foreach ($empresas as $empresa)
            <tr>
                <td>{{ $empresa->id }}</td>
                <td>{{ $empresa->nome }}</td>
            </tr>
        @endforeach
    </thead>
</table>

@endsection
