@extends('layouts.app')

@section('content')
    @include('templates.menu')
    <div class="row">
        <div class="col-md-6">
            {{ $user->firstname  }}
        </div>
    </div>

@endsection
