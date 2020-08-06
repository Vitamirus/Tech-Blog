<?php

namespace App\Http\Controllers;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SearchModel;
use App\User;


class SearchController extends Controller
{
    public function getResults(Request $request)
    {
        $query = $request->input('query');

        if (!$query) {
            return redirect()->route('home');
        }
        $users = User::where(DB::raw("CONCAT (firstname, ' ', lastname)"),
        'LIKE', "%{$query}%")
            ->orWhere('nickname', 'LIKE', "%{$query}%")
            ->get();

    return view('results')->with('users', $users);
    }
}

