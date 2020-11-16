@extends('layouts.app')

@section('content')
@if (Auth::user())
<h2 class="page-header">
    {{ trans('app.search_your_family') }}
    @if (request('q'))
    <small class="pull-right">{!! trans('app.user_found', ['total' => $users->total(), 'keyword' => request('q')]) !!}</small>
    @endif
</h2>
{{ Form::open(['method' => 'get','class' => '']) }}
<div class="input-group">

    {{ Form::text('q', request('q'), ['class' => 'form-control', 'placeholder' => trans('app.search_your_family_placeholder')]) }}
    <span class="input-group-btn">
        {{ Form::submit(trans('app.search'), ['class' => 'btn btn-default']) }}
        {{ link_to_route('users.search', 'Reset', [], ['class' => 'btn btn-default']) }}
    </span>

</div>
{{ Form::close() }}

@else
<div class="text-center bg-light">
      <div class="col-md-6 p-lg-6">
        <h1 class="display-4 font-weight-normal">Publique seus Pedigrees</h1>
        <p class="lead font-weight-normal">Sistema pra gerenciamento de pedgrees, pode permitir adicionar novas raças genotipos e mais.</p>
      </div>
      <div class="col-md-6 p-lg-6">
          <h1 class="display-5">Arvore genealogica</h1>
          <p class="lead font-weight-normal">Acomopanhe o processo de ninhadas pela funcionalidade de mapeamento genealógico.</p>
       </div>
       <div class="col-md-12 p-lg-12">
       <img src="images/logo.jpeg" style = "width:500px;heigth:auto" alt="">
       </div>
       <div class="col-md-12 p-lg-12">
          <h1 class="display-5">Painel administrativo</h1>
          <p class="lead font-weight-normal">Gerencie seus parceiros e nucleos de emição de pedrigree pela nossa ferramenta.</p>
       </div>
</div>

    

@endif      

@if (request('q'))
<br>
{{ $users->appends(Request::except('page'))->render() }}
@foreach ($users->chunk(4) as $chunkedUser)
<div class="row">
    @foreach ($chunkedUser as $user)
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                {{ userPhoto($user, ['style' => 'width:100%;max-width:300px']) }}
                @if ($user->age)
                    {!! $user->age_string !!}
                @endif
            </div>
            <div class="panel-body">
                
                @if ($user->core_id)
                    <h3 class="panel-title">{{ $user->profileLink() }} </h3>
                    <div>{{ trans('user.name') }} : {{ $user->nickname }}</div>
                    <hr style="margin: 5px 0;">
                    <div>{{ trans('user.core') }}</div>
                @else
                    <h3 class="panel-title">{{ $user->profileLink() }} ({{ $user->gender }})</h3>
                    <div>{{ trans('user.nickname') }} : {{ $user->nickname }}</div>
                    <hr style="margin: 5px 0;">
                    <div>{{ trans('user.father') }} : {{ $user->father_id ? $user->father->name : '' }}</div>
                    <div>{{ trans('user.mother') }} : {{ $user->mother_id ? $user->mother->name : '' }}</div>
                @endif

            </div>
            <div class="panel-footer">
                {{ link_to_route('users.show', trans('app.show_profile'), [$user->id], ['class' => 'btn btn-default btn-xs']) }}
                {{ link_to_route('users.chart', trans('app.show_family_chart'), [$user->id], ['class' => 'btn btn-default btn-xs']) }}
            </div>
        </div>
    </div>
    @endforeach
</div>
@endforeach

{{ $users->appends(Request::except('page'))->render() }}
@endif
@endsection
