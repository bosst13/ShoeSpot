<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Brand;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('brand');
        $products = $products->map(function($product){
            return[ 
                'product_id' => $product->product_id,
                'product_name' => $product->product_name,
                'brand_id' => $product->brand->brand_id,
                'brand_name' => $product->brand->brand_name,
                'description' => $product->description,
                'sell_price' => $product->sell_price,
                'cost_price' => $product->cost_price,
            ];
        });
         return response()->json($products);
    }

    public function getBrands()
    {
        $brands = Brand::all(['brand_id', 'name']);
        return response()->json($brands);
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validate incoming request data
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    ]);

    // Create a new Product instance
    $product = new Product();
    $product->name = $validatedData['product_name'];

    // Handle file upload if applicable
    // if ($request->hasFile('images')) {
    //     $files = $request->file('images');
    //     $brand->images = 'storage/images/' . $files->getClientOriginalName();

    //     // Move the uploaded file to a directory within public storage (e.g., uploads/images)
    //     Storage::put('public/images/' . $files->getClientOriginalName(), file_get_contents($files));
    // }

    //Save the brand record
    $product->save();

    // Return a JSON response indicating success
    return response()->json([
        'message' => 'Product created successfully',
        'product' => $product,
        'status' => 200
    ]);
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::all();
        return response()->json($product);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, Product $product)
    // {
    //     $validatedData = $request->validate([
    //         'name' => 'required|string|max:255',
    //         //'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    //     ]);


    //     if ($request->hasFile('images')) {
    //         $files = $request->file('images');
    //         $brand->images = 'storage/images/' . $files->getClientOriginalName();
    //         Storage::put('public/images/' . $files->getClientOriginalName(), file_get_contents($files));
    //         $validatedData['images'] = 'storage/images/' . $files->getClientOriginalName();
    //     }
    
    //     // Update the supplier with validated data
    //     $brand->update($validatedData);
    
    //     // Redirect back with success message
    //     return response()->json(["success" => "brand updated successfully.", "brand" => $brand, "status" => 200]);
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        $data = array('success' => 'deleted', 'code' => 200);
            return response()->json($data);
    }
}
