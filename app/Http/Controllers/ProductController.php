<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage; 

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['Products']=Product::paginate(2);

        return view ('Products.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('Products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$productdata = request()->all();
        $productdata = request()->except('_token');
        
        if($request->hasFile('Picture')){
            $productdata['Picture']=$request->file('Picture')->store('uploads','public');
        }


        Product::insert($productdata);
        //return response()->json($productdata);
        return redirect('Products')->with('mensaje','¡Producto agregado con exito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=Product::findOrFail($id);
        
        return view('Products.edit', compact('product'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $productdata = request()->except(['_token','_method']);

        if($request->hasFile('Picture')){
            $product=Product::findOrFail($id);

            Storage::delete('public/'.$product->Picture);

            $productdata['Picture']=$request->file('Picture')->store('uploads','public');
        }


        Product::where('id','=',$id)->update($productdata);

        $product=Product::findOrFail($id);
        return redirect('Products')->with('mensaje', 'Producto editado con exito.');
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::findOrFail($id);

        if(Storage::delete('public/'.$product->Picture)){
            Product::destroy($id);
        }
        //return redirect ('Products');

        return redirect('Products')->with('mensaje', 'Producto eliminado de su catalogo.');
    }
}
