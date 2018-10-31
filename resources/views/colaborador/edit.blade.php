@extends('layouts.app')

@section('titulo', 'Edição de colaborador')

@section('conteudo')

<h3>Edição de colaborador</h3>

{{ $colaborador->cpf }}

@component('errors')
@endcomponent

<form action="{{ url('/colabores/'.$colaborador->id) }}" method="post">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="cpf">CPF</label>
      <input type="text" name="cpf" class="form-control" value="{{ $colaborador->cpf }}"/>
    </div>
    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" name="nome" class="form-control" value="{{ $colaborador->nome }}"/>
    </div>
    <div class="form-group">
        <label for="empresa_id">Empresa</label>
        <select name="empresa_id" class="form-control">
            <option value="0">Selecione:</option>
            @foreach ($empresas as $empresa)
                @if ($colaborador->empresa_id == $empresa->id)
                    <option value="{{ $empresa->id }}" selected>{{ $empresa->nome }}</option>
                @else
                    <option value="{{ $empresa->id }}">{{ $empresa->nome }}</option>
                @endif

            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="validade_integracao">Validade integração</label>
        <input type="date" name="validade_integracao" class="form-control"
                value="{{ $colaborador->validade_integracao }}"/>
    </div>
    <div class="form-group">
        <label for="validade_exame">Validade exame</label>
        <input type="date" name="validade_exame" class="form-control"
                value="{{ $colaborador->validade_exame }}"/>
    </div>
    <div class="form-group">
        <label for="validade_nr20">Validade NR20</label>
        <input type="date" name="validade_nr20" class="form-control"
                value="{{ $colaborador->validade_nr20 }}"/>
    </div>
    <div class="form-group">
        <label for="proximo_exame">Próximo exame</label>
        <input type="text" name="proximo_exame" class="form-control"
                value="{{ $colaborador->proximo_exame }}"/>
    </div>
    <div class="form-group">
        <label for="observacoes">Observações</label>
        <textarea class="form-control" name="observacoes"
                rows="2">{{ $colaborador->observacoes }}</textarea>
    </div>
    <div class="form-group">
        <label for="aceitante_pts" class="form-check-label">Aceitante PTS</label>
        <select class="form-control" name="aceitante_pts">
            @if ($colaborador->aceitante_pts)
                <option value="0">Não</option>
                <option value="1" selected>Sim</option>
            @else
                <option value="0" selected>Não</option>
                <option value="1">Sim</option>
            @endif

        </select>
    </div>
    <button type="submit" class="btn btn-success">Alterar</button>
</form>

@endsection
