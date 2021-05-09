<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationRequest;
use App\Models\Client;
use App\Models\Equipment;
use App\Models\LocationFrom;
use App\Models\Reservation;
use App\Models\Vehicle;

class ReservationController extends Controller
{
    public function index(ReservationRequest $request)
    {
        return view('reservations.index', ['reservations' => Reservation::all()]);
    }

    public function create()
    {
        $data = [
            'clients' => Client::all(),
            'vehicles' => Vehicle::all(),
            'locations' => LocationFrom::all(),
            'equipments' => Equipment::all(),
        ];

        return view('reservations.create', $data);
    }

    public function store(ReservationRequest $request)
    {
        $price_per_day = Vehicle::query()->findOrFail($request->vehicle)->price_per_day;
        $date_from = date_create($request->date_from);
        $date_to = date_create($request->date_to);
        $days = date_diff($date_from, $date_to)->days;

        $data = [
            'client_id' => $request->client,
            'vehicle_id' => $request->vehicle,
            'date_from' => $request->date_from,
            'date_to' => $request->date_to,
            'location_from' => $request->location_from,
            'location_to' => $request->location_to,
            'equipment_id' => $request->equipment,
            'price' => $price_per_day * $days,
        ];
        Reservation::query()->create($data);

        return redirect('/reservations');
    }

    public function show(Reservation $reservation)
    {
        $data = [
            'reservation' => $reservation,
            'client' => $reservation->client,
            'vehicle' => $reservation->vehicle,
            'location_from' => $reservation->locationFrom->name,
            'location_to' => $reservation->locationTo->name,
            'equipment' => $reservation->equipment->name,
        ];

        return view('reservations.details', $data);
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect('/reservations');
    }
}
