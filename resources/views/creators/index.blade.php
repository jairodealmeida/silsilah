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
        @forelse($creators as $creator)
        <tr>
          
            <td>{{''}}</td>
            <td>{{$creator->name}}</td>
            <td>{{$creator->nickname}} </td>
            <td>{{$creator->gender}} </td>
            <td>{{$creator->father!=null ? $creator->father->name : '' }} </td>
            <td>{{$creator->mother!=null ? $creator->mother->name : '' }} </td>
            <td>{{$creator->office_id}} </td>
            <td>{{$creator->spouses_count}} </td>
            <td>{{$creator->managed_user}} </td>
            <td>{{$creator->managed_couple}} </td>

            <td>
              {{ link_to_route('users.edit', trans('app.edit'), [$creator->id], ['class' => 'btn btn-warning']) }}
               
            </td>
            <td>
                <form action="{{ route('creators.destroy', $creator->id)}}" method="post">
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