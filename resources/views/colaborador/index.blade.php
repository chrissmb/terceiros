@extends('layouts.app')

@section('titulo', 'Colaboradores')

@section('conteudo')

<h3>Colaboradores</h3>

<form class="form-inline" action="/colaboradores" method="GET">
    <label class="sr-only" for="nome">Pesquisar por nome</label>
    <input type="text" class="form-control m-1" name="nome" placeholder="Nome"/>
    <select class="form-control m-1" name="empresa_id">
        <option value="0">Selecione a empresa:</option>
        @foreach ($empresas as $empresa)
            <option value="{{ $empresa->id }}">{{ $empresa->nome }}</option>
        @endforeach
    </select>
    <input type="submit" class="btn btn-primary m-1" value="Pesquisar"/>
</form>

<a class="btn btn-success m-1" href="/colaboradores/create" role="button">Novo colaborador</a>

<table class="table">
    <thead>
        <tr>
            <th class="d-none d-md-table-cell">#</th>
            <th class="d-none d-md-table-cell">CPF</th>
            <th>Nome</th>
            <th>Empresa</th>
            <th class="d-none d-md-table-cell">Integração</th>
            <th class="d-none d-md-table-cell">Exame</th>
            <th class="d-none d-md-table-cell">NR20</th>
            <th class="d-none d-lg-table-cell">Próximo exame</th>
            <th class="d-none d-lg-table-cell">Observações</th>
            <th class="d-none d-lg-table-cell">Aceitante PTS</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($colaboradores as $colaborador)
            <tr>
                <td class="d-none d-md-table-cell">{{ $colaborador->id }}</td>
                <td class="d-none d-md-table-cell">{{ $colaborador->cpf }}</td>
                <td>
                    <a href="{{ url('/colaboradores/'.$colaborador->id.'/edit') }}">
                        {{ $colaborador->nome }}
                    </a>
                </td>
                <td>{{ $colaborador->empresa->nome }}</td>
                <td class="d-none d-md-table-cell">{{ date('d/m/Y', strtotime($colaborador->validade_integracao)) }}</td>
                <td class="d-none d-md-table-cell">{{ date('d/m/Y', strtotime($colaborador->validade_exame)) }}</td>
                <td class="d-none d-md-table-cell">{{ date('d/m/Y', strtotime($colaborador->validade_nr20)) }}</td>
                <td class="d-none d-lg-table-cell">{{ $colaborador->proximo_exame }}</td>
                <td class="d-none d-lg-table-cell">{{ $colaborador->observacoes }}</td>
                <td class="d-none d-lg-table-cell">
                    @if ($colaborador->aceitante_pts)
                        Sim
                    @else
                        Não
                    @endif
                </td>
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
