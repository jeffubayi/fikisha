<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Fleet;
use App\Models\Order;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Notifications\StatusUpdate;
use Illuminate\Support\Facades\Mail;


class OrderController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {   
        $data['orders'] = Order::where('user_id', Auth::User()->id)->latest()->paginate(12);
        $data['fleets'] = Fleet::where('user_id', Auth::User()->id)->latest()->paginate(10);
        $data['customers'] = Customer::where('user_id', Auth::User()->id)->latest()->paginate(10);
        // dd($data);
        // Log::info($data);
        return view('pages.orders.index', $data);
    }

    public function create()
    {

        $data['customers'] = Customer::where('user_id', Auth::User()->id)->latest()->paginate(10);
        $data['fleets'] = Fleet::where('user_id', Auth::User()->id)->latest()->paginate(10);
        return view('pages.orders.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_customer' => 'required',
            'order_fleet' => 'required',
            'order_status' => 'required',
            'order_date'=> 'required'
        ]);

        $orders = new Order();
        $orders->order_customer = $request->order_customer;
        $orders->order_fleet = $request->order_fleet;
        $orders->order_status = $request->order_status;
        $orders->order_date = $request->order_date;
        $orders->user_id = Auth::user()->id;
        $orders->save();

        return redirect('/orders')->with('message', 'New Order Added');
    }

    public function edit($id)
    {   
        $data['customers'] = Customer::where('user_id', Auth::User()->id)->latest()->paginate(10);
        $data['fleets'] = Fleet::where('user_id', Auth::User()->id)->latest()->paginate(10);
        $data['order'] = Order::findOrFail($id);
        return view('pages.orders.edit', $data);
    }

    public function update(Request $request)
    {
        $request->validate([
            'order_customer' => 'required',
            'order_fleet' => 'required',
            'order_status' => 'required',
            'order_date'=> 'required'
        ]);

        $order = Order::findOrFail($request->order_id);
        $order->order_customer = $request->order_customer;
        $order->order_fleet = $request->order_fleet;
        $order->order_status = $request->order_status;
        $order->order_date = $request->order_date;
        $order->update();

        if ($order->wasChanged('order_status') && $order->order_status === 'dispatched') {
           Mail::send('emails.dispatchedOrder',$order->toArray(),function($message) use ($order){
                $message->to($order->order_customer->customer_email)->subject('Order Dispatched');
            });
        }

        return redirect('/orders')->with('message', 'Order  updated successfully');
    }

    public function destroy($id)
    {
        Order::findOrFail($id)->delete();
        return back()->with('message', 'Order  deleted successfully');
    }
}
