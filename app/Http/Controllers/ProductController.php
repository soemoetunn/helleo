<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(3);
        return view('product.index',compact('products'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        //Validation
        $request->validate([
            'product_title'=>'required',
            'product_name'=>'required',
            'product_code'=>'required',
            'product_price'=>'required',
            'product_description'=>'required|min:5',
            'product_image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //file Upload
        if($request->hasFile('product_image')){
            $product_image=$request->file('product_image');
            $extname=time().'.'.$product_image->getClientOriginalExtension();
            $product_image->move(public_path().'/images/'.$extname);
            $product_image='/images/'.$extname;
        }else{
            $product_image='';
        }

        //Data Insert
        $products=new Product();
        $products->product_title=request('product_title');
        $products->product_name=request('product_name');
        $products->product_code=request('product_code');
        $products->product_price=request('product_price');
        $products->product_description=request('product_description');
        $products->product_image=$product_image;

        $products->save();

        //Redirect
        return redirect('/products');
    }

    public function show($id)
    {
        $Product = Product::find($id);
        return view('product.show',compact('Product'));
    }

    public function edit($id)
    {
        $products = Product::find($id);

        return view('product.edit', compact('products'));
    }

    public function update(Request $request, $id)
    {
         //Validation
         $request->validate([
            'product_title'=>'required',
            'product_name'=>'required',
            'product_code'=>'required',
            'product_price'=>'required',
            'product_description'=>'required|min:5',
            'product_image'=>'sometimes|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //file Upload
        if($request->hasFile('product_image')){
            $product_image=$request->file('product_image');
            $extname=time().'.'.$product_image->getClientOriginalExtension();
            $product_image->move(public_path().'/images/'.$extname);
            $product_image='/images/'.$extname;
        }else{
            $product_image=request('old_image');
        }

        //Data Update
        $products=Product::find($id);
        $products->product_title=request('product_title');
        $products->product_name=request('product_name');
        $products->product_code=request('product_code');
        $products->product_price=request('product_price');
        $products->product_description=request('product_description');
        $products->product_image=$product_image;

        $products->save();

        //Redirect
        return redirect('/products');
    }

    public function destroy($id)
    {
        $product=Product::find($id);
        $product->delete();

        return redirect('/products')->with('success', 'Congrats Product Deleted Successfully!');
    }
}
