<?php

namespace App\Http\Controllers;

use App\Models\clients;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    // Afficher la liste des clients
    public function index()
    {
        $clients = clients::all();
        return view('clients.index', ['clients' => $clients]);
        
    }

    // Afficher le formulaire de création d'un clients
    public function create()
    {
        return view('clients.create');
    }

    // Enregistrer un nouveau clients
    public function store(Request $request)
    {
        $request->validate([
            'nom_clients' => 'required|string|max:255',
            'matricule_clients' => 'required|string|max:255',
            // 'societe' => 'required|string|max:255',
            'telephone' => 'nullable|string|max:255',
            'email' => 'required|email|unique:clients,email',
            'adresse' => 'nullable|string|max:255',
        ]);

        clients::create($request->all());

        return redirect()->route('clients.index')->with('success', 'clients créé avec succès.');
    }

    
    

    // Afficher le formulaire d'édition d'un client
    public function edit($id)
    {
        $client = Clients::findOrFail($id);
        return view('clients.edit', compact('client'));
    }

    // Mettre à jour les informations d'un client
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nom_clients' => 'required|string|max:255',
            'matricule_clients' => 'required|string|max:255',
            // 'societe' => 'required|string|max:255',
            'telephone' => 'nullable|string|max:255',
            'email' => 'required|email|unique:clients,email,' . $id,
            'adresse' => 'nullable|string|max:255',
        ]);

        $client = Clients::findOrFail($id);
        $client->update($validatedData);

        return redirect()->route('clients.index')->with('success', 'Client mis à jour avec succès.');
    }

    // Supprimer un clients
    

    public function destroy($id)
    {
        $clients = Clients::findOrFail($id);
        $clients->delete();

        return redirect()->route('clients.index')->with('success', 'Client supprimé avec succès.');
    }
        // Afficher un clients spécifique
    public function show($id)
    {
    $client = Clients::findOrFail($id);
    return view('clients.show', compact('client'));
    }
}
