@extends('layouts.app')

@section('content')

<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">{{ trans('app.record_animal') }}</h1>
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
      <form method="post" action="{{ route('animals.store') }}">
          @csrf
          <div class="form-group{{ $errors->has('nickname') ? ' has-error' : '' }}">
            <label for="nickname" class="control-label">{{ trans('app.animal_nickname') }}</label>
                <input id="nickname" type="text" class="form-control" name="nickname" value="{{ old('nickname') }}" required autofocus>
                @if ($errors->has('nickname'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nickname') }}</strong>
                    </span>
                @endif
        </div>

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name" class="control-label">{{ trans('app.animal_name') }}</label>
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
        </div>

       
        <div class="form-group{{ $errors->has('genotype') ? ' has-error' : '' }}">
            <label for="genotype" class="control-label">{{ trans('app.genotype') }}</label>
                <input id="genotype" type="text" class="form-control" name="genotype" value="{{ old('genotype') }}" required>
                @if ($errors->has('genotype'))
                    <span class="help-block">
                        <strong>{{ $errors->first('genotype') }}</strong>
                    </span>
                @endif
        </div>

        <div class="form-group">
            <label for="race">{{ trans('app.race') }}</label>
            <div class="input-group">
                <select id='race' name="race" class="form-control">
                    @foreach($races as $race)
                        <option value='{{ $race->id }}'>{{ $race->name }}</option>
                    @endforeach
                </select>
                <div class="input-group-btn">
                    {{ link_to_route('races.index', __('Adicionar'), [], ['class' => 'btn btn-default btn-sm']) }}
                </div>
            </div>
        </div>

        <!--div class="form-group">
            <label for="proprietary">{{ trans('app.proprietary') }}</label>
            <div class="input-group">
                <select id='proprietary' name="proprietary" class="form-control">
                    @foreach($proprietaries as $proprietary)
                        <option value='{{ $proprietary->id }}'>{{ $proprietary->name }}</option>
                    @endforeach
                </select>
                <div class="input-group-btn">
                    {{ link_to_route('proprietaries.index', __('Adicionar'), [], ['class' => 'btn btn-default btn-sm']) }}
                </div>
            </div>
        </div-->

        <div class="form-group{{ $errors->has('gender_id') ? ' has-error' : '' }}">
            <label for="gender_id" class="control-label">{{ trans('app.animal_gender') }}</label>
                {!! FormField::radios('gender_id', [1 => trans('app.male'), 2 => trans('app.female')], ['label' => false]) !!}
        </div>
        <button type="submit" class="btn btn-primary-outline">{{ trans('app.save') }}</button>
      </form>
  </div>
</div>
</div>
@endsection






