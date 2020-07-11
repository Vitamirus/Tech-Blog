@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row ">
        <div class="pd col-md-6">
            <img class="img-fluid" src="{{ asset('img/Login-left.png') }}" alt="">
        </div>
        <div class="pd col-md-6 ">
            <div class="">
                <div class="col-md-8 offset-md-2 mt-5">
                    <div class="card">
                        {{--                <div class="card-header">{{ __('Register') }}</div>--}}

                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                {{-- ИМЯ ПОЛЬЗОВАТЕЛЯ  --}}
                                <div class="row">
                                    <div class="offset-md-1 col-md-5">
                                        <div class="form-group">
                                            <label for="firstname" class="col-form-label text-md-right">{{ __('Имя') }}</label>

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
                                            <label for="lastname" class="col-form-label text-md-right">{{ __('Фамилия') }}</label>

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
                                            <label for="email" class="col-form-label text-md-right">{{ __('E-Mail') }}</label>

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
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
