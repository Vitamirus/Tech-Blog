@extends('layouts.app')

@section('content')
    @include('templates.menu')
<div class="container-fluid ">
    <div class="col-lg-12 justify-content-md-center">
        <h3>Результаты поиска: "{{ Request::input('query') }}"</h3>

        @if(!$users->count())
                <p>Я ничего не нашел :(</p>
            @else
                <div class="row">
                    <div class="profile_block col-lg-12 ">
                        @foreach($users as $user)

                            @include('user.userblock')
                            <h4>Друзья {{ $user->firstname  }}:</h4>
                                @if(!$user->friends()->count())
                                    <p>{{ $user->firstname }} нет друзей.</p>
                                @else
                                    @foreach($user->friends() as $user)
                                        @include('user.userblock')
                                    @endforeach
                                @endif
                            <hr>
                        @endforeach
                    </div>

                </div>
        @endif
    </div>
</div>
@endsection

