<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FlightController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Flights';
        $viewData['flights'] = Flight::all();

        return view('flight.index')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = 'Register flight';

        return view('flight.create')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        Flight::validate($request);
        Flight::create([
            'name' => $request->name,
            'type' => $request->type,
            'price' => $request->price,
        ]);

        return back()->with('status', 'Successfully created');
    }
}
