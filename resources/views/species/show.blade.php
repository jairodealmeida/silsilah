@extends('layouts.app')

@section('content')
@can('edit', $specie)
    <div class="pull-right">
        {{ link_to_route('countries.edit', trans('specie.edit'), $specie, ['class' => 'btn btn-warning']) }}
    </div>
@endcan
<h2 class="page-header">
    {{ $specie->husband->name }}  <small>{{ trans('specie.detail') }}</small>
</h2>

@include('species.partials.stat')
<br>
<h4 class="page-header">{{ trans('user.childs') }} & {{ trans('user.grand_childs') }}</h4>
@if ($country->childs->isEmpty())
    <i>{{ trans('app.childs_were_not_recorded') }}</i>
@else
    <?php $no = 0; ?>
    @foreach($country->childs->chunk(4) as $chunkedChild)
    <div class="row">
        @foreach($chunkedChild as $child)
        <div class="col-md-3">
            <h4><strong>{{ ++$no }}. {{ $child->profileLink() }} ({{ $child->gender }})</strong></h4>
            <ul style="padding-left: 35px">
                @foreach($child->childs as $grand)
                <li>{{ $grand->profileLink() }} ({{ $grand->gender }})</li>
                @endforeach
            </ul>
        </div>
        @endforeach
        @if (! $loop->last)
        <div class="clearfix"></div><hr>
        @endif
    </div>
    @endforeach
@endif
@endsection
