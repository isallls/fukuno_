<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Cache\Events\RetrievingKey;
use Illuminate\Http\Request;

class procutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     return view('test');
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'product' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        
        // Upload image 
        $image = $request->file('image');
        $image->storeAs('public/product/image', $image->hashName());
        
        // Data untuk dimasukkan ke database
        $data = [
            'name' => $request->product,  // Perbaiki penulisan request
            'description' => $request->description,
            'image' => $image->hashName(),
            'stock' => $request->stock,
            'price' => $request->price,
        ];
        
        // Masukkan data ke database
        Product::create($data);
        
        return redirect('/dashboard')->with('message', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */ 
    public function destroy(string $id)
    {
        //
    }
}
