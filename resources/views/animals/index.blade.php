@extends('layouts.app')

@section('content')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Pets cadastrados</h1>  
    <div>
    <a style="margin: 19px;" href="{{ route('animals.create')}}" class="btn btn-primary">Cadastrar</a>
    </div>    
  <table class="table table-striped">
    <thead>
        <tr>
          <td>Código</td>
          <td>Nome</td>
          <td>Apelido</td>
          <td>Genero</td>
          <td>Nome do pai</td>
          <td>Nome da mãe</td>
          <td>Ninhada</td>
          <td>Avôs</td>
          <td>Proprietário</td>
          <td>Casal</td>
          <td colspan = 2>Ações</td>
        </tr>
    </thead>
    <tbody>
        @forelse($animals as $animal)
        <tr>
          
            <td>{{''}}</td>
            <td>{{$animal->name}}</td>
            <td>{{$animal->nickname}} </td>
            <td>{{$animal->gender}} </td>
            <td>{{$animal->father!=null ? $animal->father->name : '' }} </td>
            <td>{{$animal->mother!=null ? $animal->mother->name : '' }} </td>
            <td>{{$animal->core_id}} </td>
            <td>{{$animal->spouses_count}} </td>
            <td>{{$animal->managed_user}} </td>
            <td>{{$animal->managed_couple}} </td>

            <td>
              {{ link_to_route('users.edit', trans('app.edit'), [$animal->id], ['class' => 'btn btn-warning']) }}
               
            </td>
            <td>
                <form action="{{ route('animals.destroy', $animal->id)}}" method="post">
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