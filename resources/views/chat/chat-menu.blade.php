@extends('layouts.app')

@section('content')
    @include('templates.menu')

    <div class="container">
        <a href="/chat">
            <div class="massege row">
                <div class="col-md-2">
                    <img class="profile-img" src="../img/avatar.png" alt="">
                </div>
                <hr>
                <div class="col-md-8">
                    <p>Общий чат сайта</p>
                    <p>Сообщение</p>
                </div>

                <div class="col-md-2">
                    18:32(дата последнего сообщения)
                </div>
            </div>
        </a>
    </div>
@endsection
