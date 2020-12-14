@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Editar Cartório</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        {{$office}}
        <form method="post" action="{{ route('offices.update', $office->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group{{ $errors->has('nickname') ? ' has-error' : '' }}">
                <label for="nickname">{{ trans('app.title') }}</label>
                
                   <input id="nickname" type="text" class="form-control" name="nickname" value="{{  $office->nickname }}" required autofocus>
                   @if ($errors->has('nickname'))
                   <span class="help-block">
                   <strong>{{ $errors->first('nickname') }}</strong>
                   </span>
                   @endif
                
             </div>
             <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name">{{ trans('app.name') }}</label>
               
                   <input id="name" type="text" class="form-control" name="name" value="{{  $office->name }}" required>
                   @if ($errors->has('name'))
                   <span class="help-block">
                   <strong>{{ $errors->first('name') }}</strong>
                   </span>
                   @endif
               
             </div>
             <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email">{{ trans('app.email') }}</label>
               
                   <input id="email" type="email" class="form-control" name="email" value="{{  $office->email }}" required>
                   @if ($errors->has('email'))
                   <span class="help-block">
                   <strong>{{ $errors->first('email') }}</strong>
                   </span>
                   @endif
               
             </div>
             <!--div class="form-group{{ $errors->has('gender_id') ? ' has-error' : '' }}">
                <label for="gender_id">{{ trans('app.gender') }}</label>
                
                <div class="col-md-12">
                    {!! FormField::radios('gender_id', [1 => trans('app.male'), 2 => trans('app.female')], ['label' => false]) !!}
                </div>
                </div-->
             <div class="form-group{{ $errors->has('duedate') ? ' has-error' : '' }}">
                <label for="duedate">{{ trans('app.duedate') }}</label>
               
                   <input id="duedate" type="date" class="form-control" name="duedate" value="{{  $office->duedate }}" required>
                   @if ($errors->has('duedate'))
                   <span class="help-block">
                   <strong>{{ $errors->first('duedate') }}</strong>
                   </span>
                   @endif
               
             </div>
             <div class="form-group{{ $errors->has('registerquote') ? ' has-error' : '' }}">
                <label for="registerquote">{{ trans('app.registerquote') }}</label>
               
                   <input type="number" id="registerquote"  class="form-control" name="registerquote" min="1" value="120" max="99999" value="{{  $office->registerquote }}" required>
                   @if ($errors->has('registerquote'))
                   <span class="help-block">
                   <strong>{{ $errors->first('registerquote') }}</strong>
                   </span>
                   @endif
               
             </div>
 
             <div class="form-group">
                 <label for="specie">{{ trans('app.specie') }}</label>
 
                 <select id='specie' name="specie" class="form-control">
                     
                   @foreach($species as $specie)
                     <option value='{{ $specie->title }}'>{{ $specie->title }}</option>
                     
                   @endforeach
                </select>
                
             <!--div class="form-group{{ $errors->has('gender_id') ? ' has-error' : '' }}">
                <label for="gender_id">{{ trans('app.gender') }}</label>
                
                <div class="col-md-12">
                    {!! FormField::radios('gender_id', [1 => trans('app.male'), 2 => trans('app.female')], ['label' => false]) !!}
                </div>
              </div-->
                
                
             </div>
 
             <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password">{{ trans('auth.password') }}</label>
               
                   <input id="password" type="password" class="form-control" name="password" required>
                   @if ($errors->has('password'))
                   <span class="help-block">
                   <strong>{{ $errors->first('password') }}</strong>
                   </span>
                   @endif
               
             </div>
             <div class="form-group">
                <label for="password-confirm">{{ trans('auth.password_confirmation') }}</label>
                
                   <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                
             </div>
            


          
            
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
</div>
@endsection





