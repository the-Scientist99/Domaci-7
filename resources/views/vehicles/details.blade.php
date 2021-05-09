@extends('layouts.main')

@section('page_title', 'Vehicles details')

@section('content')
    
    <div class="container mt-5">
        <h1 class="text-center mb-5"> DETALJI O VOZILU </h1>
        <div class="row">
            <div class="col-6">
                <img src="{{ $vehicle->vehicle_photo }}" class="w-100" alt="FOTOGRAFIJA VOZILA">
            </div>
            <div class="col-6">
                <table class="table">
                    <tr>
                        <th> Naziv: </th>
                        <td> {{ $vehicle->name }} </td>
                    </tr>
                    <tr>
                        <th> Registarski broj: </th>
                        <td> {{ $vehicle->reg_number }} </td>
                    </tr>
                    <tr>
                        <th> Datum proizvodnje: </th>
                        <td> {{ $vehicle->date_of_prod }} </td>
                    </tr>
                    <tr>
                        <th> Klasa vozila: </th>
                        <td> {{ ucfirst($class) }} </td>
                    </tr>
                    <tr>
                        <th> Broj sjedišta: </th>
                        <td> {{ $vehicle->num_of_seats }} </td>
                    </tr>
                    <tr>
                        <th> Cijena po danu: </th>
                        <td> {{ $vehicle->price_per_day }} </td>
                    </tr>
                    <tr>
                        <th> Napomena: </th>
                        <td> {{ $vehicle->note }} </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

@endsection