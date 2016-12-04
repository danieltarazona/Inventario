@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">{{trans('strings.register')}}</div>
          <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
              {{ csrf_field() }}

              <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                <label for="username" class="col-md-4 control-label">{{trans('strings.username')}}</label>

                <div class="col-md-6">
                  <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}">

                  @if ($errors->has('username'))
                    <span class="help-block">
                      <strong>{{ $errors->first('username') }}</strong>
                    </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                <label for="first_name" class="col-md-4 control-label">{{trans('strings.first_name')}}</label>

                <div class="col-md-6">
                  <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}">

                  @if ($errors->has('first_name'))
                    <span class="help-block">
                      <strong>{{ $errors->first('first_name') }}</strong>
                    </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                <label for="last_name" class="col-md-4 control-label">{{trans('strings.last_name')}}</label>

                <div class="col-md-6">
                  <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}">

                  @if ($errors->has('last_name'))
                    <span class="help-block">
                      <strong>{{ $errors->first('last_name') }}</strong>
                    </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('dni') ? ' has-error' : '' }}">
                <label for="dni" class="col-md-4 control-label">{{trans('strings.dni')}}</label>

                <div class="col-md-6">
                  <input id="dni" type="text" class="form-control" name="dni" value="{{ old('dni') }}">

                  @if ($errors->has('dni'))
                    <span class="help-block">
                      <strong>{{ $errors->first('dni') }}</strong>
                    </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">{{trans('strings.email')}}</label>

                <div class="col-md-6">
                  <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                  @if ($errors->has('email'))
                    <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                    </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-4 control-label">{{trans('strings.password')}}</label>

                <div class="col-md-6">
                  <input id="password" type="password" class="form-control" name="password">

                  @if ($errors->has('password'))
                    <span class="help-block">
                      <strong>{{ $errors->first('password') }}</strong>
                    </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <label for="password-confirm" class="col-md-4 control-label">{{trans('strings.confirm_password')}}</label>

                <div class="col-md-6">
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                  @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                      <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                  @endif
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                  <button type="submit" class="btn btn-primary">
                    <i class="fa fa-btn fa-user"></i> {{trans('strings.register')}}
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
