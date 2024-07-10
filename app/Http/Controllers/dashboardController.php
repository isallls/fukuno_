<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

use function Pest\version;

class dashboardController extends Controller
{
    //
    public function index(Request $request)
    {
        $credentials = $request->only('email', 'password');
        return view('dashboard.index', [
            'modell' => product::all(),
            'user' => auth()->user(),
            'token' => auth()->guard('api')->attempt($credentials)
        ]);
    }

    public function login()
    {
        return view('dashboard.login');
    }
}
