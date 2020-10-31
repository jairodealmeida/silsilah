@extends('layouts.app')

@section('content')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Genótipos cadastrados</h1>  
    <div>
    <a style="margin: 19px;" href="{{ route('genotypes.create')}}" class="btn btn-primary">Novo genótipo</a>
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

    @forelse ($genotypes as $model)
    
    <tr>
                          <td>{{$model->id}}</td>
                          <td>{{$model->title}} </td>
                          <td>{{$model->description}} </td>
                          <td>
                              <a href="{{ route('genotypes.edit',$model->id)}}" class="btn btn-primary">Editar</a>
                          </td>
                          <td>
                              <form action="{{ route('genotypes.destroy', $model->id)}}" method="post">
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