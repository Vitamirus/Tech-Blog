<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
   public function getProfile($id){

       $user = User::where('id', $id)->first();

       if (!$user) {
           abort(404);
       }

       return view('profile.user-profile', compact('user'));
   }
}
