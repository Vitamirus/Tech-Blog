<?php

namespace App\Http\Controllers;

use App\Article;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\TableDelete;

class ArticleController extends Controller
{
//    protected $redirectTo = RouteServiceProvider::HOME;

    public function addArticle(Request $request)
    {
        $user = User::where('nickname', Auth::user()->nickname)->first();

        $contact = new Article();
        $contact->title = $request->input('title');


        $f = $request->file('image');

        $f->move('storage/images/', time().'_'.$f->getClientOriginalName());
        $contact->image = 'storage/images/'.time().'_'.$f->getClientOriginalName();


        $contact->text = $request->input('text');
        $contact->user_id = Auth::user()->id;

        $contact->save();

        return redirect()->route('home');
    }
    public function deleteArticle(Request $request)
    {
        $user = User::where('nickname', Auth::user()->nickname)->first();

        $delete = Article::where('article_id', $request->input('id'))->delete();

        return redirect()->route('home');
    }

}
//создать новую функцию удаления туть БЛЯТЬ в которую отправить из формы какую то штуку с кнопки удалить в скобочках ($id)
