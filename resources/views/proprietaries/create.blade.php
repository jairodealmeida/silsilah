@extends('layouts.app')
@section('content')
<div class="row">
   <div class="col-sm-8 offset-sm-2">
      <h1 class="display-3">{{ trans('app.record_proprietary') }}</h1>
      <div>
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
         <form method="post" action="{{ route('proprietaries.store') }}">
            @csrf



            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" >{{ trans('user.name') }}</label>


                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif

            </div>

            <div class="form-group{{ $errors->has('cpf') ? ' has-error' : '' }}">
                <label for="cpf">{{ trans('user.cpf') }}</label>


                    <input id="cpf" type="text" class="form-control" name="cpf" value="{{ old('cpf') }}" required>

                    @if ($errors->has('cpf'))
                        <span class="help-block">
                            <strong>{{ $errors->first('cpf') }}</strong>
                        </span>
                    @endif

            </div>

            <div class="form-group{{ $errors->has('rg') ? ' has-error' : '' }}">
                <label for="rg" class="control-label">{{ trans('user.rg') }}</label>


                    <input id="rg" type="text" class="form-control" name="rg" value="{{ old('rg') }}" required>

                    @if ($errors->has('rg'))
                        <span class="help-block">
                            <strong>{{ $errors->first('rg') }}</strong>
                        </span>
                    @endif

            </div>

            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                <label for="phone" class="control-label">{{ trans('user.phone') }}</label>


                    <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required>

                    @if ($errors->has('phone'))
                        <span class="help-block">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                    @endif

            </div>
            

            <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                <label for="mobile" class="control-label">{{ trans('user.mobile') }}</label>

                    <input id="mobile" type="text" class="form-control" name="mobile" value="{{ old('mobile') }}" required>

                    @if ($errors->has('mobile'))
                        <span class="help-block">
                            <strong>{{ $errors->first('mobile') }}</strong>
                        </span>
                    @endif

            </div>
            
            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                <label for="address" class="control-label">{{ trans('user.address') }}</label>


                    <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" required>

                    @if ($errors->has('address'))
                        <span class="help-block">
                            <strong>{{ $errors->first('address') }}</strong>
                        </span>
                    @endif

            </div>
            
            <div class="form-group{{ $errors->has('num_address') ? ' has-error' : '' }}">
                <label for="num_address" class="control-label">{{ trans('user.num_address') }}</label>


                    <input id="num_address" type="text" class="form-control" name="num_address" value="{{ old('num_address') }}" required>

                    @if ($errors->has('num_address'))
                        <span class="help-block">
                            <strong>{{ $errors->first('num_address') }}</strong>
                        </span>
                    @endif

            </div>

            <div class="form-group{{ $errors->has('comp_address') ? ' has-error' : '' }}">
                <label for="comp_address" class="control-label">{{ trans('user.comp_address') }}</label>


                    <input id="comp_address" type="text" class="form-control" name="comp_address" value="{{ old('comp_address') }}" required>

                    @if ($errors->has('comp_address'))
                        <span class="help-block">
                            <strong>{{ $errors->first('comp_address') }}</strong>
                        </span>
                    @endif

            </div>
            
            <div class="form-group{{ $errors->has('cep') ? ' has-error' : '' }}">
                <label for="cep" class="control-label">{{ trans('user.cep') }}</label>


                    <input id="cep" type="text" class="form-control" name="cep" value="{{ old('cep') }}" required>

                    @if ($errors->has('cep'))
                        <span class="help-block">
                            <strong>{{ $errors->first('cep') }}</strong>
                        </span>
                    @endif

            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
         </form>
      </div>
   </div>
</div>
@endsection