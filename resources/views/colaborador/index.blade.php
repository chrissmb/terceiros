@extends('layouts.app')

@section('titulo', 'Colaboradores')

@section('conteudo')

<h3>Empresas</h3>

<a class="btn btn-success" href="/colaboradores/create" role="button">Cadastrar</a>

<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>CPF</th>
            <th>Nome</th>
            <th>Empresa</th>
            <th>Integração</th>
            <th>Exame</th>
            <th>NR20</th>
            <th>Próximo exame</th>
            <th>Observações</th>
            <th>Aceitante PTS</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($colaboradores as $colaborador)
            <tr>
                <td>{{ $empresa->id }}</td>
                <td><a href="{{ url('/colaboradores/'.$colaborador->id.'/edit') }}">{{ $empresa->nome }}</a></td>
                <td>
                    <form action="{{ url('/colaboradores/'.$colaborador->id) }}" method="post">
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
