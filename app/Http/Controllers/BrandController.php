<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::all();
         return view('admin.brands.index', compact('brands'));
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
        
        $validatedData = $request->validate([
            'name' => 'required',
            'status' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $brand = new Brand;
        $brand->name = $request->brand_name;
        $brand->status = $request->status;

        // Set the default image path or null if no image is provided
        if ($request->hasFile('images')) {
            $file = $request->file('images')[0];
            $ext = $file->getClientOriginalExtension();
            $filename = time() .'.'. $ext;

            $file->move('uploads/image',$filename);
            $brand->images = $filename;
        }

        $brand->save();

        return redirect()->back()->with('success', 'Product added successfully.');
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
