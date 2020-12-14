@extends('layouts.app')

@section('content')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">{{ trans('app.record_proprietaries') }}</h1>  
    <div>
    <a style="margin: 19px;" href="{{ route('proprietaries.create')}}" class="btn btn-primary">Cadastrar</a>
    </div>    
  <table class="table table-striped">
    <thead>
        <tr>
          <td>Código</td>
          <td>Nome Proprietário</td>
          <td>CPF</td>
          <td>RG</td>
          <td>Telefone</td>
          <td>Celular</td>
          <td>Endereço</td>
          <td>Número</td>
          <td>Complemento</td>
          <td>CEP</td>
          <td colspan = 2>Ações</td>
        </tr>
    </thead>
    <tbody>
        @forelse($proprietaries as $proprietary)
        <tr>
            <td>{{''}}</td>
            <td>{{$proprietary->name}}</td>
            <td>{{$proprietary->cpf}} </td>
            <td>{{$proprietary->rg}} </td>
            <td>{{$proprietary->phone}} </td>
            <td>{{$proprietary->mobile}} </td>
            <td>{{$proprietary->address}} </td>
            <td>{{$proprietary->num_address}} </td>
            <td>{{$proprietary->comp_address}} </td>
            <td>{{$proprietary->cep}} </td>

            <td>
              {{ link_to_route('users.edit', trans('app.edit'), [$proprietary->id], ['class' => 'btn btn-warning']) }}
               
            </td>
            <td>
                <form action="{{ route('proprietaries.destroy', $proprietary->id)}}" method="post">
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