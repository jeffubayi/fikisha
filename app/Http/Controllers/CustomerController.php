<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function index()
    {
        $data['customers'] = Customer::where('user_id', Auth::user()->id)->latest()->paginate(12);

        return view('pages.customers.index', $data);
    }

    public function create()
    {
        return view('pages.customers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required',
            'customer_location' => 'required',
            'customer_email'=> 'required'
        ]);

        $customer = new Customer();
        $customer->customer_name = $request->customer_name;
        $customer->customer_location = $request->customer_location;
        $customer->customer_email = $request->customer_email;
        $customer->user_id = Auth::user()->id;
        $customer->save();

        return redirect('/customer')->with('message', 'New Customer Added');
    }

    public function edit($id)
    {
        $data['customer'] = Customer::findOrFail($id);
        return view('pages.customers.edit', $data);
    }

    public function update(Request $request)
    {
        $request->validate([
            'customer_name' => 'required',
            'customer_location' => 'required',
            'customer_email'=> 'required'
        ]);

        $customer = Customer::findOrFail($request->customer_id);
        $customer->customer_name = $request->customer_name;
        $customer->customer_location = $request->customer_location;
        $customer->customer_email = $request->customer_email;
        $customer->update();

        return redirect('/customer')->with('message', 'Customer  updated successfully');
    }

    public function destroy($id)
    {
        Customer::findOrFail($id)->delete();
        return back()->with('message', 'Customer  deleted successfully');
    }
}
