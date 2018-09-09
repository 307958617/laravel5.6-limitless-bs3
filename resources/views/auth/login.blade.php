@extends('layouts.app')

@section('page-title')
    <span class="text-semibold">Login</span>
@endsection

@section('breadcrumb')
    {{ Breadcrumbs::render('login') }}
@endsection

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
        <!-- Simple login form -->
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="panel panel-body login-form">
                <div class="text-center">
                    <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
                    <h5 class="content-group">账号登录 <small class="display-block">Enter your credentials below</small></h5>
                </div>

                <div class="form-group has-feedback has-feedback-left">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="Username">
                    <div class="form-control-feedback">
                        <i class="icon-user text-muted"></i>
                    </div>
                    @if ($errors->has('email'))
                        <span class="help-block text-danger">
                            <strong><i class="icon-cancel-circle2 position-left"></i>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group has-feedback has-feedback-left">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">
                    <div class="form-control-feedback">
                        <i class="icon-lock2 text-muted"></i>
                    </div>
                    @if ($errors->has('password'))
                        <span class="help-block text-danger">
                            <strong><i class="icon-cancel-circle2 position-left"></i>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group login-options">
                    <div class="row">
                        <div class="col-sm-6">
                            <label class="checkbox-inline">
                                <input type="checkbox" class="styled" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                {{ __('Remember') }}
                            </label>
                        </div>

                        <div class="col-sm-6 text-right">
                            <a href="{{ route('password.request') }}">{{ __('忘记密码?') }}</a>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Sign in <i class="icon-circle-right2 position-right"></i></button>
                </div>

                <span class="help-block text-center no-margin">By continuing, you're confirming that you've read our <a href="#">Terms &amp; Conditions</a> and <a href="#">Cookie Policy</a></span>
            </div>
        </form>
        <!-- /simple login form -->
    <div>
</div>
@endsection
