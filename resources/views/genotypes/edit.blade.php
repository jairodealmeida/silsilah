@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Editar genótipo</h1>

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
        <form method="post" action="{{ route('genotypes.update', $genotype->id) }}">
            @method('PATCH') 
            @csrf
            
            <div class="form-group">
                <label for="title">Título:</label>
                <input type="text" class="form-control" name="title" value="{{ $genotype->title }}" />
            </div>
            <div class="form-group">
                <label for="description">Descrição:</label>
                <input type="text" class="form-control" name="description" value="{{ $genotype->description }}" />
            </div>
            
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
</div>
@endsection