@extends('layouts.app')

@section('content')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">{{ trans('app.record_animals') }}</h1>  
    <div>
    <a style="margin: 19px;" href="{{ route('animals.create')}}" class="btn btn-primary">{{ trans('app.record_animal') }}</a>
    </div>    
  <table class="table table-striped">
    <thead>
        <tr>
          <td>{{ trans('app.id') }}</td>
          <td>{{ trans('app.name') }}</td>
          <td>{{ trans('app.nickname') }}</td>
          <td>{{ trans('app.genotype') }}</td>
          <td>{{ trans('app.father_name') }}</td>
          <td>{{ trans('app.mother_name') }}</td>
          <td>{{ trans('app.brooding') }}</td>
          <td>{{ trans('app.parents') }}</td>
          <td>{{ trans('app.proprietary') }}</td>
          <td>{{ trans('app.couple') }}</td>
          <td colspan = 2>{{ trans('app.actions') }}</td>
        </tr>
    </thead>
    <tbody>
        @forelse($animals as $animal)
        <tr>
          
            <td>{{''}}</td>
            <td>{{$animal->name}}</td>
            <td>{{$animal->nickname}} </td>
            <td>{{$animal->gender}} </td>
            <td>{{$animal->father!=null ? $animal->father->name : '' }} </td>
            <td>{{$animal->mother!=null ? $animal->mother->name : '' }} </td>
            <td>{{$animal->core_id}} </td>
            <td>{{$animal->spouses_count}} </td>
            <td>{{$animal->managed_user}} </td>
            <td>{{$animal->managed_couple}} </td>

            <td>
              {{ link_to_route('users.edit', trans('app.edit'), [$animal->id], ['class' => 'btn btn-warning']) }}
               
            </td>
            <td>
                <form action="{{ route('animals.destroy', $animal->id)}}" method="post">
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