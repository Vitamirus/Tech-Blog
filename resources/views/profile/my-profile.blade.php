@extends('layouts.app')

@section('content')
    @include('templates.menu')
    <div class="imageback">
        <img class="ava" type="button" src={{ asset ($user->avatar) }} data-toggle="modal" data-target="#exampleModalava"  alt="">
        <div class="modal fade" id="exampleModalava" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ route('avatar') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                         <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Смена авы</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                                <input type="file" name="avatar" id="avatar">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 blog-main">
                <div class="blog-post">
                    <div class="d-flex justify-content-end">
                        <h2 class="name blog-post-title">{{ $user->firstname  }} {{ $user->lastname  }} ({{'@'.Auth::user()->nickname}})

                            <a type="submit" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" ><img class="accept"  src="img/accept.png" alt="" ></a></h2>

                        @if($user->isOnline())
                            <span class="color-green font-size-12"><i class="demo-icon icon-circle"></i>
                            online </span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M1.75 2.5h12.5a.25.25 0 01.25.25v7.5a.25.25 0 01-.25.25H1.75a.25.25 0 01-.25-.25v-7.5a.25.25 0 01.25-.25zM14.25 1H1.75A1.75 1.75 0 000 2.75v7.5C0 11.216.784 12 1.75 12h3.727c-.1 1.041-.52 1.872-1.292 2.757A.75.75 0 004.75 16h6.5a.75.75 0 00.565-1.243c-.772-.885-1.193-1.716-1.292-2.757h3.727A1.75 1.75 0 0016 10.25v-7.5A1.75 1.75 0 0014.25 1zM9.018 12H6.982a5.72 5.72 0 01-.765 2.5h3.566a5.72 5.72 0 01-.765-2.5z"></path></svg>
                        @else
                            <span class="color-red font-size-12"><i class="demo-icon icon-circle-empty"></i>
                            offline</span>
                        @endif

                    </div>
                    <div class="d-flex justify-content-end">
                        <div class="d-flex justify-content-end">
                            <p class="info-profyl"> {{$user->country}}, г.{{$user->city}}, {{ Auth::User()->age($user)." лет"}} , п: {{$user->gender}}</p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <input class="status form-control-plaintext" data-toggle="modal" data-target="#exampleModal1"
                               data-whatever="@fat"  placeholder="Добавить статус" value="{{Auth::user()->status }}">
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
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                                                <button type="submit" class="btn btn-primary">Сохранить</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <br>
                        </div><!-- /.blog-post -->
                        <br><br><br>
                        <div class="row">
                            <div class="col-2 justify-content-end">

                                <div class="list-group" id="list-tab" role="tablist">
                                    <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Статьи</a>
                                    <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Друзья</a>
                                    <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Messages</a>
                                    <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Settings</a>
                                </div>
                                <button type="submit" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" class="btn-reg btn-primary btn btn-block" style="background: #5F9093; border-radius: 16px; !important;">
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
                    @endif



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
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                                                        <button type="submit" class="btn btn-primary">Добавить</button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
{{--                            @foreach($user->article->sortByDesc('article_id') as $article)--}}
{{--                                @include('profile.article')--}}
{{--                            @endforeach--}}
                </div><!-- /.blog-main -->
                    <div class="col-md-10">

                    </div>
    </div>

@endsection
