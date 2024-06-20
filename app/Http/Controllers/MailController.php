<?php

namespace App\Http\Controllers;

use App\Mail\Receipt;
use App\Models\Customer;
use App\Models\Orderinfo;
use App\Models\Orderline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMail()
    {
        $email = auth()->user()->email;
        $customer = Customer::where('user_id', auth()->user()->id)->first();
        $orderinfo = Orderinfo::where('customer_id', $customer->customer_id)->latest('orderinfo_id')->first();
        $orderlines = Orderline::where('orderinfo_id', $orderinfo->orderinfo_id)->get();
        // Send the email using the TransactionReceipt mailable
        Mail::to($email)->send(new Receipt($customer, $orderinfo, $orderlines));
        return view('welcome');
    }
}
