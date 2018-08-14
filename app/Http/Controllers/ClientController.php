<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clients = Client::all();
        return view('client.index', ['clients' => $clients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
        ]);

        $attributes = $request->all();

        Client::create($attributes);
        Session::flash('status', 'Client was successfully added!');
        Session::flash('class', 'alert-success');
        return redirect()->route('clients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    /*
     * Show is voor nu nog niet handig, dit kan later
    public function show(Client $client)
    {
        return redirect()->route('clients.index');
    }
    */
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('client.edit', ['client' => $client]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
        ]);

        $attributes = $request->all();

        $client->update($attributes);
        Session::flash('status', $client->name.' has been editted!');
        Session::flash('class', 'alert-success');
        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
        Session::flash('status', $client->name.' has been deleted!');
        Session::flash('class', 'alert-danger');
        return redirect()->route('clients.index');
    }
}
