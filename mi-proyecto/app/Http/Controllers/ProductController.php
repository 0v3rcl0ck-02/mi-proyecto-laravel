<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $productId = $request->input('product_id');
        if ($productId=="1") {
            $products = Product::all();
        } elseif ($productId=="2") {
            $products = Product::where('price', '>', 100)->get();
        } elseif ($productId=="3") {
            $products = Product::where('price', '<', 500)->get();
        } elseif ($productId=="4") {
            $products = Product::where('price', '=', 7)->get();
        } elseif ($productId=="5") {
            $products = Product::where('name', 'like', 'm%')->get();
        }
        elseif ($productId=="6") {
            $products = Product::where('name', 'like', '%o')->get();
        }
        elseif ($productId=="7") {
            $products = Product::where('name', 'like', '%ar%')->get();
        }
         else {
            $products = Product::all();
        }
        //echo "Product ID: " . $productId; // Debugging line to check the value of product_id
        return view('products', compact('products'));
    }

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
    $datos = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);
        Product::create($datos);
        return redirect()->back()
        ->with('success', 'Producto creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
        return view('product-detail', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products', ['product' => $product, 
        'products' => Product::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $datos = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);
        $product->update($datos);
        return redirect()->route('products.index')
        ->with('success', 'Producto actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
     $product->delete();
     return redirect()->route('products.index')
     ->with('success', 'Producto eliminado exitosamente.');
    }
}
