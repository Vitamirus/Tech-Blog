@extends('layouts.app')

@section('content')
    @include('templates.menu')
    <div class="container">
        <div class="row">
            <div class="col-md-6">

                <form method="POST" action="{{ route('settings') }}">
                    @csrf

                    <div class="row">

                        <div class="offset-md-1 col-md-5">
                            <div class="form-group">
                                <input id="id" name="id" value="{{ Auth::user()->id }}" type="hidden">

                                <label for="firstname" class="col-form-label text-md-right">{{ __('Имя') }}</label>

                                <input id="firstname"  type="text" class="form-control" name="firstname" value="{{ old('firstname') }}{{ Auth::user()->firstname }}">
                            </div>

                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="lastname" class="col-form-label text-md-right">{{ __('Фамилия') }}</label>

                                <input id="lastname" type="text" class="form-control " name="lastname" value="{{ old('lastname') }}{{ Auth::user()->lastname }}">

                            </div>

                        </div>

                        <div class="col-md-5 offset-md-2 mt-3">
                            <div class="form-group">
                                <button type="submit" class="btn-reg btn-primary btn btn-block" style="background: #5F9093; border-radius: 16px; !important;">
                                    <div style="color: #FFFFFF">{{ __('Изменить') }}</div>
                                </button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection
