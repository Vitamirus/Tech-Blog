<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TopMenuController extends Controller
{
    public function index()
    {
        $categories = Category::whereNull('drop_id')
            ->with('childrenTittle')
            ->get();
        return view('menu', compact('categories'));
    }
}
