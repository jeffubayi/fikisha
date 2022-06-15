<?php

namespace App\Http\Controllers;

use App\Models\Order;
Use Auth;
use Illuminate\Http\Request;
use Illuminate\support\Carbon;
Use App\Models\Fleet;
Use App\Models\Customer;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $data['orders']= Order::where('user_id', Auth::User()->id)->latest()->paginate(5);
        $data['fleets'] = Fleet::where('user_id', Auth::User()->id)->latest()->paginate(10);
        $data['customers'] = Customer::where('user_id', Auth::User()->id)->latest()->paginate(10);
        $data['customerCount'] =  Customer::where('user_id', Auth::User()->id)->count();
        $data['orderCount'] =  Order::where('user_id', Auth::User()->id)->count();
        $data['fleetCount'] =  Fleet::where('user_id', Auth::User()->id)->count();
        $data['pendingCount'] =  Order::where('order_status' , 'pending')->count();
        $data['loadingCount'] =  Order::where('order_status' , 'loading')->count();
        $data['dispatchedCount'] =  Order::where('order_status' , 'dispatched')->count();
        $data['deliveredCount'] = Order::where('order_status' , 'delivered')->count();
        $data['availableFleetCount'] =  Fleet::where('fleet_status' , 'available')->count();

        return view('pages.dashboard', $data);
    }

  

    

    public function summary()
    {
        $fleets = Fleet::where('user_id', Auth::User()->id)->get()->toArray();
        $customers = Customer::where('user_id', Auth::User()->id)->get()->toArray();
        foreach ($fleets as $key => $value) {
            $fleets[$key]['type'] = 'income';
        }

        foreach ($customers as $key => $value) {
            $customers[$key]['type'] = 'customer';
        }

        $data['results'] = array_merge($fleets, $customers);

        return view('pages.summary', $data);
    }
}
