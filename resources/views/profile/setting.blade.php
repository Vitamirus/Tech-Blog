@extends('layouts.app')

@section('content')
    @include('templates.menu')
    <div class="container">
        <div class="row">
            <div class="col-md-5">

                <form method="POST" action="{{ route('settings') }}">
                    @csrf
                    <div class="row">
                        <div class="offset-md-1 mt-4">
                            <h3 class="text-h3">Личные данные</h3>
                        </div>
                    </div>
                    <hr style="margin: 4px">
                    <div class="row">

                        <div class="offset-md-1 col-md-5">

                            <div class="form-group">
                                <input id="id" name="id" value="{{ Auth::user()->id }}" type="hidden">

                                <label for="firstname" class="col-form-label text-md-left">{{ __('Имя') }}</label>

                                <input id="firstname"  type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname')}}{{ Auth::user()->firstname }}">

                                @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <hr>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="lastname" class="col-form-label text-md-left">{{ __('Фамилия') }}</label>

                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname')}}{{Auth::user()->lastname }}">

                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="offset-md-1 col-md-5">
                            <div class="form-group">
{{--                               --}}{{-- это вниз в vallue--}}

                                <label for="nickname" class="col-form-label text-md-left">{{ __('Страна') }}</label>

                                <input id="nickname"  type="text" class="form-control @error('nickname') is-invalid @enderror" name="nickname" value="{{ old('nickname')}}{{ Auth::user()->nickname }}">

                                @error('nickname')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <hr>
                        </div>

                        <div class="col-md-5">
                            <div class="form-group">
{{--                               --}}{{-- это вниз в vallue--}}

                                <label for="nickname" class="col-form-label text-md-left">{{ __('Город') }}</label>

                                <input id="nickname"  type="text" class="form-control @error('nickname') is-invalid @enderror" name="nickname" value="{{ old('nickname')}}{{ Auth::user()->nickname }}">

                                @error('nickname')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                        <div class="offset-md-1 col-md-5">
                            <div class="form-group">

                                <label for="nickname" class="col-form-label text-md-left">{{ __('Ник') }}</label>

                                <input id="nickname"  type="text" class="form-control @error('nickname') is-invalid @enderror" name="nickname" value="{{ old('nickname')}}{{ Auth::user()->nickname }}">




                                @error('nickname')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="form-group">

                                <label for="date" class="col-form-label text-md-left">{{ __('Дата рождения') }}</label>

                                <input id="date"  type="date" min="1950-01-01" max="2002-01-01" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date')}}{{ Auth::user()->date }}">
                                {{--                                <input type="date"  name="trip-start" value="2018-07-22" min="1950-01-01" max="2002-01-01">--}}
                                @error('date')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-5 offset-md-2 mt-3">
                            <div class="form-group">
                                <button type="submit" class="btn-reg btn-primary btn btn-block" style="background: #5F9093; border-radius: 16px; !important;">
                                    <div style="color: #FFFFFF">{{ __('Сохранить') }}</div>
                                </button>
                            </div>
                        </div>
                    </div>

                </form>


            </div>
        </div>
    </div>

@endsection
