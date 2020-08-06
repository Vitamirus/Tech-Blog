@extends('layouts.app')

@section('content')
    @include('templates.menu')
        <div class="row">
            <div class="col-lg-6">
                <h3>Ваши друзья:</h3>
            @if (!$friends->count())
                    <p>У вас нет друзей. :(</p>
                @else
                    @foreach($friends as $user)
                        @include('user.userblock')
                        <form action="{{ route('friends.delete', ['nickname' => $user->nickname]) }}" method="POST">
                            @csrf
                            <input type="submit" value="Удалить из друзей" class="btn btn-primary my-2">
                        </form>
                        <hr>
                    @endforeach
            @endif
            </div>
            <div class="col-lg-6">
                <h3>Запросы в друзья:</h3>

                @if ( ! $requests->count() )
                    <p>У вас нет запросов в друзья.</p>
                @else
                    @foreach ($requests as $user)
                        @include('user.userblock')
                        <a href="{{ route('friends.accept', ['nickname' => $user->nickname]) }}"
                           class="btn btn-primary mb-2">Подтвердить дружбу</a>
                        <hr>
                    @endforeach
                @endif
            </div>
        </div>
@endsection
