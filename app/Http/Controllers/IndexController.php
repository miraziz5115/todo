<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
    	return view('todo.index');
    }

    public function todoDone()
    {
        return view('todo.done');
    }
}
