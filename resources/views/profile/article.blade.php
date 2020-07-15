
{{--Короче смтори, здесь тебе надо сделать шаблон одной статьи который потом будет выводиться в цикле в шаблонах my-profile и user-profile--}}

<div class="row justify-content-md-end">
    <div class="row">
        <div class="col-3">
            <img class="profile-img" src={{ asset('img/avatar.png') }} alt="">

        </div>
        {{--                                <input id="id" name="id" value="{{ $article->id }}" type="hidden">--}}
        <div class="col-8">
            <div class="">
                <div class="row">
                    {{ $article->title }}
                </div>
            </div>
            <div>
                <div class="row">
                    <img class="img-article" src={{ asset ($article->image) }} alt="">
                </div>
            </div>
            <div class="">
                <div class="row">
                    <h4>Ыввпдьывплвьп выпьывпльывжл пьывждпьыв дльпывдь ывдпь ывдьапыдв ьываьп ыдльдпылвьап дыльва</h4>
                </div>
            </div>
        </div>
        <div class="col-1">
            <div class="row">

                @if ($user->nickname == Auth::user()->nickname)
                    <button type="button" class="btn dropdown-toggle dropdown-toggle-split" id="dropdownMenuReference" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
{{--                        <a class="dropdown-item" href="#">Редактировать</a>--}}

                    <form method="POST" class="dropdown-item" action="{{ route('delete_article') }}">
                        @csrf
                        <input id="id" name="id" value="{{ $article->article_id }}" type="hidden">
                        <div class="form-group row mb-0">
                            <div class="col-md-8">
                                <button type="submit" class="btn">
                                    Удалить нахуй
                                </button>

                            </div>
                        </div>
                    </form>


                    </div>
                @endif


{{--                <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">--}}
{{--                    <a class="dropdown-item" href="#">Редактировать</a>--}}
{{--                    <a class="dropdown-item" href='/article/{id}'>Удалить</a>--}}

{{--                </div>--}}
            </div>
        </div>
    </div>
</div>
