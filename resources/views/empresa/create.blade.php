@extends('layouts.app')

@section('titulo', 'Cadastro de empresa')

@section('conteudo')

<h3>Cadastro de empresa</h3>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="/empresas" method="post">
    @csrf
    <div class="form-group">
      <label for="nome">Nome</label>
      <input type="text" name="nome" class="form-control"/>
    </div>
    <button type="submit" class="btn btn-success">Cadastrar</button>
</form>

@endsection
