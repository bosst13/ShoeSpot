<?php

namespace App\Http\Controllers\customer;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class customerprof extends Controller
{
    public function customerprof()
    {
        $customer = Customer::where('user_id', auth()->user()->id)->first();
       return view('customer.cusmanage', compact('customer'));
    }

    public function update(Customer $customer, Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string',
            'phone_number' => 'required|string',
            'email' => 'required|email',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = auth()->user();
        $customer = $user->customer;

        // If customer doesn't exist, create a new one
        // if (!$customer) {
        //     $customer = new Customer();
        //     $customer->user_id = $user->id;
        // }

        // Update user's name and email
        $user->name = $request->input('customer_name');
        $user->email = $request->input('email');

        // Update customer details
        $customer->customer_name = $request->input('customer_name');
        $customer->email = $request->input('email');
        $customer->phone_number = $request->input('phone_number');

        // Update profile picture if provided
        if ($request->hasFile('profile_picture')) {
            $image = $request->file('profile_picture');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->storeAs('public/profile_pictures', $imageName);
            $customer->profile_picture = $imageName;
        }

        // Save changes to both the user and customer records
        $user->save();
        $customer->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
