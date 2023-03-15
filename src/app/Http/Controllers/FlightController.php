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
        $viewData['flights'] = Flight::orderBy('price', 'asc')->get();

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

    public function showStats(): View
    {
        $flights = Flight::all();

        $numLocal = 0;
        $numInternational = 0;
        $accumLocalPrice = 0;

        foreach ($flights as $v) {
            if ($v->getType() === 'local') {
                $numLocal = $numLocal + 1;
                $accumLocalPrice = $accumLocalPrice + $v->getPrice();
            } else {
                $numInternational = $numInternational + 1;
            }
        }

        $viewData = [];
        $viewData['title'] = 'Flight Statistics';
        $viewData['num_local'] = $numLocal;
        $viewData['num_international'] = $numInternational;

        if ($numLocal > 0) {
            $viewData['average_local_price'] = $accumLocalPrice / $numLocal;
        } else {
            $viewData['average_local_price'] = 0;
        }

        return view('flight.stats')->with('viewData', $viewData);
    }
}
