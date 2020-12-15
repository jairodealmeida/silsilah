@extends('layouts.app')

@section('content')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">{{ trans('app.record_creators') }}</h1>  
    <div>
    <a style="margin: 19px;" href="{{ route('creators.create')}}" class="btn btn-primary">{{ trans('app.record_creator') }}</a>
    </div>    
  <table class="table table-striped">
    <thead>
        <tr>
          <td>Apelido de Criador</td>
          <td>Nome do Criador</td>
          <td>Ninhadas</td>
          <td>Vencimento</td>
          <td>Título</td>
          <td>Descrição</td>
          <td>E-mail</td>
          <td colspan = 3>Ações</td>
        </tr>
    </thead>
    <tbody>
        @forelse($creators as $creator)
        <tr>
          <td>{{$creator->nickname}}</td>
          <td>{{$creator->name}}</td>
          <td>{{$creator->creator_id->broodtotal}}</td>
          <td>{{$creator->creator_id->certifyduedate}} </td>
          <td>{{$creator->creator_id->title}} </td>
          <td>{{$creator->creator_id->description}} </td>
          <td>{{$creator->email}} </td>

           
            <td>
              {{ link_to_route('creators.edit', trans('app.edit'), [$creator->id], ['class' => 'btn btn-warning']) }}
               
            </td>
            <td>
                <form action="{{ route('creators.destroy', $creator->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">{{ trans('app.delete') }}</button>
                </form>
            </td>

            <td>
              <form action="{{ route('creators.block', $creator->id)}}" method="post">
                @if (!$creator->blocked)
                  @csrf
                  @method('POST')
                  <button class="btn btn-danger" type="submit">Bloquear</button>
                @endif
                @if ($creator->blocked)
                  @csrf
                  @method('POST')
                  <button class="btn btn-success" type="submit">Ativar</button>
                @endif
              </form>
        </td>

        </tr>
        @empty
        <p>{{ trans('app.no_record_found') }}</p>
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