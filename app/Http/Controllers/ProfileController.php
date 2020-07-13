<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
