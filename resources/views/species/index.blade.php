@extends('layouts.app')

@section('content')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Espécies cadastradas</h1>  
    <div>
    <a style="margin: 19px;" href="{{ route('species.create')}}" class="btn btn-primary">Nova espécie</a>
    </div>    
  <table class="table table-striped">
    <thead>
        <tr>
          <td>Código</td>
          <td>Título</td>
          <td>Descrição</td>
          <td colspan = 2>Ações</td>
        </tr>
    </thead>
    <tbody>
        @forelse($species as $specie)
        <tr>
            <td>{{$specie->id}}</td>
            <td>{{$specie->title}}</td>
            <td>{{$specie->description}} </td>
            <td>
                <a href="{{ route('species.edit',$specie->id)}}" class="btn btn-primary">Editar</a>
            </td>
            <td>
                <form action="{{ route('species.destroy', $specie->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Remover</button>
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