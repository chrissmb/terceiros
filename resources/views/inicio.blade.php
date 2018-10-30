@extends('layouts.app')

@section('titulo', 'Terceiros')

@section('conteudo')

<h3>Terceiros</h3>

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
        </tr>
    </thead>
    <tbody>
        @foreach ($colaboradores as $colaborador)
            <tr>
                <td class="d-none d-md-table-cell">{{ $colaborador->id }}</td>
                <td class="d-none d-md-table-cell">{{ $colaborador->cpf }}</td>
                <td>{{ $colaborador->nome }}</td>
                <td>{{ $colaborador->empresa->nome }}</td>
                <td class="d-none d-md-table-cell">{{ $colaborador->validade_integracao }}</td>
                <td class="d-none d-md-table-cell">{{ $colaborador->validade_exame }}</td>
                <td class="d-none d-md-table-cell">{{ $colaborador->validade_nr20 }}</td>
                <td class="d-none d-lg-table-cell">{{ $colaborador->proximo_exame }}</td>
                <td class="d-none d-lg-table-cell">{{ $colaborador->observacoes }}</td>
                <td class="d-none d-lg-table-cell">{{ $colaborador->aceitante_pts }}</td>
            </tr>
        @endforeach
    </tbody>
</table>


@endsection
