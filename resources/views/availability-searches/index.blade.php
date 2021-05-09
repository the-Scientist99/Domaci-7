@extends('layouts.main')

@section('page_title', 'Spisak Klijenata')

@section('content')
    
    <div class="container">
        <h1 class="text-center mt-3"> SPISAK KLIJENATA </h1>     
        <form action="/availability-search" method="GET">
            @csrf
            <div class="row">
                <div class="col-3">
                    <label for="veh_class">Klasa vozila</label>
                    <select name="filter_class" class="form-control" id="veh_class">
                        <option value="">- izaberi klasu -</option>
                        @foreach ($veh_classes as $veh_class)
                            <option value="{{ $veh_class->id }}" {{ $veh_class->id == $request->filter_class ? "selected" : "" }}>
                                {{ $veh_class->name }} 
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-3">
                    <label for="date_from">Datum od</label>
                    <input type="date" name="filter_date_from" class="form-control" id="date_from" value="{{ old('filter_date_from') }}">
                </div>
                <div class="col-3">
                    <label for="date_to">Datum do</label>
                    <input type="date" name="filter_date_to" class="form-control" id="date_to" value="{{ old('filter_date_to') }}">
                </div>
                <div class="col-3">
                    <button class="btn btn-primary w-100 h-100"><i class="fas fa-search mr-2"></i>SEARCH</button>
                </div>
            </div>
        </form>
        <table class="table table-hover text-center mt-3">
            <thead>
                <tr>
                    <th>Naziv vozila</th>
                    <th>Godina proizvodnje</th>
                    <th>Klasa</th>
                    <th>Broj sjedišta</th>
                    <th>Cijena po danu</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservations as $reservation)
                    <tr>
                        @if ( $reservation->vehicle->class->id == $request->filter_class)
                            <td> {{ $reservation->vehicle->name }} </td>
                            <td> {{ $reservation->vehicle->date_of_prod }} </td>
                            <td> {{ $reservation->vehicle->class->name }} </td>
                            <td> {{ $reservation->vehicle->num_of_seats }} </td>
                            <td> {{ $reservation->vehicle->price_per_day }} </td>
                        @elseif( !$request->filter_class || $request->filter_class == null)
                            <td> {{ $reservation->vehicle->name }} </td>
                            <td> {{ $reservation->vehicle->date_of_prod }} </td>
                            <td> {{ $reservation->vehicle->class->name }} </td>
                            <td> {{ $reservation->vehicle->num_of_seats }} </td>
                            <td> {{ $reservation->vehicle->price_per_day }} </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- <div class="col-2 offset-5">
            {{ $clients->links() }} 
        </div> --}}
    </div>

@endsection