<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BladeController extends Controller
{
    public function show()
    {
        return view('layouts.frontend');
    }
}
