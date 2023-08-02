<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    

    public function index()
    {
        return Product::all();
    }

    /**
     * Store a newly created resource in storage.
     * @param \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
           // 'product_image'=>'mimes:png,jpg,jpeg',
        ]);
        
        return Product::create($request->all());
    }

    /**
     * Display the specified resource.
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        return Product::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product=Product::find($id);
        $product->update($request->all());
        return $product;
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        return Product::destroy($id);
    }


    /**
     * Search a name
     * 
     * @param str $name
     * @return \Illuminate\Http\Response
     */
    public function search($title)
    {
        return Product::where('title','like','%'.$title.'%')->get();
    }
}
