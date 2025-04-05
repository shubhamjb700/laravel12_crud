<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(Request $request) {
        //$products = Product::get();
        $products = Product::orderBy('id', 'DESC')->Paginate(5);
        return view('products.index', compact('products'));
    }

    public function search(Request $request) {
        if(!empty($request)) {
            $search = $request->input('search');       

            $products = Product::where(
                'name',
                'like',
                "$search%"            
            )
                ->orWhere('details', 'like', "$search%")
                ->paginate(5);
            return view('products.index', compact('products'));
        }    
        
        $products = DB::table('products')
            ->orderBy('id', 'DESC')
            -paginate(5);
        return view('products.index', compact('products'));
    }

    public function create(Request $request) {
        return view('products.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'details' => 'required',
        ]);

        Product::create([
            'name' => $request->name,
            'details' => $request->details
        ]);
        
        return redirect()->route('products.index')
            ->with('success', 'Product Created Successfully.');
    }

    public function show(Product $product) {
        return view('products.show', compact('product'));        
    }

    public function edit(Product $product) {
        return view('products.edit', compact('product'));        
    }

    public function update(Request $request, Product $product) {
        $request->validate([
            'name' => 'required',
            'details' => 'required',
        ]);

        $product->update([
            'name' => $request->name,
            'details' => $request->details
        ]);
        
        return redirect()->route('products.index')
            ->with('success', 'Product Updated Successfully.');
    }

    public function destroy(Request $request, Product $product) {
        $product->delete();
        return redirect()->route('products.index')
            ->with('success', 'Product Deleted Successfully.');
    }
}
