<?php

namespace App\Http\Controllers;

use App\Models\Fleet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FleetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data['fleets'] = Fleet::where('user_id', Auth::user()->id)->latest()->paginate(12);

        return view('pages.fleets.index', $data);
    }

    public function create()
    {
        return view('pages.fleets.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fleet_name' => 'required',
            'fleet_plate' => 'required',
            'fleet_status'=> 'required'
        ]);

        $fleets = new Fleet();
        $fleets->fleet_name = $request->fleet_name;
        $fleets->fleet_plate = $request->fleet_plate;
        $fleets->fleet_status = $request->fleet_status;
        $fleets->user_id = Auth::user()->id;
        $fleets->save();

        return redirect('/fleets')->with('message', 'New Fleet Added');
    }

    public function edit($id)
    {
        $data['fleet'] = Fleet::findOrFail($id);
        return view('pages.fleets.edit', $data);
    }

    public function update(Request $request)
    {
        $request->validate([
            'fleet_name' => 'required',
            'fleet_plate' => 'required',
            'fleet_status'=> 'required'
        ]);

        $fleet = Fleet::findOrFail($request->fleet_id);
        $fleet->fleet_name = $request->fleet_name;
        $fleet->fleet_plate = $request->fleet_plate;
        $fleet->fleet_status = $request->fleet_status;
        $fleet->update();

        return redirect('/fleets')->with('message', 'Fleet details updated successfully');
    }

    public function destroy($id)
    {
        fleet::findOrFail($id)->delete();
        return back()->with('message', 'Fleet details deleted successfully');
    }
}
