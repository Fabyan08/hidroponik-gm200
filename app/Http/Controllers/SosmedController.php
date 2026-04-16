<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SosmedController extends Controller
{
    public function index()
    {
        return view('dashboard.manajemen-medsos.index');
    }
}
