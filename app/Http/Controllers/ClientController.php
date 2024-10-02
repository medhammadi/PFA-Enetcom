<?php

namespace App\Http\Controllers;
use App\Models\Client;
use App\Supplier;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $client = client::all();
        return view('clients.index', compact('client'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom_c' => 'required',
            'prenom_c' => 'required',
            'client_code' =>'required',
            'adr_c' => 'required',
            'email_c' => 'required',
            'num_tel' => 'required',

        ]);

        $client = new Client();
        $client->nom_c = $request->nom_c;
        $client->prenom_c = $request->prenom_c;
        $client->client_code = $request->client_code;
        $client->adr_c = $request->adr_c;
        $client->email_c = $request->email_c;
        $client->num_tel = $request->num_tel;
        $client->save();

        return redirect()->route('clients')->with('success', 'Client added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $client = Client::findOrFail($id);
 
        return view('clients.show', compact('client'));
    }

    


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom_c' => 'required',
            'prenom_c' => 'required',
            'client_code' =>'required',
            'adr_c' => 'required',
            'email_c' => 'required',
            'num_tel' => 'required',
        ]);

        $client = Client::findOrFail($id);
        $client->nom_c = $request->nom_c;
        $client->prenom_c = $request->prenom_c;
        $client->client_code = $request->client_code;
        $client->adr_c = $request->adr_c;
        $client->email_c = $request->email_c;
        $client->num_tel = $request->num_tel;
        $client->save();

        return redirect()->route('clients')->with('success', 'Client updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::find($id);
        $client->delete();
        return redirect()->route('clients')->with('success', 'Client deleted successfully');

    }
}
