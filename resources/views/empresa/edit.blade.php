@extends('layouts.app')

@section('titulo', 'Edição de empresa')

@section('conteudo')

<h3>Edição de empresa</h3>

<form action="{{ url('/empresas/'.$empresa->id) }}" method="post">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="nome">Nome</label>
      <input type="text" name="nome" class="form-control" value="{{ $empresa->nome }}"/>
      <button type="submit" class="btn btn-success">Alterar</button>
    </div>
</form>

@endsection
