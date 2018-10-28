@extends('layouts.app')

@section('titulo', 'Colaboradores')

@section('conteudo')

<h3>Colaboradores</h3>

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
                <td>{{ $colaborador->id }}</td>
                <td>{{ $colaborador->cpf }}</td>
                <td>
                    <a href="{{ url('/colaboradores/'.$colaborador->id.'/edit') }}">
                        {{ $colaborador->nome }}
                    </a>
                </td>
                <td>{{ $colaborador->empresa_id }}</td>
                <td>{{ $colaborador->validade_integracao }}</td>
                <td>{{ $colaborador->validade_exame }}</td>
                <td>{{ $colaborador->validade_nr20 }}</td>
                <td>{{ $colaborador->proximo_exame }}</td>
                <td>{{ $colaborador->observacoes }}</td>
                <td>{{ $colaborador->aceitante_pts }}</td>
                <td>
                    <form action="{{ url('/colaboradores/'.$colaborador->id) }}" method="post"
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
