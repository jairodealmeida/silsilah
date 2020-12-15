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
        <form method="post" action="{{ route('animals.update', $animal->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group{{ $errors->has('nickname') ? ' has-error' : '' }}">
                <label for="nickname" class="control-label">{{ trans('user.nickname') }}</label>

                
                    <input id="nickname" type="text" class="form-control" name="nickname" value="{{ old('nickname') }}" required autofocus>

                    @if ($errors->has('nickname'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nickname') }}</strong>
                        </span>
                    @endif
                
            </div>

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="control-label">{{ trans('user.name_responsable') }}</label>


                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif

            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="control-label">{{ trans('user.email') }}</label>


                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif

            </div>

            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                <label for="description" class="control-label">{{ trans('user.description') }}</label>


                    <textarea id="description" name="description" class="form-control" required ></textarea>
                    @if ($errors->has('description'))
                        <span class="help-block">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif

            </div>
            

            <div class="form-group{{ $errors->has('duedate') ? ' has-error' : '' }}">
                <label for="duedate" class="control-label">{{ trans('user.duedate') }}</label>


                    <input id="duedate" type="datetime-local" class="form-control" name="duedate" value="{{ old('duedate') }}" required>
                    
                    @if ($errors->has('duedate'))
                        <span class="help-block">
                            <strong>{{ $errors->first('duedate') }}</strong>
                        </span>
                    @endif

            </div>
            
            <div class="form-group{{ $errors->has('registerquote') ? ' has-error' : '' }}">
                <label for="registerquote" class="control-label">{{ trans('user.registerquote') }}</label>

                    <input type="number" id="registerquote" name="registerquote" min="1" value="120" max="99999" required>

                    @if ($errors->has('registerquote'))
                        <span class="help-block">
                            <strong>{{ $errors->first('registerquote') }}</strong>
                        </span>
                    @endif

            </div>
            


          
            
            <button type="submit" class="btn btn-primary">{{ trans('app.save') }}</button>
        </form>
    </div>
</div>
@endsection





