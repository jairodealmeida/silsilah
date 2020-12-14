@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Editar espécie</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form method="post" action="{{ route('species.update', $specie->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">
                <label for="name">Título:</label>
                <input type="text" class="form-control" name="title" value="{{ $specie->title }}" />
            </div>

            <div class="form-group">
                <label for="description">Descrição:</label>
                <input type="text" class="form-control" name="description" value="{{ $specie->description }}" />
            </div>

            <div class="form-group">
                <label for="classe">{{ trans('app.classe') }}</label>
                <select id='classe' name="classe" class="form-control">
                  <option value='0'>Selecione</option>
                  
                  @foreach($classes as $classe)
                    <option value='{{ $classe }}'>{{ $classe }}</option>
                  @endforeach
               </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
</div>
@endsection