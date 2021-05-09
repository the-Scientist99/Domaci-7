@extends('layouts.main')

@section('page_title', 'Vehicles details')

@section('content')
    
    <div class="container mt-3">
        <h1 class="text-center mb-5"> IZMIJENI PODATKE O VOZILU </h1>
        <div class="row">
            <div class="col-6">
                <img src="{{ $vehicle->vehicle_photo }}" class="w-100" alt="FOTOGRAFIJA VOZILA">
            </div>
            <div class="col-6">
                <form action="/vehicles/{{ $vehicle->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')       
                    <table class="table">
                        <tr>
                            <td> Naziv: </td>
                            <td> <input type="text" value="{{ $vehicle->name }}" name="name" class="form-control"> </td>
                        </tr>
                        <tr>
                            <td> Registarski broj: </td>
                            <td> <input type="text" value="{{ $vehicle->reg_number }}" name="reg_number" class="form-control"> </td>
                        </tr>
                        <tr>
                            <td> Datum proizvodnje: </td>
                            <td> <input type="date" value="{{ $vehicle->date_of_prod }}" name="date_of_prod" class="form-control"> </td>
                        </tr>
                        <tr>
                            <td> Klasa vozila: </td>
                            <td>
                                <select name="class" class="form-control">
                                    <option value=""> - izaberi klasu - </option>
                                    @foreach ($classes as $class)
                                        <option value="{{ $class->id }}" {{ $class->id == $vehicle->class_id ? "selected" : "" }} >
                                            {{ ucfirst($class->name) }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td> Broj sjedišta: </td>
                            <td> 
                                <input type="number" step="1" value="{{ $vehicle->num_of_seats }}" name="num_of_seats" class="form-control"> 
                            </td>
                        </tr>
                        <tr>
                            <td> Cijena po danu: </td>
                            <td> 
                                <input type="number" step="1" value="{{ $vehicle->price_per_day }}" name="price_per_day" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td> Nova fotografija: </td>
                            <td> 
                                <input type="file" name="vehicle_photo" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td> Napomena: </td>
                            <td> <textarea name="note" class="form-control"> {{ $vehicle->note }} </textarea> </td>
                        </tr>
                    </table>
                    <button class="btn btn-primary col-6 offset-3">Promijeni</button>
                </form>
            </div>
        </div>
    </div>

@endsection