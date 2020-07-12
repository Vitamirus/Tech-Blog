<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use function GuzzleHttp\Psr7\str;

class UserConfigController extends Controller
{
    public function __construct(){

        $this->middleware('auth');
    }

    public function index(){

        return view('profile.setting');
    }

    public function update(Request $request){
//        echo Auth::user()->id;

        $user = User::where('id', $request->input('id'))->first();

        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');

        $user->save();

        return view('profile.setting', compact('user'));
    }
}
