@extends('layouts.app')

@section('content')

<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Adicionar espécie</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('species.store') }}">
          @csrf
          <div class="form-group">    
              <label for="title">Título:</label>
              <input type="text" class="form-control" name="title"/>
          </div>
          <div class="form-group">
              <label for="description">Descrição:</label>
              <input type="text" class="form-control" name="description"/>
          </div>

          <div class="form-group">
            <!--label for="description">Classe:</label>
            <input type="text" class="form-control" name="description"/-->
            <label for="classes">Classe:</label>

            <select name="classes" id="classes">
              <option value="mammals">Mamíferos</option>
              <option value="birds">Aves</option>
              <option value="reptiles">Répteis</option>
              <option value="amphibians">Anfíbios</option>
              <option value="pisces">Peixes</option>
              <option value="invertebrates">Invertebrados</option>
            </select>


          </div>  

          

          <button type="submit" class="btn btn-primary-outline">Salvar</button>
      </form>
  </div>
</div>
</div>
@endsection