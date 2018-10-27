@extends('layouts.app')

@section('titulo', 'Cadastro de colaborador')

@section('conteudo')

<h3>Cadastro de colaborador</h3>

<form action="/colaboradores" method="post">
    @csrf
    <div class="form-group">
      <label for="cpf">CPF</label>
      <input type="text" name="cpf" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" name="nome" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="empresa">Empresa</label>
        <select name="nome" class="form-control">
            @foreach ($empresas as $empresa)
                <option value="{{ $empresa->id }}">{{ $empresa->nome }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="validade_integracao">Integração</label>
        <input type="date" name="validade_integracao" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="validade_exame">Exame</label>
        <input type="date" name="validade_exame" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="validade_nr20">NR20</label>
        <input type="date" name="validade_nr20" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="proximo_exame">Próximo exame</label>
        <input type="text" name="proximo_exame" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="observacoes">Observações</label>
        <textarea class="form-control" name="observacoes" rows="2"></textarea>
    </div>
    <div class="form-check">
        <input type="checkbox" name="aceitante_pts" class="form-check-input"/>
        <label for="aceitante_pts" class="form-check-label">Aceitante PTS</label>
    </div>
    <button type="submit" class="btn btn-success">Cadastrar</button>
</form>

@endsection
