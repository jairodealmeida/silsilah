@extends('layouts.app')

@section('content')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">{{ trans('app.record_offices') }}</h1>  
    <div>
    <a style="margin: 19px;" href="{{ route('offices.create')}}" class="btn btn-primary">Cadastrar</a>
    </div>    
  <table class="table table-striped">
    <thead>
        <tr>
          <td>Código</td>
          <td>Nome Cartório</td>
          <td>Nome</td>
          <td>Quota</td>
          <td>Vencimento</td>
          <td>Espécie</td>
          <!--td>Nome do pai</td>
          <td>Nome da mãe</td>
          <td>Ninhadas</td>
          <td>Avôs</td>
          <td>Proprietário</td>
          <td>Casal</td-->
          <td colspan = 2>Ações</td>
        </tr>
    </thead>
    <tbody>
        @forelse($offices as $office)
        <tr>
            <td>{{''}}</td>
            <td>{{$office->name}}</td>
            <td>{{$office->nickname}} </td>
            <td>{{$office->office_id->registerquote}} </td>
            <td>{{$office->office_id->duedate}} </td>
            <td>{{$office->office_id->specie}} </td>
            <!--td>{{$office->father!=null ? $office->father->name : '' }} </td>
            <td>{{$office->mother!=null ? $office->mother->name : '' }} </td>
            <td>{{$office->office_id}} </td>
            <td>{{$office->spouses_count}} </td>
            <td>{{$office->managed_user}} </td>
            <td>{{$office->managed_couple}} </td-->

            <td>
              {{ link_to_route('users.edit', trans('app.edit'), [$office->id], ['class' => 'btn btn-warning']) }}
               
            </td>
            <td>
                <form action="{{ route('offices.destroy', $office->id)}}" method="post">
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