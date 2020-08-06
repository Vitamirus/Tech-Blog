@extends('layouts.app')

@section('content')
    @include('templates.menu')
    {{--    <div class="row">--}}
    {{--        <div class="col-md-6">--}}
    {{--            {{ $user->firstname  }} {{ $user->lastname  }}--}}
    {{--        </div>--}}
    {{--    </div>--}}
    <div class="imageback">
        <img class="ava"     src={{ asset ($user->avatar) }} data-toggle="modal" data-target="#exampleModalava"  alt="">
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 blog-main">
                <div class="blog-post">
                    <div class="d-flex justify-content-end">
                        <h2 class="name blog-post-title">{{ $user->firstname  }} {{ $user->lastname  }} ({{'@'.$user->nickname}})<img class="accept"  src="img/accept.png" alt=""></h2>


                        @if($user->isOnline())
                            <span class="color-green font-size-12"><i class="demo-icon icon-circle"></i>

                            online</span>
                        @else
                            <span class="color-red font-size-12"><i class="demo-icon icon-circle-empty"></i>
                            offline</span>
                        @endif
                        <div class="d-flex justify-content-end">
                            <p class="info-profyl">  {{$user->country}}, г.{{$user->city}}, {{$user->date . "год"}}</p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <input class="status form-control-plaintext" data-toggle="modal" data-target="#exampleModal1"
                               data-whatever="@fat"  placeholder="Добавить статус" value="{{ $user->status }}">
                    </div>
                    @if ($user->nickname == Auth::user()->nickname)
                        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Статус</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{ route('status') }}">
                                            @csrf
                                            <div class="form-group">
                                                <input id="id" name="id" value="{{ Auth::user()->id }}" type="hidden">
                                                <label for="recipient-name" class="col-form-label">Введите статус:</label>
                                                <input id="status"  type="text" class="form-control @error('status')
                                                    is-invalid @enderror" name="status" value="{{ old('status')}}{{ Auth::user()->status }}">
                                            </div>
                                            <div class="modal-footer">
                                                 </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <br>
                        </div><!-- /.blog-post -->
                    @endif
                    <br><br><br>
                    <div class="row">
                        <div class="col-2 justify-content-end">

                            <div class="list-group" id="list-tab" role="tablist">
                                <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Статьи</a>
                                <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Друзья</a>
                                <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Messages</a>
                                <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Settings</a>
                            </div>
                            <br>
                            <a href="{{ route('friends.add', ['nickname' => $user->nickname]) }}" class="btn btn-primary">Добавить в друзья</a>
                            <br>
                            <br>
                            <button type="submit" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" class="btn btn-primary mt-6">
                                <div style="color: #FFFFFF">{{ __('Добавить статью') }}</div>
                            </button>
                        </div>
                        <div class="col-10">
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                                    @foreach($user->article->sortByDesc('article_id') as $article)
                                        @include('profile.article')
                                    @endforeach</div>
                                <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                                    <hr>
                                </div>
                                <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">...</div>
                                <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">...</div>
                            </div>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="row justify-content-md-end">

                        <div class="form-group">

                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Новая статья</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('article') }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">Заголовок:</label>
                                                        <input type="text" name="title" placeholder="Введите заголовок" id="title" class="form-control" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">Картинка:</label>
                                                        <input type="file" name="image" id="image">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="message-text" class="col-form-label">Текст:</label>
                                                        <textarea type="text" name="text" placeholder="Введите заголовок" id="text" class="form-control"></textarea>
                                                    </div>
                                                    <div class="modal-footer">

                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

{{--                        <div class="sett col-md-3">--}}
{{--                            <a class="btn btn-light" href="/chat">Написать сообщение</a>--}}
{{--                            <a href="{{ route('friends.add', ['nickname' => $user->nickname]) }}" class="btn btn-light">Добавить в друзья</a>--}}
{{--                            <a class="btn btn-light" href="/chat">Создать сообщество</a>--}}
{{--                            <hr>--}}
{{--                            <a class="btn btn-light" href="/chat">Жалоба</a>--}}
{{--                        </div>--}}

                    </div><!-- /.blog-main -->

                </div>
@endsection
