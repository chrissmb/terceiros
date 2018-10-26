@extends('layouts.app')

@section('titulo', 'Cadastro de empresa')

@section('conteudo')

<h3>Cadastro de empresa</h3>

<form action="/empresa" method="post">
    @csrf
    <div class="form-group">
      <label for="nome">Nome</label>
      <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome"/>
      <button type="submit" class="btn btn-success">Cadastrar</button>
    </div>
</form>

@endsection
