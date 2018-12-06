<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use Session;

class ProductController extends Controller
{
    public function getIndex()
    {
        $products = Product::all();
        return view('shop.index', ['products' => $products]);
    }

    public function index(){
        //fetch all products data
        $products = Product::orderBy('id')->get();

        //pass products data to view and load list view
        return view('products.index', ['products' => $products]);
    }

    public function add(){
        //load form view
        return view('products.add');
    }

    public function insert(Request $request){
        //validate product data
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);

        //get product data
        $productData = $request->all();

        //insert product data
        Product::create($productData);

        //store status message
        Session::flash('success_msg', 'Product added successfully!');

        return redirect()->route('products.index');
    }

    public function edit($id){
        //get product data by id
        $product = Product::find($id);

        //load form view
        return view('products.edit', ['product' => $product]);
    }

    public function update($id, Request $request){
        //validate product data
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);

        //get product data
        $productData = $request->all();

        //update product data
        Product::find($id)->update($productData);

        //store status message
        Session::flash('success_msg', 'Product updated successfully!');

        return redirect()->route('products.index');
    }

    public function delete($id){
        //update product data
        Product::find($id)->delete();

        //store status message
        Session::flash('success_msg', 'Product deleted successfully!');

        return redirect()->route('products.index');
    }

    public function show($id)
    {
        $product = Product::where('id', $id)->firstOrFail();
        $interested = Product::where('id', '!=', $id)->get()->random(4);
        return view('products.viewprod')->with(['product' => $product, 'interested' => $interested]);
    }

}
