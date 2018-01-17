<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function allProducts() {
        $products = Product::all();
        return view('home', ['products' => $products]);
    }
    public function add(Request $request) {
        $this->validate($request,[
            'title'=>'required',
            'description'=>'required'
        ]);
        $product  = new Product;
        $product->title = $request->input('title');
        $product->description = $request->input('description');
        $product->image = public_path('uploaded_images').'/'.$request->file('product_image');
        $product->stock = 3;
        print_r('<pre>');
        print_r($request);
        print_r('<pre>');
        //$product->save();
       // return redirect('/products')->with('info','Product saved successfully!');
        
    }
    public function update($id){
        $product = Product::find($id);
        return view('update-product', ['product' => $product]);
    }
    public function edit($id, Request $request) {
        $this->validate($request,[
            'title'=>'required',
            'description'=>'required'
        ]);
        $data = array(
            'title' => $request->input('title'),
            'description'=> $request->input('description')
        );
        Product::where('id', $id)->update($data);
        return redirect('/products')->with('info', 'Product updated!');
    }
    public function getProduct($id) {
        $product = Product::find($id);
        return view('view-product', ['product'=>$product]);
    }
    public function delete($id){
        Product::where('id', $id)->delete();
        return redirect('/products')->with('info', 'Product Deleted Successfully');
    }
}
