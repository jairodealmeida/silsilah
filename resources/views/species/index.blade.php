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
          <td>Classe</td>
          <td colspan = 2>Ações</td>
        </tr>
    </thead>
    <tbody>
        @forelse($species as $specie)
        <tr>
            <td>{{$specie->id}}</td>
            <td>{{$specie->title}}</td>
            <td>{{$specie->description}} </td>
            <td>{{$specie->classe}} </td>
            <td>
              {{ link_to_route('species.edit', trans('app.edit'), [$specie->id], ['class' => 'btn btn-warning']) }}
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