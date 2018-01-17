<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Tag;

class ProductController extends Controller
{
    public function allProducts() {
        $products = Product::all();
        // $productArray = array();
        // foreach($products as $product){
        //     $product->image = str_replace('\\','afasdf ', $product->image);
        // }
        return view('home', ['products' => $products]);
    }
    
    public function add(Request $request) {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
        ]);
        $request->validate(['product_image'=> 'image|mimes:jpeg,png,gif|max:5000']);
        
        $product  = new Product;
        $product->title = $request->input('title');
        $product->description = $request->input('description');
        $product->image = $request->file('product_image')->store('public');
        $product->stock = $request->input('stock');
        
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
            'description'=>'required'
        ]);
        $data = array(
            'title' => $request->input('title'),
            'description'=> $request->input('description'),
            'product_image' => $request->file('product_image')->store('public'),
            'stock' => $request->input('stock'),
        );
        $product = Product::where('id', $id);//->update($data);
        /*$product->title = $request->input('title');
        $product->description = $request->input('description');
        $product->image = $request->file('product_image')->store('public');
        $product->stock = $request->input('stock');
        $product->tags()->attach($request->input('product_tags'));*/
        $product.detach();
        $product.update($data);
        $product.tags().attach($request->input('product_tags'));
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
