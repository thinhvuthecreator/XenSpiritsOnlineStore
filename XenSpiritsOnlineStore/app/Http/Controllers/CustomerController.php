<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function ShowCustomer()
    {
        $customers = customer::all();
        return view('forAdmin.customer.admin_customer',compact('customers'));
    }
}
