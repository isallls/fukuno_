<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use function Pest\version;

class dashboardController extends Controller
{
    //
    public function index()
    {
        return view('dashboard.index');
    }

    public function login()
    {
        return view('dashboard.login');
    }
}
