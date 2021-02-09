@extends('layouts.app')

@section('content')

<h2 class="page-header">
    {{ trans('app.search_in_system') }}
    @if( request()->get('office') )
        <b>{{ strtoupper (app('request')->input('office')) }}</b>
    @endif
    @if (request('q'))
    <small class="pull-right">{!! trans('app.user_found', ['total' => $users->total(), 'keyword' => request('q')]) !!}</small>
    @endif
</h2>

{{ Form::open(['method' => 'get','class' => '']) }}
<div class="input-group">
    {{ Form::text('q', request('q'), ['class' => 'form-control', 'placeholder' => trans('app.search_your_pedigrees')]) }}
    <span class="input-group-btn">
        {{ Form::submit(trans('app.search'), ['class' => 'btn btn-default']) }}
        {{ link_to_route('users.search', 'Limpar', [], ['class' => 'btn btn-default']) }}
    </span>
</div>
{{ Form::close() }}
<br>
{{ Form::open(['method' => 'get','class' => '']) }}
<div class="input-group">
    {{ Form::text('q', request('q'), ['class' => 'form-control', 'placeholder' => trans('app.search_your_creators')]) }}
    <span class="input-group-btn">
        {{ Form::submit(trans('app.search'), ['class' => 'btn btn-default']) }}
        {{ link_to_route('users.search', 'Limpar', [], ['class' => 'btn btn-default']) }}
    </span>
</div>
{{ Form::close() }}
<h3 class="text-center"><strong>Caro usuário</strong></h3>
<p class="text-center">Estamos preparando um excelente<br>Banco de dados para pesquisa online, aguarde!</p>
   

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
                
                @if ($user->office_id)
                    <h3 class="panel-title">{{ $user->profileLink() }} </h3>
                    <div>{{ trans('user.name') }} : {{ $user->nickname }}</div>
                    <hr style="margin: 5px 0;">
                    <div>{{ trans('user.office') }}</div>
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
