@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row ">
            <div class="pd col-md-6">
                <img class="img-fluid" src="{{ asset('img/Login-left.png') }}" alt="">
            </div>
            <div class="pd col-md-6 ">
                <div class="registr">
                    <div class="col-md-8 offset-md-2 mt-5">


                    </div>
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Вход</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Регистрация</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"><div class="card">

                                <div class="card-body">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Почта:') }}</label>

                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Пароль:') }}</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-6 offset-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                    <label class="form-check-label" for="remember">
                                                        {{ __('Запомнить меня') }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row mb-0">
                                            <div class="col-md-8 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Вход') }}
                                                </button>

                                                @if (Route::has('password.request'))
                                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                                        {{ __('Забыли пароль ?') }}
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div></div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"><div class="card">
                                {{--                <div class="card-header">{{ __('Register') }}</div>--}}

                                <div class="card-body">
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        {{-- ИМЯ ПОЛЬЗОВАТЕЛЯ  --}}
                                        <div class="row">
                                            <div class="offset-md-1 col-md-5">
                                                <div class="form-group">
                                                    <label for="firstname" class="col-form-label text-md-left">{{ __('Имя') }}</label>

                                                    <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>

                                                    @error('firstname')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                    @enderror

                                                </div>

                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label for="lastname" class="col-form-label text-md-left">{{ __('Фамилия') }}</label>

                                                    <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>

                                                    @error('lastname')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                    @enderror

                                                </div>
                                            </div>

                                            <div class="col-md-10 offset-md-1">
                                                <div class="form-group">
                                                    <label for="email" class="col-form-label text-md-left">{{ __('E-Mail') }}</label>

                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                    @enderror

                                                </div>
                                            </div>

                                            <div class="offset-md-1 col-md-5">
                                                <div class="form-group">
                                                    <label for="password" class="col-form-label text-md-left">{{ __('Пароль') }}</label>
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label for="password-confirm" class="col-form-label text-md-left">{{ __('Повторите пароль') }}</label>
                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                                </div>
                                            </div>

                                            <div class="col-md-8 offset-md-2 mt-3">
                                                <div class="form-group">
                                                    <button type="submit" class="btn-reg btn-primary btn btn-block" style="background: #5F9093; border-radius: 16px; !important;">
                                                        <div style="color: #FFFFFF">{{ __('Регистрация') }}</div>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div></div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
