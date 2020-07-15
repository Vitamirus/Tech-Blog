<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Validator;
use function GuzzleHttp\Psr7\str;

class UserConfigController extends Controller
{
    public function __construct(){

        $this->middleware('auth');
    }

    public function index(){

        return view('profile.setting');
    }

    protected function store(Request $request)
    {
        $validatedData = $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'nickname' => ['required', 'string', 'email', 'max:255', 'unique:username'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        \App\User::create($validatedData);

        return response()->json('Form is successfully validated and data has been saved');
    }

    public function update(Request $request){
//        echo Auth::user()->id;

        $user = User::where('id', $request->input('id'))->first();

        $request->input('firstname') ? $user->firstname = $request->input('firstname'): null;
        $request->input('lastname') ? $user->lastname = $request->input('lastname'): null;
        $request->input('nickname') ? $user->nickname = mb_strtolower($request->input('nickname')): null;
        $request->input('date') ? $user->date = $request->input('date'): null;
        $request->input('status') ? $user->status = $request->input('status'): null;

        $user->update();

        Artisan::call('view:clear');

        return redirect()->route('home');
    }
}
