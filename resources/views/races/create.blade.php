@extends('layouts.app')

@section('content')

<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">{{ trans('app.record_race') }}</h1>
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
              <label for="name">{{ trans('app.name') }}</label>
              <input type="text" class="form-control" name="name"/>
          </div>

          <div class="form-group">
              <label for="specie">{{ trans('app.specie') }}</label>
              <select id='specie' name="specie" class="form-control">
                <option value='0'>Selecione</option>
                @foreach($species as $specie)
                  <option value='{{ $specie->id }}'>{{ $specie->title }}</option>
                @endforeach
             </select>
          </div>

          <div class="form-group">
              <label for="genotype">{{ trans('app.genotype') }}</label>
              <input type="text" class="form-control" name="genotype"/>
          </div>
          <div class="form-group">
              <label for="origin">{{ trans('app.origin') }}</label>
              <input type="text" class="form-control" name="origin"/>
          </div>
          <div class="form-group">
              <label for="description">{{ trans('app.description') }}</label>
              <input type="text" class="form-control" name="description"/>
          </div>
                     
          <button type="submit" class="btn btn-primary-outline">{{ trans('app.save') }}</button>
      </form>
  </div>
</div>
</div>
@endsection