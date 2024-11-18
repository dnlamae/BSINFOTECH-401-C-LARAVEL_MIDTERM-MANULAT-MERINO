<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
        return view('product.index',compact('product'));
    }
    
    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        $product = new Product; 
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/products/', $filename);
            $product->image = $filename;
        }
        $product->save();
        return redirect()->back()->with('status','Product Image Added Successfully!');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('product.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');

        if($request->hasFile('image'))
        {
            $destination = 'uploads/products/'.$product->image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/products/', $filename);
            $product->image = $filename;
        }

        $product->update();
        return redirect()->back()->with('status','Product Image Updated Successfully!');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $destination = 'uploads/products/'.$product->image;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $product->delete();
        return redirect()->back()->with('status','Product Deleted Successfully!');
    }
}
