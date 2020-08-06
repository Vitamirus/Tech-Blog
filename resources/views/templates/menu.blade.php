<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('img/logo/logo.png') }}" alt="">
            {{--                    {{ config('app.name', 'Актикум') }}--}}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Вход') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Регистрация') }}</a>
                        </li>
                    @endif
                @else

                    <ul>

{{--                        {{$categories}}--}}
{{--                        @foreach ($categories as $category)--}}
{{--                           <li>{{ $category->top_menu_id }}</li>--}}
{{--                            <ul>--}}
{{--                                @foreach ($category->childrenCategories as $childCategory)--}}
{{--                                    @include('child_category', ['child_category' => $childCategory])--}}
{{--                                @endforeach--}}
{{--                            </ul>--}}
{{--                        @endforeach--}}
                    </ul>
                    <li class="nav-item">
                        <a id="navbarDropdown" class="nav-link" href="{{route('chat-menu')}}"  aria-haspopup="true" aria-expanded="false" v-pre>
                            Чаты</a>
                    </li>
                <li class="nav-item ">
                    <form class="bd-search d-flex align-items-center" method="GET" action="{{route('results')}}">
                        <input type="search" name="query" class="form-control mr-sm-2" placeholder="Поиск пользователей" aria-label="Search">

                        <button type="submit" class="btn btn-link">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill-rule="evenodd" d="M14.53 15.59a8.25 8.25 0 111.06-1.06l5.69 5.69a.75.75 0 11-1.06 1.06l-5.69-5.69zM2.5 9.25a6.75 6.75 0 1111.74 4.547.746.746 0 00-.443.442A6.75 6.75 0 012.5 9.25z"></path></svg>
                        </button>

                    </form>
                </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->firstname }} {{ Auth::user()->lastname }} ({{'@'.Auth::user()->nickname}})<span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item " href="{{"/user/".Auth::user()->nickname}}">
                                Мой профиль
                            </a>

                            <a class="dropdown-item " href="/friends">
                                Друзья
                            </a>

                            <a class="dropdown-item " href="/settings">
                                Настройки
                            </a>


                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Выход') }}
                            </a>



                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
