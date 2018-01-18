<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Product;

class ViewRouterController extends Controller
{
    /**
     * GO TO MAIN VIEW
     */
    public function allProducts() {
        $products = Product::all();
        return view('home', ['products' => $products]);
    }
    /**
     * GO TO EDIT PRODUCT VIEW
     */
    public function update($id){
        $product = Product::find($id);
        $tags = Tag::all();
        return view('update-product', ['product' => $product, 'tags' => $tags]);
    }
    /**
     * GO TO CREATE NEW PRODUCT VIEW
     */
    public function create(){
        $tags = Tag::mostUsed(Tag::all());
        return view('create-product', ['tags'=>$tags]);
    }
    /**
     * GO TO READ PRODUCT CONTENT VIEW
     */
    public function getProduct($id) {
        $product = Product::find($id);
        return view('view-product', ['product'=>$product]);
    }
}
