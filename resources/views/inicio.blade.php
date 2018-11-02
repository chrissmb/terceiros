@extends('layouts.app')

@section('titulo', 'Terceiros')

@section('conteudo')

<h3>Terceiros</h3>

<form class="form-inline" action="/" method="GET">
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

<div class="table-responsive">
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
                    <td>{{ $colaborador->nome }}</td>
                    <td>{{ $colaborador->empresa->nome }}</td>
                    <td>{{ date('d/m/Y', strtotime($colaborador->validade_integracao)) }}</td>
                    <td>{{ date('d/m/Y', strtotime($colaborador->validade_exame)) }}</tdd-none>
                    <td>{{ date('d/m/Y', strtotime($colaborador->validade_nr20)) }}</td>
                    <td>{{ $colaborador->proximo_exame }}</td>
                    <td>{{ $colaborador->observacoes }}</td>
                    <td>
                        @if ($colaborador->aceitante_pts)
                            Sim
                        @else
                            Não
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
