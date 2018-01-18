<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Tag;

class ProductController extends Controller
{
    /**
     * Auxiliary method for reduce duplicated code
     */
    private function setProductData ($product, $request) {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'product_image' => 'required'
        ]);
        $request->validate(['product_image'=> 'image|mimes:jpeg,png,gif|max:5000']);
        
        $product->title = $request->input('title');
        $product->description = $request->input('description');
        $product->image = $request->file('product_image')->store('public');
        $product->stock = $request->input('stock');

        return $product;
    }

    /**
     * Create a new Product
     */
    public function add(Request $request) {
        $product = $this->setProductData(new Product, $request);
        $product->save();
        $product->tags()->attach($request->input('product_tags'));
       return redirect('/')->with('info','Product saved successfully!');
        
    }

    /**
     * Edit Selected Product
     */

    public function edit($id, Request $request) {
        $product = $this->setProductData(Product::find($id), $request);
        $product->tags()->sync($request->input('product_tags'));
        $product->save();
        return redirect('/')->with('info', 'Product updated!');
    }
    /**
     * Delete Seleted Product
     */
    public function delete($id){
        Product::where('id', $id)->delete();
        return redirect('/')->with('info', 'Product Deleted Successfully');
    }
    
}
