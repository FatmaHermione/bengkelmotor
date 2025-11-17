<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OliController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');

        $olis = Oli::when($search, function ($query, $search) {
            return $query->where('nama', 'like', "%$search%");
        })->get();

        return view('oli', compact('olis', 'search'));
    }
}