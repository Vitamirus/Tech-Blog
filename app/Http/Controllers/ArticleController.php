<?php

namespace App\Http\Controllers;

use App\Article;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
//    protected $redirectTo = RouteServiceProvider::HOME;

    public function addArticle(Request $request)
    {
        $user = User::where('nickname', Auth::user()->nickname)->first();

        $contact = new Article();
        $contact->title = $request->input('title');
        $f = $request->file('image');

        $f->move(storage_path('images'), time().'_'.$f->getClientOriginalName());
        $contact->image = storage_path('images').time().'_'.$f->getClientOriginalName();


        $contact->text = $request->input('text');
        $contact->user_id = Auth::user()->id;

        $contact->save();

        return redirect()->route('home');
    }
}
