<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use App\Article;

class ProfileController extends Controller
{
    public function __construct(){

        $this->middleware('auth');
    }



    public function getProfile($nickname){

       $user = User::where('nickname', $nickname)->first();
//       $user = Article::where('article_id', $nickname)->first();
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
    public function avatar(Request $request){

        $user = User::where('nickname', Auth::user()->nickname)->first();


        $avatar = $request->file('avatar');
        $avatar->move('storage/images/', time().'_'.$avatar->getClientOriginalName());
        $user->avatar = 'storage/images/'.time().'_'.$avatar->getClientOriginalName();

        $user->update();

        return redirect()->route('home');
    }
}
