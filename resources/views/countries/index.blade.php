@extends('layouts.app')

@section('content')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Países de origem</h1>  
    <div>
    <a style="margin: 19px;" href="{{ route('countries.create')}}" class="btn btn-primary">Novo país</a>
    </div>    
  <table class="table table-striped">
    <thead>
        <tr>
          <td>Código</td>
          <td>Nome</td>
          <td>Descrição</td>
          <td colspan = 2>Ações</td>
        </tr>
    </thead>
    <tbody>
        @forelse($countries as $country)
        <tr>
            <td>{{$country->id}}</td>
            <td>{{$country->name}} </td>
            <td>{{$country->description}} </td>
            <td>
                <a href="{{ route('countries.edit',$country->id)}}" class="btn btn-primary">Editar</a>
            </td>
            <td>
                <form action="{{ route('countries.destroy', $country->id)}}" method="post">
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