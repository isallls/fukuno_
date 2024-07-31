<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    //
    public function cart()
    {
    }

    public function user()
    {
        $user = Auth::user();
        return response()->json(
            [
                'user' => $user,
            ],
            200,
        );
    }
}
