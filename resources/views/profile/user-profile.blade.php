@extends('layouts.app')

@section('content')
    @include('templates.menu')
{{--    <div class="row">--}}
{{--        <div class="col-md-6">--}}
{{--            {{ $user->firstname  }} {{ $user->lastname  }}--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="imageback">
        <img class="ava"  src="img/avatar.png" alt="">
    </div>
    <div class="container">
    @if($user->isOnline())
        <span class="color-green font-size-12"><i class="demo-icon icon-circle"></i>
                            online</span>
    @else
        <span class="color-red font-size-12"><i class="demo-icon icon-circle-empty"></i>
                            offline</span>
    @endif
    </div>
    <div class="row">
        <div class="col-md-9 blog-main">
            <div class="blog-post">
                <div class="d-flex justify-content-end">
                    <h2 class="name blog-post-title">{{ $user->firstname  }} {{ $user->lastname  }} ({{'@'.Auth::user()->nickname}})<img class="accept"  src="img/accept.png" alt=""></h2>

                    <p class="info-profyl"> Россия, г.Смоленск, 21 год</p>
                </div>
                <div class="d-flex justify-content-end">
                    <div class="page_current_info" id="page_current_info"><div id="currinfo_editor" class="page_status_editor clear" onclick="cancelEvent(event)" style="display: none;">
                            <div class="editor">
                                <div class="page_status_input_wrap _emoji_field_wrap">
                                    <div class="emoji_smile_wrap  _emoji_wrap">
                                        <div class="emoji_smile _emoji_btn" title="Используйте TAB, чтобы быстрее открывать смайлы" onmouseover="return Emoji.show(this, event);" onmouseout="return Emoji.hide(this, event);" onclick="return cancelEvent(event);">
                                            <div class="emoji_smile_icon"></div>
                                        </div>
                                    </div>
                                    <div class="page_status_input" id="currinfo_input" contenteditable="true" role="textbox">M83 – Don't Save Us From the Flames</div>
                                </div>
                               <button class="flat_button button_small page_status_btn_save" id="currinfo_save">Сохранить</button>
                            </div>
                        </div>
                        <div id="currinfo_wrap" onclick="return Page.infoEdit();" tabindex="0" role="button" style="display: block;">
                            <span id="current_info" class="current_info"><span class="my_current_info">Всему своё время, всему своё место, всему свои деньги</span></span>
                        </div>
                        <div id="currinfo_fake" style="display: none;"><span class="my_current_info"><div class="page_current_audio">
  <div class="current_audio_cnt  hidden" onmouseover="Page.audioListenersOver(this, cur.oid)" onclick="Page.showAudioListeners(cur.oid, event)">0</div>
  <div class="current_audio_wrap">
    <a class="current_audio" data-audio="87040489_456241530_s87040489" data-live="87040489,87040489_456241530,">
      <span class="current_audio_icon"></span>
    </a>
  </div>

</div></span></div></div>

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



            <nav class="blog-pagination">
                <a class="btn btn-outline-primary" href="#">Older</a>
                <a class="btn btn-outline-secondary disabled" href="#" tabindex="-1" aria-disabled="true">Newer</a>
            </nav>

        </div><!-- /.blog-main -->
@endsection
