<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    // Afficher la liste des clients
    public function index()
    {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }

    // Afficher le formulaire de création d'un client
    public function create()
    {
        return view('clients.create');
    }

    // Enregistrer un nouveau client
    public function store(Request $request)
    {
        $request->validate([
            'nom_client' => 'required|string|max:255',
            'matricule_client' => 'required|string|max:255',
            'societe' => 'required|string|max:255',
            'telephone' => 'nullable|string|max:255',
            'email' => 'required|email|unique:clients,email',
            'adresse' => 'nullable|string|max:255',
        ]);

        Client::create($request->all());

        return redirect()->route('clients.index')->with('success', 'Client créé avec succès.');
    }

    // Afficher un client spécifique
    public function show(Client $client)
    {
        return view('clients.show', compact('client'));
    }

    // Afficher le formulaire d'édition d'un client
    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    // Mettre à jour les informations d'un client
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'nom_client' => 'required|string|max:255',
            'matricule_client' => 'required|string|max:255',
            'societe' => 'required|string|max:255',
            'telephone' => 'nullable|string|max:255',
            'email' => 'required|email|unique:clients,email,' . $client->id,
            'adresse' => 'nullable|string|max:255',
        ]);

        $client->update($request->all());

        return redirect()->route('clients.index')->with('success', 'Client mis à jour avec succès.');
    }

    // Supprimer un client
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('clients.index')->with('success', 'Client supprimé avec succès.');
    }
}
