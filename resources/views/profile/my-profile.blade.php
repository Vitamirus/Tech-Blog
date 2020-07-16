@extends('layouts.app')

@section('content')
    @include('templates.menu')
    {{--    <div class="row">--}}
    {{--        <div class="col-md-6">--}}
    {{--            {{ $user->firstname  }} {{ $user->lastname  }}--}}
    {{--        </div>--}}
    {{--    </div>--}}
    <div class="imageback">
        <img class="ava"  src={{ asset('img/avatar.png') }} alt="">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-10 blog-main">
                <div class="blog-post">
                    <div class="d-flex justify-content-end">
                        <h2 class="name blog-post-title">{{ $user->firstname  }} {{ $user->lastname  }} ({{'@'.Auth::user()->nickname}})<img class="accept"  src="img/accept.png" alt=""></h2>

                        @if($user->isOnline())
                            <span class="color-green font-size-12"><i class="demo-icon icon-circle"></i>

                            online</span>
                        @else
                            <span class="color-red font-size-12"><i class="demo-icon icon-circle-empty"></i>
                            offline</span>
                        @endif
                        <div class="d-flex justify-content-end">
                            <p class="info-profyl"> Россия, г.Смоленск, 21 год</p>
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
                            <div class="nav_down row col-md-12 justify-content-end">
                                <div class="col-md-2">
                                    <div class="col-md-1">
                                        <p>Статьи</p>
                                    </div>
                                    <div class="col-md-1">

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="col-md-1">
                                        <p>Читатели</p>
                                    </div>
                                    <div class="col-md-1">

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="col-md-1">
                                        <p>Подписки</p>
                                    </div>
                                    <div class="col-md-1">

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="col-md-1">
                                        <p>Библиотека</p>
                                    </div>
                                    <div class="col-md-1">

                                    </div>
                                </div>
                            </div>

                        </div><!-- /.blog-post -->
                    @endif



                    <br><br><br>
                    <div class="row justify-content-md-end">
                        <div class="form-group">
                            <button type="submit" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" class="btn-reg btn-primary btn btn-block" style="background: #5F9093; border-radius: 16px; !important;">
                                <div style="color: #FFFFFF">{{ __('Добавить статью') }}</div>
                            </button>
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

                        @foreach($user->article->sortByDesc('article_id') as $article)
                            @include('profile.article')
                        @endforeach
                    </div><!-- /.blog-main -->
    </div>

@endsection
