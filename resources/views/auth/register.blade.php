@extends('layouts.app')

@section('head')
    <script src="{{ asset('limitless/js/select2.min.js') }}" defer></script>
@endsection

@section('page-title')
    <span class="text-semibold">Register</span>
@endsection

@section('breadcrumb')
    {{ Breadcrumbs::render('register') }}
@endsection

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <!-- Simple register form -->
                <div class="panel panel-body login-form">
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @csrf
                        <div class="text-center">
                            <div class="icon-object border-success text-success"><i class="icon-plus3"></i></div>
                            <h5 class="content-group">创建账号 <small class="display-block">All fields are required</small></h5>
                        </div>

                        <div class="form-group has-feedback has-feedback-left">
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus placeholder="Your name">
                            <div class="form-control-feedback">
                                <i class="icon-user-check text-muted"></i>
                            </div>

                            @if ($errors->has('name'))
                                <span class="help-block text-danger" role="alert">
                                    <strong><i class="icon-cancel-circle2 position-left"></i>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group has-feedback has-feedback-left">
                            {{--<input id="gender" type="text" class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}" name="name" value="{{ old('gender') }}" required autofocus placeholder="Your gender">--}}
                            <select id="gender" class="form-control {{ $errors->has('gender') ? ' is-invalid' : '' }}" name="gender"  autofocus>
                                <option value="" hidden>Your gender</option>
                                <option value="M">Male</option>
                                <option value="F">Female</option>
                            </select>



                            <div class="form-control-feedback">
                                <i class="fa fa-venus-mars text-muted" aria-hidden="true"></i>
                            </div>

                            @if ($errors->has('gender'))
                                <span class="help-block text-danger" role="alert">
                                    <strong><i class="icon-cancel-circle2 position-left"></i>{{ $errors->first('gender') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group has-feedback has-feedback-left">
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="Your email">
                            <div class="form-control-feedback">
                                <i class="icon-mention text-muted"></i>
                            </div>

                            @if ($errors->has('email'))
                                <span class="help-block text-danger" role="alert">
                                        <strong><i class="icon-cancel-circle2 position-left"></i>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group has-feedback has-feedback-left">
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Create password">
                            <div class="form-control-feedback">
                                <i class="icon-user-lock text-muted"></i>
                            </div>

                            @if ($errors->has('password'))
                                <span class="help-block text-danger" role="alert">
                                        <strong><i class="icon-cancel-circle2 position-left"></i>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>



                        <div class="form-group has-feedback has-feedback-left">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Repeat password">
                            <div class="form-control-feedback">
                                <i class="icon-user-lock text-muted"></i>
                            </div>
                        </div>

                        <button type="submit" class="btn bg-teal btn-block btn-lg">Register <i class="icon-circle-right2 position-right"></i></button>
                    </form>
                </div>
                <!-- /Simple register form -->
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            //修改select默认显示text样式--开始
            let select = $('select');
            select.css('color','#999');
            $('option').css('color','#323232');
            select.change(function(){
                let $selltem = $(this).val();
                if($selltem === $(this).find('option:first').val()){
                    $(this).css('color','#999');
                }else{
                    $(this).css('color','#323232');
                }
            });
            //修改select默认显示text样式--结束
        })
    </script>

@endsection

