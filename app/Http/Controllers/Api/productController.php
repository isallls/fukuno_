<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\product;
use Illuminate\Http\Request;

use function Pest\Laravel\json;

class productController extends Controller
{
    //
    public function buyProduct(Request $request)
    {
        $quantity = $request->quantity;
        $product = $request->product;
        $product = product::find($product);
        if ($product == null) {
            return response()->json([
                'status' => false,
                'message' => 'product not found',
            ]);
        }
        if (intval($quantity) > intval($product->stock) || intval($product->stock) == 0) {

            return response()->json([
                'status' => false,
                'message' => 'stock tidak cukup',
                'stock' => $product->stock,
            ]);
        }

        $product->stock -= $quantity;
        $product->save();
        return response()->json([
            'status' => true,
            'product' => product::find($request->product),
            'qtt' => $quantity,
        ]);
    }
    public function products(){
        $a = product::all();
        return response()->json([
            'data'=> $a
        ]);
    }
}
