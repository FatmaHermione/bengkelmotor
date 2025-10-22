<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GearController extends Controller
{
    public function index()
    {
        return view('gear.index'); // arahkan ke resources/views/oli/index.blade.php
    }
}
