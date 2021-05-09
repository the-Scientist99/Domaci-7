@extends('layouts.main')

@section('page_title', 'Vehicles CRUD')

@section('content')
    <div class="container">
        <h1 class="text-center my-3"> SPISAK VOZILA </h1>
        <a href="/vehicles/create" class="col-4 offset-4 mb-3 btn btn-success"><i class="fas fa-car"></i> Dodaj Vozilo</a>
        <table class="table table-hover text-center">
            <thead>
                <tr>
                    <th>NAZIV</th>
                    <th>CIJENA</th>
                    <th>KLASA</th>
                    <th>---</th>
                    <th>---</th>
                    <th>---</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vehicles as $vehicle)
                    <tr>
                        <td> {{ $vehicle->name }} </td>
                        <td> {{ $vehicle->price_per_day }} </td>
                        <td> {{ ucfirst($vehicle->class->name) }} </td>
                        <td> <a href="vehicles/{{$vehicle->id}}"><i class="fas fa-info-circle fa-2x"></i></a> </td>
                        <td> <a href="vehicles/{{$vehicle->id}}/edit"><i class="far fa-edit fa-2x"></i></a> </td>
                        <td> 
                            <form action="vehicles/{{$vehicle->id}}" method="POST">
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
        <div class="col-2 offset-5"> {{ $vehicles->links() }} </div>
    </div>
@endsection