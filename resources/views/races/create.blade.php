@extends('layouts.app')

@section('content')

<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Add a race</h1>
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
      <form method="post" action="{{ route('races.store') }}">
          @csrf
          <div class="form-group">    
              <label for="name">Name:</label>
              <input type="text" class="form-control" name="name"/>
          </div>

          <div class="form-group">
              <label for="specie">Specie:</label>
              <input type="text" class="form-control" name="specie"/>
          </div>

          <div class="form-group">
              <label for="genotype">genotype:</label>
              <input type="text" class="form-control" name="genotype"/>
          </div>
          <div class="form-group">
              <label for="origin">origin:</label>
              <input type="text" class="form-control" name="origin"/>
          </div>
          <div class="form-group">
              <label for="description">description:</label>
              <input type="text" class="form-control" name="description"/>
          </div>
                     
          <button type="submit" class="btn btn-primary-outline">Add race</button>
      </form>
  </div>
</div>
</div>
@endsection