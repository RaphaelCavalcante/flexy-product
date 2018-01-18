<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Tag;

class ProductController extends Controller
{
    public function allProducts() {
        $products = Product::all();
        return view('home', ['products' => $products]);
    }
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
    public function add(Request $request) {
        $product = $this->setProductData(new Product, $request);
        $product->save();
        $product->tags()->attach($request->input('product_tags'));
       return redirect('/')->with('info','Product saved successfully!');
        
    }
    public function update($id){
        $product = Product::find($id);
        $tags = Tag::all();
        return view('update-product', ['product' => $product, 'tags' => $tags]);
    }
    public function create(){
        $tags = Tag::mostUsed(Tag::all());
        return view('create-product', ['tags'=>$tags]);
    }
    public function edit($id, Request $request) {
        $this->validate($request,[
            'title'=>'required',
            'description'=>'required',
            'product_image'=>'required'
        ]);
        $request->validate(['product_image'=> 'image|mimes:jpeg,png,gif|max:5000']);
        $product = $this->setProductData(Product::find($id), $request);
        $product->tags()->sync($request->input('product_tags'));
        $product->save();
        return redirect('/')->with('info', 'Product updated!');
    }
    public function getProduct($id) {
        $product = Product::find($id);
        return view('view-product', ['product'=>$product]);
    }
    public function delete($id){
        Product::where('id', $id)->delete();
        return redirect('/')->with('info', 'Product Deleted Successfully');
    }
    
}
