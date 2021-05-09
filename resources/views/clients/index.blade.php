@extends('layouts.main')

@section('page_title', 'Spisak Klijenata')

@section('content')
    
    <div class="container">
        <h1 class="text-center mt-3"> SPISAK KLIJENATA </h1>     
        <form action="/clients" method="GET">
            @csrf

            <div class="row">
                <div class="col-3">
                    <input type="text" name="filter_f_name" class="form-control" value="{{ $request->filter_f_name }}" placeholder="Ime">
                </div>
                <div class="col-3">
                    <input type="text" name="filter_l_name" class="form-control" value="{{ $request->filter_l_name }}" placeholder="Prezime">
                </div>
                <div class="col-2">
                    <input type="text" name="filter_id_document" class="form-control" value="{{ $request->filter_id_document }}" 
                    placeholder="ID dokumenta" >
                </div>
                <div class="col-2">
                    <select name="filter_country" class="form-control">
                        <option value=""> - izaberi drzavu - </option>
                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}" {{ $request->filter_country == $country->id ? "selected" : "" }}>
                                {{ $country->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-1">
                    <button class="btn btn-primary w-100"><i class="fas fa-search"></i></button>
                </div>
                <div class="col-1">
                    <a href="/clients/create" class="btn btn-success w-100"> <i class="fas fa-user-plus ml-1"></i> </a>
                </div>
            </div>
        </form>

        <table class="table table-hover text-center mt-3">
            <thead>
                <tr>
                    <th>Ime i Prezime</th>
                    <th>Država</th>
                    <th>ID dokumenta</th>
                    <th>Broj telefona</th>
                    <th>E-mail</th>
                    <th>Detalji</th>
                    <th>Promijeni</th>
                    <th>Izbrisi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                    <tr>
                        <td> {{ $client->first_name }} {{ $client->last_name }} </td>
                        <td> {{ $client->country->name }} </td>
                        <td> {{ $client->id_document }} </td>
                        <td> {{ $client->phone_number }} </td>
                        <td> {{ $client->email }} </td>
                        <td> <a href="clients/{{$client->id}}"><i class="fas fa-info-circle fa-2x"></i></a> </td>
                        <td> <a href="clients/{{$client->id}}/edit"><i class="far fa-edit fa-2x"></i></a> </td>
                        <td> 
                            <form action="clients/{{$client->id}}" method="POST">
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
        <div class="col-2 offset-5">
            {{ $clients->links() }} 
        </div>
    </div>

@endsection