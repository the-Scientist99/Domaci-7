@extends('layouts.main')

@section('page_title', 'Detalji rezervacije')

@section('content')
    
    <div class="container mt-5">
        <h1 class="text-center mb-5"> DETALJI O REZERVACIJI </h1>
        <div class="row">
            <div class="col-4">
                <h3 class="text-center">Klijent</h3>
                <table class="table">
                    <tr>
                        <th> Ime: </th>
                        <td> {{ $client->first_name }} </td>
                    </tr>
                    <tr>
                        <th> Prezime: </th>
                        <td> {{ $client->last_name }} </td>
                    </tr>
                    <tr>
                        <th> Država: </th>
                        <td> {{ $client->country->name }} </td>
                    </tr>
                    <tr>
                        <th> Broj ID dokumenta: </th>
                        <td> {{ $client->id_document }} </td>
                    </tr>
                    <tr>
                        <th> Napomena </th>
                        <td> {{ $client->note }} </td>
                    </tr>
                </table>
            </div>
            <div class="col-4">
                <h3 class="text-center">Vozilo</h3>
                <table class="table">
                    <tr>
                        <th> Naziv vozila: </th>
                        <td> {{ $vehicle->name }} </td>
                    </tr>
                    <tr>
                        <th> Klasa vozila: </td>
                        <td> {{ $vehicle->class->name }} </td>
                    </tr>
                    <tr>
                        <th> Broj sjedišta: </th>
                        <td> {{ $vehicle->num_of_seats }} </td>
                    </tr>
                    <tr>
                        <th> Cijena cijena po danu: </th>
                        <td> {{ $vehicle->price_per_day }} </td>
                    </tr>
                    <tr>
                        <th> Napomena: </th>
                        <td> {{ $vehicle->note }} </td>
                    </tr>
                </table>
            </div>
            <div class="col-4">
                <h3 class="text-center">Rezervacija</h3>
                <table class="table">
                    <tr>
                        <th> Datum od: </th>
                        <td> {{ date_format(date_create($reservation->date_from), "d. m. Y.") }} </td>
                    </tr>
                    <tr>
                        <th> Datum do: </td>
                        <td> {{ date_format(date_create($reservation->date_to), "d. m. Y.") }} </td>
                    </tr>
                    <tr>
                        <th> Lok. preuzimanja: </th>
                        <td> {{ $reservation->locationFrom->name }} </td>
                    </tr>
                    <tr>
                        <th> Lok. vraćanja: </th>
                        <td> {{ $reservation->locationTo->name }} </td>
                    </tr>
                    <tr>
                        <th> Cijena: </th>
                        <td> {{ $reservation->price }} </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

@endsection