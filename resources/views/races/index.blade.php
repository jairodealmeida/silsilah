@extends('layouts.app')

@section('content')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">{{ trans('app.record_cores') }}</h1>  
    <div>
    <a style="margin: 19px;" href="{{ route('races.create')}}" class="btn btn-primary">{{ trans('app.record_race') }}</a>
    </div>    
  <table class="table table-striped">
    <thead>
        <tr>
          <td>{{ trans('app.id') }}</td>
          <td>{{ trans('app.name') }}</td>
          <td>{{ trans('app.specie') }}</td>
          <td>{{ trans('app.genotype') }}</td>
          <td>{{ trans('app.origin') }}</td>
          <td>{{ trans('app.description') }}</td>
          <td colspan = 2>{{ trans('app.actions') }}</td>
        </tr>
    </thead>
    <tbody>
        @forelse($races as $race)
        <tr>
            <td>{{$race->id}}</td>
            <td>{{$race->name}} </td>
            <td>{{$race->specie}}</td>
            <td>{{$race->genotype}}</td>
            <td>{{$race->origin}}</td>
            <td>{{$race->description}}</td>
            <td>
                <a href="{{ route('races.edit',$race->id)}}" class="btn btn-primary">{{ trans('app.edit') }}</a>
            </td>
            <td>
                <form action="{{ route('races.destroy', $race->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">{{ trans('app.delete') }}</button>
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