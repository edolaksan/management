<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Label;

class HomeController extends Controller
{
    public function index()
    {
        $labels = Label::all();
        return view('home', compact('labels'));
    }
}
