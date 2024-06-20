<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Customer;
use App\Models\Orderinfo;
use App\Models\Orderline;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Product $product)
    {
        $user = auth()->user();
        $customer = Customer::where('user_id', $user->id)->first();
        // dd($customer);
        return view('orders.create', compact('product', 'user', 'customer'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $orderinfo = new Orderinfo();
        $orderinfo->customer_id = $request->customer_id;
        $orderinfo->date_placed = $request->date_placed;
        $orderinfo->shipping_fee = 50.00;
        $orderinfo->status = "Processing";
        $orderinfo->save();

        $orderline = new Orderline();
        $orderline->orderinfo_id = $orderinfo->orderinfo_id;
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
