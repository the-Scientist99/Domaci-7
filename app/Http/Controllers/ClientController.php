<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\Client;
use App\Models\Country;

class ClientController extends Controller
{
    public function index(ClientRequest $request)
    {
        $clients = Client::query()
            ->when($request->filter_f_name, function ($query) use ($request) {
                $term = strtolower($request->filter_f_name);
                $query->whereRaw('lower(first_name) LIKE (?)', ["%{$term}%"]);
            })
            ->when($request->filter_l_name, function ($query) use ($request) {
                $term = strtolower($request->filter_l_name);
                $query->whereRaw('lower(last_name) LIKE (?)', ["%{$term}%"]);
            })
            ->when($request->filter_id_document, function ($query) use ($request) {
                $query->where('id_document', '=', $request->filter_id_document);
            })
            ->when($request->filter_country, function ($query) use ($request) {
                $query->where('country_id', '=', $request->filter_country);
            })
            ->paginate(Client::PER_PAGE);

        $data = [
            'clients' => $clients,
            'countries' => Country::all(),
            'request' => $request,
        ];

        return view('clients.index', $data);
    }

    public function create()
    {
        return view('clients.create', ['countries' => Country::all()]);
    }

    public function store(ClientRequest $request)
    {
        $data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'country_id' => $request->country,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'id_document' => $request->id_document,
            'note' => $request->note,
        ];
        Client::query()->create($data);

        return redirect('/clients');
    }

    public function show(Client $client)
    {
        return view('clients.details', ['client' => $client, 'country' => $client->country]);
    }

    public function edit(Client $client)
    {
        $data = [
            'client' => $client,
            'countries' => Country::all(),
            'country' => $client->country,
        ];

        return view('clients.edit', $data);
    }

    public function update(ClientRequest $request, Client $client)
    {
        $data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'country_id' => $request->country,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'first_reservation_date' => $request->first_reservation_date,
            'last_reservation_date' => $request->last_reservation_date,
        ];
        $client->update($data);

        return redirect('/clients');
    }

    public function destroy(Client $client)
    {
        $client->delete();

        return redirect('/clients');
    }
}
