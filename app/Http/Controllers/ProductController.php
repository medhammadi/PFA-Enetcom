<?php
 
namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Tax;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductSupplier;
 
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::latest()->paginate(5);
        return view('products.index',compact('product'))
                ->with('i', (request()->input('page',1) -1) * 5);

    }
 
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Categorie::all();
        $taxes = Tax::all();
        return view('products.create',compact('categories','taxes'));
    }
 
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        Product::create([
            'title' => $request->title,
            'price' => $request->price,
            'product_code' => $request->product_code,
            'description' => $request->description,
            'categorie_id' => $request->categorie_id,
            'tax_id'=> $request->tax_id,
        ]);
   //     Product::save($product);
 
        return redirect()->route('products')->with('success', 'Product added successfully');
    }
 
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
 
        return view('products.show', compact('product'));
    }
 
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $productId = $id; // The specific product ID you want to retrieve associated ProductSupplier record for
        $additional = ProductSupplier::where('product_id', $productId)->first();
        $product = Product::findOrFail($id);
        $categories=Categorie::all();
        $taxes = Tax::all();
 
        return view('products.edit', compact('product','additional','categories','taxes'));
    }
 
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);
 
        $product->update($request->all());
 
        return redirect()->route('products')->with('success', 'product updated successfully');
    }
 
    /**
       * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
 
        $product->delete();
 
        return redirect()->route('products')->with('success', 'product deleted successfully');
    }
}