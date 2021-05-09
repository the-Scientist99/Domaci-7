@extends('layouts.main')

@section('page_title', 'Create Vehicle')

@section('content')
    <div class="container my-5">
        <h2 class="text-center mb-4">Unesite novo vozilo</h2>
        <form action="/vehicles" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row text-center mb-2">
                <div class="col-4 offset-2">
                    <label for="name">Naziv</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Npr. Golf V, BMW M5" value="{{ old('name') }}">
                </div>
                <div class="col-4">
                    <label for="reg_number">Registarski broj</label>
                    <input type="text" id="reg_number" name="reg_number" placeholder="Npr. PG-BA387" value="{{ old('reg_number') }}" class="form-control">
                </div>
            </div>
            
            <div class="row text-center mb-2">
                <div class="col-4 offset-2">
                    <label for="date_of_prod">Datum proizvodnje</label>
                    <input type="date" id="date_of_prod" name="date_of_prod" class="form-control" value="{{ old('date_of_prod') }}">
                </div>
                <div class="col-4">
                    <label for="class">Klasa vozila</label>
                    <select name="veh_class" id="class" class="form-control">
                        <option value="">- naziv klase -</option>
                        @foreach ($v_classes as $class)
                            <option value="{{ $class->id }}" {{ old('veh_class') == $class->id ? "selected" : "" }} > {{ $class->name }} </option>
                        @endforeach
                    </select>
                </div>
            </div>  
            
            <div class="row text-center mb-2">
                <div class="col-4 offset-2">
                    <label for="num_of_seats">Broj sjedišta</label>
                    <input type="number" step="1" id="num_of_seats" name="num_of_seats" placeholder="Npr. 2, 4, 6" value="{{ old('num_of_seats') }}" class="form-control">
                </div>
                <div class="col-4">
                    <label for="price_per_day">Cijena po danu</label>
                    <input type="number" step="0.1" id="price_per_day" name="price_per_day" placeholder="Npr. 30€" value="{{ old('name') }}" class="form-control">
                </div>
            </div>

            <div class="row text-center mb-2">
                <div class="col-8 offset-2">
                    <label for="note">Napomena</label>
                    <textarea name="note" id="note" class="form-control" rows="3" placeholder="Napomena" value="{{ old('note') }}"></textarea>
                </div>
            </div>

            <div class="row text-center mb-2">
                <div class="col-4 offset-4">
                    <label for="vehicle_photo">Fotografija vozila</label>
                    <input type="file" name="vehicle_photo" id="vehicle_photo" class="form-control" value="{{ old('vehicle_photo') }}">
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