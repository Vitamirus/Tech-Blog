@extends('layouts.app')

@section('content')
    @include('templates.menu')
    <div class="row">
        <div class="col-md-6">
            {{ $user->firstname  }} {{ $user->lastname  }}
        </div>
    </div>

@endsection
