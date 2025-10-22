<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BanController extends Controller
{
    public function index()
    {
        return view('ban.index'); // arahkan ke resources/views/oli/index.blade.php
    }
}
