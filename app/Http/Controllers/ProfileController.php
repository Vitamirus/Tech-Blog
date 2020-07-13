<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
   public function getProfile($nickname){


       $user = User::where('nickname', $nickname)->first();
       $user = User::where('nickname', $nickname)->first();



       if (!$user) {
           abort(404);
       }

       return view('profile.user-profile', compact('user'));
   }
}
