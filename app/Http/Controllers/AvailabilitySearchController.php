<?php

namespace App\Http\Controllers;

use App\Models\AvailabilitySearch;
use App\Models\Reservation;
use App\Models\Vehicle;
use App\Models\VehicleClass;
use Illuminate\Http\Request;

class AvailabilitySearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $res = Reservation::query()
            ->when($request->filter_date_from, function ($query) use ($request) {
                $date_from = $request->filter_date_from;
                $query->whereRaw('date_from BETWEEN (?) AND date_to', [$date_from]);
            })
            ->when($request->filter_date_to, function ($query) use ($request) {
                $date_to = $request->filter_date_to;
                $query->whereRaw("date_to BETWEEN date_from AND (?)", [$date_to]);
            })
            ->get();


        $data = [
            'veh_classes' => VehicleClass::all(),
            'reservations' => $res,
            'request' => $request,
        ];

        return view('availability-searches.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AvailabilitySearch  $availabilitySearch
     * @return \Illuminate\Http\Response
     */
    public function show(AvailabilitySearch $availabilitySearch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AvailabilitySearch  $availabilitySearch
     * @return \Illuminate\Http\Response
     */
    public function edit(AvailabilitySearch $availabilitySearch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AvailabilitySearch  $availabilitySearch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AvailabilitySearch $availabilitySearch)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AvailabilitySearch  $availabilitySearch
     * @return \Illuminate\Http\Response
     */
    public function destroy(AvailabilitySearch $availabilitySearch)
    {
        //
    }
}
