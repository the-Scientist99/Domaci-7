@extends('layouts.main')

@section('page_title', 'Detalji o klijentu')

@section('content')
    
    <div class="container mt-5">
        <h1 class="text-center mb-5"> DETALJI O KLIJENTU </h1>
        <div class="row">
            <div class="col-12">
                <form action="/clients/{{ $client->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')       
                    <table class="table">
                        <tr>
                            <td> Ime: </td>
                            <td> <input type="text" value="{{ $client->first_name }}" name="first_name" class="form-control"> </td>
                        </tr>
                        <tr>
                            <td> Prezime: </td>
                            <td> <input type="text" value="{{ $client->last_name }}" name="last_name" class="form-control"> </td>
                        </tr>
                        <tr>
                            <td> Broj telefona: </td>
                            <td> <input type="text" value="{{ $client->phone_number }}" name="phone_number" class="form-control"> </td>
                        </tr>
                        <tr>
                            <td> Država: </td>
                            <td>
                                <select name="country" class="form-control">
                                    <option value=""> - izaberi državu - </option>
                                    @foreach ($countries as $c)
                                        <option value="{{ $c->id }}" {{ $c->id == $country->id ? "selected" : "" }} >
                                            {{ ucfirst($c->name) }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td> Email: </td>
                            <td> 
                                <input type="email" value="{{ $client->email }}" name="email" class="form-control"> 
                            </td>
                        </tr>
                        <tr>
                            <td> ID dokumenta: </td>
                            <td> 
                                <input type="text" value="{{ $client->id_document }}" name="id_document" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td> Datum prve rezervacije: </td>
                            <td> 
                                <input type="date" value="{{ $client->first_reservation_date }}" name="first_reservation_date" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td> Datum poslednje rezervacije: </td>
                            <td> 
                                <input type="date" value="{{ $client->last_reservation_date }}" name="last_reservation_date" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td> Napomena: </td>
                            <td> <textarea name="note" class="form-control"> {{ $client->note }} </textarea> </td>
                        </tr>
                    </table>
                    <button class="btn btn-primary col-6 offset-3">Promijeni</button>
                </form>
            </div>
        </div>
    </div>

@endsection