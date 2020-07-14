
{{--Короче смтори, здесь тебе надо сделать шаблон одной статьи который потом будет выводиться в цикле в шаблонах my-profile и user-profile--}}

<div class="row justify-content-md-end">
    <div class="row">
        <div class="col-3">
            <img class="profile-img" src={{ asset('img/avatar.png') }} alt="">

        </div>
        {{--                                <input id="id" name="id" value="{{ $article->id }}" type="hidden">--}}
        <div class="col-9">
            <div class="">
                <div class="row">
                    {{ $article->article_id }}

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
    </div>
</div>
