<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

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

    public function addProduct(){
        return view('dashboard.addProduct');
    }

    public function updateItem(Request $request){
        $item = product::find($request->product);
        return view('dashboard.updateProduct',[
            'item' => $item,
            'test' => $request->product
        ]);
    }

    public function login()
    {
        return view('dashboard.login');
    }
}
