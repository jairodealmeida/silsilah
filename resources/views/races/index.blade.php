@extends('layouts.app')

@section('content')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">races</h1>  
    <div>
    <a style="margin: 19px;" href="{{ route('races.create')}}" class="btn btn-primary">New race</a>
    </div>    
  <table class="table table-striped">
    <thead>
        <tr>
          <td>Código</td>
          <td>Nome</td>
          <td>Espécie</td>
          <td>Genotipo</td>
          <td>Origem</td>
          <td>Descrição</td>
          <td colspan = 2>Ações</td>
        </tr>
    </thead>
    <tbody>
        @forelse($races as $race)
        <tr>
            <td>{{$race->id}}</td>
            <td>{{$race->name}} </td>
            <td>{{$race->specie}}</td>
            <td>{{$race->genotype}}</td>
            <td>{{$race->origin}}</td>
            <td>{{$race->description}}</td>
            <td>
                <a href="{{ route('races.edit',$race->id)}}" class="btn btn-primary">Editar</a>
            </td>
            <td>
                <form action="{{ route('races.destroy', $race->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Excluir</button>
                </form>
            </td>
        </tr>
        @empty
        <p>Não foi encontrado nenhum cadastro.</p>
        @endforelse
    </tbody>
  </table>
<div>
</div>
@endsection

<div class="col-sm-12">

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
</div>