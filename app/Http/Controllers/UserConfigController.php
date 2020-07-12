<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
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

        $request->input('firstname') ? $user->firstname = $request->input('firstname'): null;
        $request->input('lastname') ? $user->lastname = $request->input('lastname'): null;
        $request->input('nickname') ? $user->nickname = $request->input('nickname'): null;

        $user->update();

        Artisan::call('view:clear');

        return view('profile.setting');
    }
}
