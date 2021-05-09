@extends('layouts.main')

@section('page_title', 'Spisak rezervacija')

@section('content')
    
    <div class="container">
        <h1 class="text-center mt-3"> SPISAK REZERVACIJA </h1>
        <div class="col-2 offset-5">
            <a href="/reservations/create" class="btn btn-success w-100"> <i class="fas fa-user-plus"></i> <a>
        </div>
        <table class="table table-hover text-center mt-3">
            <thead>
                <tr>
                    <th>Klijent</th>
                    <th>Vozilo</th>
                    <th>Cijena rezervacije</th>
                    <th>Datum od</th>
                    <th>Datum do</th>
                    <th>Lok. preuzimanja</th>  
                    <th>Detalji</th>
                    <th>Izbriši</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservations as $reservation)
                    <tr>
                        <td> {{ $reservation->client->first_name }} {{ $reservation->client->last_name }} </td>
                        <td> {{ $reservation->vehicle->name }} </td>
                        <td> {{ $reservation->price }} </td>
                        <td> {{ date_format(date_create($reservation->date_from), "d. m. Y.") }} </td>
                        <td> {{ date_format(date_create($reservation->date_to), "d. m. Y.") }} </td>
                        <td> {{ $reservation->locationFrom->name }} </td>
                        <td> <a href="/reservations/{{$reservation->id}}" class="btn btn-info">DETALJI</a> </td>
                        <td>
                            <form action="reservations/{{$reservation->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">
                                    <i class="far fa-trash-alt text-center"></i>
                                </button> 
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- <div> {{ $reservations->links() }} </div> --}}
    </div>

@endsection