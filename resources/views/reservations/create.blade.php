@extends('layouts.main')

@section('page_title', 'Dodavanje rezervacije')

@section('content')
    <div class="container my-5">
        <h2 class="text-center mb-4">DODAJTE REZERVACIJU</h2>
        <form action="/reservations" method="POST">
            @csrf
            <div class="row text-center mb-2">
                <div class="col-4 offset-2">
                    <label for="first_name">Novo vozilo</label>
                    <div class="w-100">
                        <a href="/vehicles/create" class="w-100 btn btn-primary">Dodaj novo vozilo</a> 
                    </div>
                </div>
                <div class="col-4">
                    <label for="first_name">Novi klijent</label>
                    <div>
                        <a href="/clients/create" class="w-100 btn btn-primary">Dodaj novog klijenta</a> 
                    </div>
                </div>
            </div>
            
            <div class="row text-center mb-2">
                <div class="col-4 offset-2">
                    <label for="vehicle">Postojeće vozilo</label>
                    <select name="vehicle" id="vehicle" class="form-control">
                        <option value="">- izaberi vozilo -</option>
                        @foreach ($vehicles as $vehicle)
                            <option value="{{ $vehicle->id }}">
                                {{ $vehicle->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-4">
                    <label for="client">Postojeći klijent</label>
                    <select name="client" id="client" class="form-control">
                        <option value="">- izaberi klijenta -</option>
                        @foreach ($clients as $client)
                            <option value="{{ $client->id }}">
                                {{ $client->first_name }} {{ $client->last_name }} 
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            
            <div class="row text-center mb-2">
                <div class="col-4 offset-2">
                    <label for="date_from">Datum od</label>
                    <input type="date" id="date_from" name="date_from" class="form-control" value="{{ old('date_from') }}">
                </div>
                <div class="col-4">
                    <label for="date_to">Datum do</label>
                    <input type="date" id="date_to" name="date_to" class="form-control" value="{{ old('date_to') }}">
                </div>
            </div>  
            
            <div class="row text-center mb-2">
                <div class="col-4 offset-2">
                    <label for="location_from">Lokacija preuzimanja</label>
                    <select name="location_from" id="location_from" class="form-control">
                        <option value="">- izaberi lokaciju preuzimanja -</option>
                        @foreach ($locations as $location)
                            <option value="{{ $location->id }}" 
                            {{ old('location_from') == $location->id ? "selected" : "" }}>
                                {{ $location->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-4">
                    <label for="location_to">Lokacija vraćanja</label>
                    <select name="location_to" id="location_to" class="form-control">
                        <option value="">- izaberi lokaciju vraćanja -</option>
                        @foreach ($locations as $location)
                            <option value="{{ $location->id }}" 
                            {{ old('location_to') == $location->id ? "selected" : "" }}>
                                {{ $location->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row text-center mb-2">
                <div class="col-8 offset-2">
                    <label for="equipment">Dodatna oprema</label>
                    <select name="equipment" id="equipment" class="form-control">
                        <option value="">- izaberi opremu -</option>
                        @foreach ($equipments as $equipment)
                            <option value="{{ $equipment->id }}" 
                            {{ old('equipment') == $equipment->id ? "selected" : "" }}>
                                {{ $equipment->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            
            <div class="row text-center mt-5">
                <div class="col-4 offset-4">
                    <input type="submit" class="btn btn-success w-100" value="SUBMIT">
                </div>
            </div>
        </form>
    </div>
@endsection