<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ProductController extends Controller
{
    public function product()
    {
         // Fetch products from the database
         $products = Product::all();
         return view('admin.product', compact('products'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_name' => 'required',
            'category' => 'required',
            'description' => 'required',
            'sell_price' => 'required|numeric',
            'cost_price' => 'required|numeric',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $product = new Product;
        $product->product_name = $request->product_name;
        $product->category = $request->category;
        $product->description = $request->description;
        $product->sell_price = $request->sell_price;
        $product->cost_price = $request->cost_price;

        // Set the default image path or null if no image is provided
        if ($request->hasFile('images')) {
            $file = $request->file('images')[0];
            $ext = $file->getClientOriginalExtension();
            $filename = time() .'.'. $ext;

            $file->move('uploads/image',$filename);
            $product->Image = $filename;
        }

        $product->save();

        return redirect()->back()->with('success', 'Product added successfully.');
    }


}
