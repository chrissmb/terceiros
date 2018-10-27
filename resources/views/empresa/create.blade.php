@extends('layouts.app')

@section('titulo', 'Cadastro de empresa')

@section('conteudo')

<h3>Cadastro de empresa</h3>

<form action="/empresas" method="post">
    @csrf
    <div class="form-group">
      <label for="nome">Nome</label>
      <input type="text" name="nome" class="form-control"/>
      <button type="submit" class="btn btn-success">Cadastrar</button>
    </div>
</form>

@endsection
