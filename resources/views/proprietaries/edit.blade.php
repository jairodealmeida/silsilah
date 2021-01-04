@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Editar Proprietário</h1>

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
        <form method="post" action="{{ route('proprietaries.update', $proprietary->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">{{ trans('user.name') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" value="{{  $proprietary->proprietary->name  }}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('cpf') ? ' has-error' : '' }}">
                <label for="cpf" class="col-md-4 control-label">{{ trans('user.cpf') }}</label>

                <div class="col-md-6">
                    <input id="cpf" type="text" class="form-control" name="cpf" value="{{ $proprietary->proprietary->cpf }}" required>

                    @if ($errors->has('cpf'))
                        <span class="help-block">
                            <strong>{{ $errors->first('cpf') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('rg') ? ' has-error' : '' }}">
                <label for="rg" class="col-md-4 control-label">{{ trans('user.rg') }}</label>

                <div class="col-md-6">
                    <input id="rg" type="text" class="form-control" name="rg" value="{{ $proprietary->proprietary->rg }}" required>

                    @if ($errors->has('rg'))
                        <span class="help-block">
                            <strong>{{ $errors->first('rg') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                <label for="phone" class="col-md-4 control-label">{{ trans('user.phone') }}</label>

                <div class="col-md-6">
                    <input id="phone" type="text" class="form-control" name="phone" value="{{ $proprietary->proprietary->phone }}" required>

                    @if ($errors->has('phone'))
                        <span class="help-block">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            

            <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                <label for="mobile" class="col-md-4 control-label">{{ trans('user.mobile') }}</label>

                <div class="col-md-6">
                    <input id="mobile" type="text" class="form-control" name="mobile" value="{{ $proprietary->proprietary->mobile }}" required>

                    @if ($errors->has('mobile'))
                        <span class="help-block">
                            <strong>{{ $errors->first('mobile') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            
            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                <label for="address" class="col-md-4 control-label">{{ trans('user.address') }}</label>

                <div class="col-md-6">
                    <input id="address" type="text" class="form-control" name="address" value="{{ $proprietary->proprietary->address }}" required>

                    @if ($errors->has('address'))
                        <span class="help-block">
                            <strong>{{ $errors->first('address') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            
            <div class="form-group{{ $errors->has('num_address') ? ' has-error' : '' }}">
                <label for="num_address" class="col-md-4 control-label">{{ trans('user.num_address') }}</label>

                <div class="col-md-6">
                    <input id="num_address" type="text" class="form-control" name="num_address" value="{{ $proprietary->proprietary->num_address }}" required>

                    @if ($errors->has('num_address'))
                        <span class="help-block">
                            <strong>{{ $errors->first('num_address') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('comp_address') ? ' has-error' : '' }}">
                <label for="comp_address" class="col-md-4 control-label">{{ trans('user.comp_address') }}</label>

                <div class="col-md-6">
                    <input id="comp_address" type="text" class="form-control" name="comp_address" value="{{ $proprietary->proprietary->comp_address }}" required>

                    @if ($errors->has('comp_address'))
                        <span class="help-block">
                            <strong>{{ $errors->first('comp_address') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            
            <div class="form-group{{ $errors->has('cep') ? ' has-error' : '' }}">
                <label for="cep" class="col-md-4 control-label">{{ trans('user.cep') }}</label>

                <div class="col-md-6">
                    <input id="cep" type="text" class="form-control" name="cep" value="{{ $proprietary->proprietary->cep }}" required>

                    @if ($errors->has('cep'))
                        <span class="help-block">
                            <strong>{{ $errors->first('cep') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
</div>
@endsection





