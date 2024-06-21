<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::all();
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

    // Create a new Brand instance
    $brand = new Brand();
    $brand->name = $validatedData['name'];

    // Handle file upload if applicable
    if ($request->hasFile('images')) {
        $files = $request->file('images');
        $brand->images = 'storage/images/' . $files->getClientOriginalName();

        // Move the uploaded file to a directory within public storage (e.g., uploads/images)
        Storage::put('public/images/' . $files->getClientOriginalName(), file_get_contents($files));
    }

    // Save the brand record
    $brand->save();

    // Return a JSON response indicating success
    return response()->json([
        'message' => 'Brand created successfully',
        'brand' => $brand,
        'status' => 200
    ]);
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return view('admin.brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
    
        // Update the supplier with validated data
        $brand->update($validatedData);
    
        // Redirect back with success message
        return redirect()->route('brands.index')->with('success', 'Supplier updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();

        return redirect()->route('brands.index')->with('success', 'Supplier deleted successfully.');
    }
}
