@extends('layouts.main')

@section('page_title', 'Kreiranje Klijenta')

@section('content')
    <div class="container my-5">
        <h1 class="text-center mb-4">UNESITE NOVOG KLIJENTA</h1>
        <form action="/clients" method="POST">
            @csrf
            <div class="row text-center mb-2">
                <div class="col-4 offset-2">
                    <label for="first_name">Ime</label>
                    <input type="text" id="first_name" name="first_name" class="form-control" value="{{ old('first_name') }}">
                </div>
                <div class="col-4">
                    <label for="last_name">Prezime</label>
                    <input type="text" id="last_name" name="last_name" class="form-control" value="{{ old('last_name') }}">
                </div>
            </div>
            
            <div class="row text-center mb-2">
                <div class="col-4 offset-2">
                    <label for="phone_number">Broj telefona</label>
                    <input type="text" id="phone_number" name="phone_number" class="form-control" value="{{ old('phone_number') }}">
                </div>
                <div class="col-4">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}">
                </div>
            </div>  
            
            <div class="row text-center mb-2">
                <div class="col-4 offset-2">
                    <label for="country">Država</label>
                    <select name="country" id="country" class="form-control">
                        <option value="">- izaberi državu -</option>
                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}" {{ old('country') == $country->id ? "selected" : "" }}>
                                {{ $country->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-4">
                    <label for="price_per_day">ID dokumenta</label>
                    <input type="text" name="id_document" id="id_document" class="form-control" 
                    value="{{ old('id_document') }}">
                </div>
            </div>

            <div class="row text-center mb-2">
                <div class="col-8 offset-2">
                    <label for="note">Napomena</label>
                    <textarea name="note" id="note" class="form-control" rows="3" value="{{ old('note') }}"></textarea>
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