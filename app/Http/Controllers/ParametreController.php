<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParametreController extends Controller
{
    /**
     * Affiche la vue des paramètres.
     */
    public function index()
    {
        // On peut passer les valeurs actuelles du thème et de la langue si elles sont stockées en base de données ou en session
        $theme = session('theme', 'light'); // Thème par défaut : clair
        $langue = session('langue', 'fr'); // Langue par défaut : français

        return view('parametres.index', compact('theme', 'langue'));
    }

    /**
     * Met à jour le thème d'affichage.
     */
    public function updateAffichage(Request $request)
    {
        // Validation du thème
        $request->validate([
            'theme' => 'required|in:light,dark',
        ]);

        // Stocker le thème dans la session ou dans la base de données
        $theme = $request->input('theme');
        session(['theme' => $theme]);

        return redirect()->route('parametres.index')->with('success', 'Paramètres d\'affichage mis à jour.');
    }

    /**
     * Met à jour la langue de l'application.
     */
    public function updateLangue(Request $request)
    {
        // Validation de la langue
        $request->validate([
            'langue' => 'required|in:fr,en,es,de',
        ]);

        // Stocker la langue dans la session ou dans la base de données
        $langue = $request->input('langue');
        session(['langue' => $langue]);

        return redirect()->route('parametres.index')->with('success', 'Paramètres de langue mis à jour.');
    }
}



