@extends('layouts.login')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-lg-7 col-md-6 col-sm-12 hidden-xs">
        <img src="images/owl-logo.png" alt="" style="width:100%;">
      </div>
        <div class="col-lg-5 col-md-6 col-sm-12">
            <div class="card" style="border-color: rgba(208, 92, 227, 0);background: #ffc0cb00;color: #a13871;">
                <div class="card-body" style="background: transparent;">
                  <center style="padding-top:  20px;background:  white;">
                    <img src="images/logo.jpg" alt="" class="logoPng">
                  </center>
                    <form method="POST" action="{{ route('login') }}" style="background:  white;padding-bottom:  40px;">
                        @csrf
                        <div class="form-group row">
                        <div class="col-md-12" style="padding-left:10px">

                        @if($errors->has('notAllowed'))
                        <center>
                          {{$errors->first('notAllowed')}}
                        </center>
                        @endif
                        </div>
                      </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right" style="font-weight:bolder;font-size:16px;">{{ __('Username') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right" style="font-weight:bolder;font-size:16px;">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="checkbox">
                                    <label style="font-weight:bolder;font-size:14px;">
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} > {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="width:100%;">
                                    {{ __('Login') }}
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
