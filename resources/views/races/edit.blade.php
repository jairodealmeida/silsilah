@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Alterar Raça</h1>

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
        <form method="post" action="{{ route('races.update', $race->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">

                <label for="name">Nome:</label>
                <input type="text" class="form-control" name="name" value={{ $race->name }} />
            </div>

            <div class="form-group">
                <label for="specie">Espécie:</label>
                <input type="text" class="form-control" name="specie" value={{ $race->specie }} />
            </div>

            <div class="form-group">
                <label for="genotype">Genotipo:</label>
                <input type="text" class="form-control" name="genotype" value={{ $race->genotype }} />
            </div>
            <div class="form-group">
                <label for="origin">Origem:</label>
                <input type="text" class="form-control" name="origin" value={{ $race->origin }} />
            </div>
            <div class="form-group">
                <label for="description">Descrição:</label>
                <input type="text" class="form-control" name="description" value={{ $race->description }} />
            </div>
            
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
</div>
@endsection