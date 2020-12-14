@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">{{ trans('app.edit') }}</h1>

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
        
        <form method="post" action="{{ route('creators.update', $creator->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group{{ $errors->has('nickname') ? ' has-error' : '' }}">
                <label for="nickname" class="control-label">{{ trans('user.nickname') }}</label>


                    <input id="nickname" type="text" class="form-control" name="nickname" value="{{$creator->nickname}}" required autofocus>

                    @if ($errors->has('nickname'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nickname') }}</strong>
                        </span>
                    @endif

            </div>

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="control-label">{{ trans('user.name_responsable') }}</label>


                    <input id="name" type="text" class="form-control" name="name" value="{{$creator->name}}" required>

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif

            </div>

            <div class="form-group{{ $errors->has('broodtotal') ? ' has-error' : '' }}">
                <label for="broodtotal">{{ trans('app.broodtotal') }}</label>
    
    
                    <input id="broodtotal" type="number" class="form-control" name="broodtotal" value="{{$creator->creator_id->broodtotal}}"  min="1" value="120" max="99999" required>
    
                    @if ($errors->has('broodtotal'))
                        <span class="help-block">
                            <strong>{{ $errors->first('broodtotal') }}</strong>
                        </span>
                    @endif
    
            </div>
            <div class="form-group{{ $errors->has('certifyduedate') ? ' has-error' : '' }}">
                <label for="certifyduedate">{{ trans('app.certifyduedate') }}</label>
               
                   <input id="certifyduedate" type="date" class="form-control" name="certifyduedate" value="{{$creator->creator_id->certifyduedate}}" required>
                   @if ($errors->has('certifyduedate'))
                   <span class="help-block">
                   <strong>{{ $errors->first('certifyduedate') }}</strong>
                   </span>
                   @endif
               
             </div>

             <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                <label for="title">{{ trans('app.title') }}</label>
    
    
                    <input id="title" type="text" class="form-control" name="title" value="{{$creator->creator_id->title}}"   required>
    
                    @if ($errors->has('title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
    
            </div>

            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                <label for="description" class="control-label">{{ trans('user.description') }}</label>

                    <input id="description" type="text" class="form-control" name="description" value="{{$creator->creator_id->description}}" required>
                    @if ($errors->has('description'))
                        <span class="help-block">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif

            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="control-label">{{ trans('user.email') }}</label>

                    <input id="email" type="email" class="form-control" name="email" value="{{$creator->email}}" required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif

            </div>

           
            

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="control-label">{{ trans('auth.password') }}</label>
    
    
                    <input id="password" type="password" class="form-control" name="password" required>
    
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
    
            </div>
            
            <div class="form-group">
                <label for="password-confirm" class="control-label">{{ trans('auth.password_confirmation') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            </div>
          
            
            <button type="submit" class="btn btn-primary">{{ trans('app.save') }}</button>
        </form>
    </div>
</div>
@endsection





