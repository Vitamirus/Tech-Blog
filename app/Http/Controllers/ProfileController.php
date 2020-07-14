<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Article;

class ProfileController extends Controller
{
    public function __construct(){

        $this->middleware('auth');
    }

    public function getProfile($nickname){

       $user = User::where('nickname', $nickname)->first();
       if (!$user) {
           abort(404);
       }

       if ($nickname == Auth::user()->nickname){
           return view('profile.my-profile', compact('user'));
       }
       else {
           return view('profile.user-profile', compact('user'));
       }

   }

//    public function addArticle(Request $request)
//    {
//        $user = User::where('nickname', Auth::user()->nickname)->first();
//
//        $contact = new Article();
//        $contact->title = $request->input('title');
//        $contact->image = '/test'; #$request->input('image');
//        $contact->text = $request->input('text');
//        $contact->user_id = Auth::user()->id;
//
//        $contact->save();
//
////        return view('profile.user-profile',);
//        return redirect()->route('article', compact('user'));
//    }

}
