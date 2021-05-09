<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehicleRequest;
use App\Models\Vehicle;
use App\Models\VehicleClass;

class VehicleController extends Controller
{
    public function index(VehicleRequest $request)
    {
        $vehicles = Vehicle::query()->paginate(Vehicle::PER_PAGE);
        return view('vehicles.index', ['vehicles' => $vehicles]);
    }

    public function create()
    {
        return view('vehicles.create', ['v_classes' => VehicleClass::all()]);
    }

    public function store(VehicleRequest $request)
    {
        if ($request->hasFile('vehicle_photo')) {
            $extension = $request->file('vehicle_photo')->getClientOriginalExtension();
            $allowed_ext = ['png', 'jpg', 'jpeg', 'gif'];
            if (in_array($extension, $allowed_ext))
                $photo_path = '/storage/' . $request->file('vehicle_photo')->store('vehicle_photos', 'public');
            else
                return redirect('/vehicles?msg=err');
        } else {
            $photo_path = '';
        }

        $data = [
            'name' => $request->name,
            'reg_number' => $request->reg_number,
            'date_of_prod' => $request->date_of_prod,
            'class_id' => $request->veh_class,
            'num_of_seats' => $request->num_of_seats,
            'price_per_day' => $request->price_per_day,
            'vehicle_photo' => $photo_path,
            'note' => $request->note,
        ];
        Vehicle::query()->create($data);

        return redirect('/vehicles?msg=succ');
    }

    public function show(Vehicle $vehicle)
    {
        return view('vehicles.details', ['vehicle' => $vehicle, 'class' => $vehicle->class->name]);
    }

    public function edit(Vehicle $vehicle)
    {
        return view('vehicles.edit', ['vehicle' => $vehicle, 'classes' => VehicleClass::all()]);
    }

    public function update(VehicleRequest $request, Vehicle $vehicle)
    {
        if ($request->hasFile('vehicle_photo')) {
            unlink('../public' . $vehicle->vehicle_photo);
            $photo_path = '/storage/' . $request->file('vehicle_photo')->store('vehicle_photos', 'public');
        } else {
            $photo_path = "";
        }

        $data = [
            'name' => $request->name,
            'reg_number' => $request->reg_number,
            'class_id' => $request->class,
            'num_of_seats' => $request->num_of_seats,
            'price_per_day' => $request->price_per_day,
            'vehicle_photo' => $photo_path,
            'note' => $request->note,
        ];
        $vehicle->update($data);

        return redirect('/vehicles');
    }

    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();

        return redirect('/vehicles');
    }
}
