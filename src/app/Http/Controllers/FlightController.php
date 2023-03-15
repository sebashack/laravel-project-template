<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class FlightController extends Controller
{
    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = 'Register flight';

        return view('flight.create')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        //Flight::validate($request);
        Flight::create([
            'type' => $request->type,
            'price' => $request->price,
        ]);

        return back()->with('status', 'Successfully created');
    }
}
