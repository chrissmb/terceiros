@extends('layouts.app')

@section('titulo', 'Terceiros')

@section('conteudo')

<h3>Terceiros</h3>

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
