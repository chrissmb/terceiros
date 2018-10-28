@extends('layouts.app')

@section('titulo', 'Edição de empresa')

@section('conteudo')

<h3>Edição de empresa</h3>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

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
