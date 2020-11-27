@extends('layouts.app')

@section('content')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">{{ trans('app.record_cores') }}</h1>  
    <div>
    <a style="margin: 19px;" href="{{ route('cores.create')}}" class="btn btn-primary">Cadastrar</a>
    </div>    
  <table class="table table-striped">
    <thead>
        <tr>
          <td>Código</td>
          <td>Nome</td>
          <td>Apelido</td>
          <td>Sexo</td>
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
        @forelse($cores as $core)
        <tr>
          
            <td>{{''}}</td>
            <td>{{$core->name}}</td>
            <td>{{$core->nickname}} </td>
            <td>{{$core->gender}} </td>
            <td>{{$core->father!=null ? $core->father->name : '' }} </td>
            <td>{{$core->mother!=null ? $core->mother->name : '' }} </td>
            <td>{{$core->core_id}} </td>
            <td>{{$core->spouses_count}} </td>
            <td>{{$core->managed_user}} </td>
            <td>{{$core->managed_couple}} </td>

            <td>
              {{ link_to_route('users.edit', trans('app.edit'), [$core->id], ['class' => 'btn btn-warning']) }}
               
            </td>
            <td>
                <form action="{{ route('cores.destroy', $core->id)}}" method="post">
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