@extends('layouts.main')

@section('page_title', 'Detalji Klijenta')

@section('content')
    
    <div class="container mt-5">
        <h1 class="text-center mb-5"> DETALJI O KLIJENTU </h1>
        <div class="row">
            <div class="col-6">
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
                        <td> {{ $country->name }} </td>
                    </tr>
                    <tr>
                        <th> Broj ID dokumenta: </th>
                        <td> {{ $client->id_document }} </td>
                    </tr>
                    <tr><td></td><td></td></tr>
                </table>
            </div>
            <div class="col-6">
                <table class="table">
                    <tr>
                        <th> E-mail: </th>
                        <td> {{ $client->email }} </td>
                    </tr>
                    <tr>
                        <th> Datum prve rezervacije: </td>
                        <td> {{ $client->first_reservation_date }} </td>
                    </tr>
                    <tr>
                        <th> Datum poslednje rezervacije: </th>
                        <td> {{ $client->last_reservation_date }} </td>
                    </tr>
                    <tr>
                        <th> Napomena: </th>
                        <td> {{ $client->note }} </td>
                    </tr>
                    <tr><td></td><td></td></tr>
                </table>
            </div>
        </div>
    </div>

@endsection